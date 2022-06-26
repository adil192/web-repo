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

	public reflexive: boolean = false;

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

export function allowPinchToZoom(elem: HTMLElement, isPinchToZoomAllowed: boolean = null): PinchToZoomHandler {
	let handler = PinchToZoomHandler.Create(elem);
	if (isPinchToZoomAllowed != null) handler.enabled = isPinchToZoomAllowed;
	return handler;
}
