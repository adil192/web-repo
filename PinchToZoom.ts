/*
    PinchToZoom is a free library to enable custom touch-screen pinch to zoom
    functionality on an element-by-element basis rather than zooming the whole page.
    Copyright (C) 2022  Adil Hanney

    This library is free software; you can redistribute it and/or
    modify it under the terms of the GNU Lesser General Public
    License as published by the Free Software Foundation; either
    version 2.1 of the License, or (at your option) any later version.

    This library is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
    Lesser General Public License for more details.

    You should have received a copy of the GNU Lesser General Public
    License along with this library; if not, write to the Free Software
    Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301
    USA
*/

class Vector2 {
	public x: number;
	public y: number;

	static readonly Zero: Vector2 = new Vector2(0, 0);

	constructor(x: number, y: number) {
		this.x = x;
		this.y = y;
	}

	public Add(v: Vector2): Vector2 {
		return new Vector2(
			this.x + v.x,
			this.y + v.y
		)
	}
	public Subtract(v: Vector2): Vector2 {
		return new Vector2(
			this.x - v.x,
			this.y - v.y
		)
	}
	public Multiply(c: number): Vector2 {
		return new Vector2(
			this.x * c,
			this.y * c
		);
	}
}

class Matrix2x2 {
	public scale: number;
	public offset: Vector2;

	static readonly Zero: Matrix2x2 = new Matrix2x2(0, Vector2.Zero);
	static readonly Identity: Matrix2x2 = new Matrix2x2(1, Vector2.Zero);

	constructor(scale: number, origin: Vector2) {
		this.scale = scale;
		this.offset = origin;
	}

	public ToCssTransform(): string {
		return `scale(${this.scale}) translate(${this.offset.x}px, ${this.offset.y}px)`;
	}
}

export class PinchToZoomHandler {
	#enabled: boolean = true;
	// is pinch to zoom enabled?
	public get enabled(): boolean {
		return this.#enabled;
	}
	public set enabled(enabled: boolean) {
		this.#enabled = enabled;
		if (!enabled && this.active) this.End();
	}
	public isScrollZoomEnabled: boolean = true;

	public reflexive: boolean = false;

	public maxScale: number = 5;

	readonly #elem: HTMLElement;
	public get elem() { return this.#elem; }

	#active: boolean;
	// is currently pinching to zoom?
	public get active() { return this.#active; }
	private set active(active: boolean) { this.#active = active; }
	public onChange?: (scale: number, offset: Vector2) => void;

	pinchStartInfo: Matrix2x2 = Matrix2x2.Identity;
	startingTransform: Matrix2x2 = Matrix2x2.Identity;
	lastTransform: Matrix2x2 = Matrix2x2.Identity;

	private constructor(elem: HTMLElement) {
		this.#elem = elem;
		this.elem.style.willChange = "transform";
		this.elem.style.touchAction = "pan-x pan-y";

		this.elem.addEventListener("touchstart", (event) => this.onTouchStart(event), {passive: true});
		this.elem.addEventListener("touchend", (event) => this.onTouchEnd(event), {passive: true});
		this.elem.addEventListener("touchmove", (event) => this.onTouchMove(event), {passive: true});
		this.elem.addEventListener("wheel", (event) => this.onWheel(event), { passive: false });
	}

	private Start(touches: TouchList) {
		this.pinchStartInfo = PinchToZoomHandler.getPinchInfo(touches);
		this.active = true;
		this.elem.style.transitionProperty = "transform";
		this.elem.style.transitionDuration = "0s";
	}
	private Update(touches: TouchList) {
		let currentPinchInfo = PinchToZoomHandler.getPinchInfo(touches);

		let transform = new Matrix2x2(
			currentPinchInfo.scale / this.pinchStartInfo.scale * this.startingTransform.scale,
			currentPinchInfo.offset.Subtract(this.pinchStartInfo.offset).Add(this.startingTransform.offset)
		);
		this.SetTransform(transform);
	}
	private End() {
		this.active = false;

		this.FixTransform();

		this.startingTransform = this.lastTransform;
	}

	private SetTransform(transform: Matrix2x2) {
		this.lastTransform = transform;

		this.elem.style.transform = transform.ToCssTransform();

		this.onChange?.(transform.scale, transform.offset);
	}
	private FixTransform() {
		if (this.reflexive) {
			this.lastTransform = Matrix2x2.Identity;
		} else {
			if (this.lastTransform.scale < 1.05) {
				this.lastTransform = Matrix2x2.Identity;
			} else {
				if (this.lastTransform.scale > this.maxScale) this.lastTransform.scale = this.maxScale;

				let maxOffsetX = this.elem.offsetWidth * this.lastTransform.scale * 0.3;
				let maxOffsetY = this.elem.offsetHeight * this.lastTransform.scale * 0.3;
				this.lastTransform.offset = new Vector2(
					clamp(this.lastTransform.offset.x, -maxOffsetX, maxOffsetX),
					clamp(this.lastTransform.offset.y, -maxOffsetY, maxOffsetY)
				);
			}
		}

		this.elem.style.transitionDuration = "0.2s";
		this.SetTransform(this.lastTransform);
	}

	private static getPinchInfo(touches: TouchList): Matrix2x2 {
		let touch0 = touches.item(0),
			touch1 = touches.item(1);
		let size = Math.sqrt(
			Math.pow(touch0.screenX - touch1.screenX, 2) +
			Math.pow(touch0.screenY - touch1.screenY, 2)
		);
		let position = new Vector2(
			(touch0.screenX + touch1.screenX) / 2,
			(touch0.screenY + touch1.screenY) / 2,
		);
		return new Matrix2x2(size, position);
	}

	private onTouchStart(event: TouchEvent) {
		if (!this.enabled) return;
		if (event.touches.length > 2) return this.End();
		else if (event.touches.length == 2) return this.Start(event.touches);
	}
	private onTouchEnd(event: TouchEvent) {
		this.End();
	}
	private onTouchMove(event: TouchEvent) {
		if (!this.active) return;
		this.Update(event.touches);
	}

	wheelZoomSpeed: number = 0.1 / 141;
	wheelZoomTimeout: number = null;
	private onWheel(event: WheelEvent) {
		if (!this.enabled) return;
		if (!this.isScrollZoomEnabled) return;
		event.preventDefault();
		if (event.deltaY == 0) return;

		this.elem.style.transitionProperty = "transform";
		this.elem.style.transitionDuration = "0s";

		// negative deltaY = scroll up = zoom in
		let scale = this.lastTransform.scale * (1 - event.deltaY * this.wheelZoomSpeed);
		let scale_diff = this.lastTransform.scale - scale;

		let center = getRectCenter(this.elem.getBoundingClientRect());
		let centerToMouse = new Vector2(event.clientX, event.clientY).Subtract(center).Multiply(1 / this.lastTransform.scale);

		let offset = this.lastTransform.offset.Add(centerToMouse.Multiply(scale_diff / this.lastTransform.scale * 0.7));

		this.SetTransform(new Matrix2x2(scale, offset));

		clearTimeout(this.wheelZoomTimeout);
		this.wheelZoomTimeout = setTimeout(() => this.End(), 200);
	}

	private static handlers: Map<HTMLElement, PinchToZoomHandler> = new Map<HTMLElement, PinchToZoomHandler>();
	public static Create(elem: HTMLElement): PinchToZoomHandler {
		if (this.handlers.has(elem)) return this.handlers.get(elem);

		let newHandler = new PinchToZoomHandler(elem);
		this.handlers.set(elem, newHandler);
		return newHandler;
	}
}

function clamp(num: number, min: number, max: number) {
	return Math.min(Math.max(num, min), max);
}

function getRectCenter(rect: DOMRect): Vector2 {
	return new Vector2(rect.left + rect.width / 2, rect.top + rect.height / 2);
}

export function allowPinchToZoom(elem: HTMLElement, isPinchToZoomAllowed: boolean = null): PinchToZoomHandler {
	let handler = PinchToZoomHandler.Create(elem);
	if (isPinchToZoomAllowed != null) handler.enabled = isPinchToZoomAllowed;
	return handler;
}
