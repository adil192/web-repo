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

	startingPinchSize: number;
	startingPinchPosition: Vector2;

	startingScale: number = 1;
	startingOffset: Vector2 = Vector2.Zero;
	lastScale: number = 1;
	lastOffset: Vector2 = Vector2.Zero;

	private constructor(elem: HTMLElement) {
		this.#elem = elem;
		this.elem.style.willChange = "transform";
		this.elem.style.touchAction = "pan-x pan-y";

		this.elem.addEventListener("touchstart", (event) => this.onTouchStart(event), {passive: true});
		this.elem.addEventListener("touchend", (event) => this.onTouchEnd(event), {passive: true});
		this.elem.addEventListener("touchmove", (event) => this.onTouchMove(event), {passive: true});
	}

	private Start(touches: TouchList) {
		this.startingPinchSize = PinchToZoomHandler.getPinchSize(touches);
		this.startingPinchPosition = PinchToZoomHandler.getPinchPosition(touches);
		this.active = true;
		this.elem.style.transitionProperty = "transform";
		this.elem.style.transitionDuration = "0s";
	}
	private Update(touches: TouchList) {
		let scale = PinchToZoomHandler.getPinchSize(touches) / this.startingPinchSize * this.startingScale;
		let offset = PinchToZoomHandler.getPinchPosition(touches).Subtract(this.startingPinchPosition).Add(this.startingOffset);

		this.SetTransform(scale, offset);
	}
	private End() {
		this.active = false;

		this.FixTransform();

		this.startingScale = this.lastScale;
		this.startingOffset = this.lastOffset;
	}

	private SetTransform(scale: number, offset: Vector2) {
		this.lastScale = scale;
		this.lastOffset = offset;

		this.elem.style.transform = `scale(${scale}) translate(${offset.x}px, ${offset.y}px)`;

		this.onChange?.(scale, offset);
	}
	private FixTransform() {
		if (this.reflexive) {
			this.lastScale = 1;
			this.lastOffset = Vector2.Zero;
		} else {
			if (this.lastScale < 1.05) {
				this.lastScale = 1;
				this.lastOffset = Vector2.Zero;
			} else {
				let maxOffsetX = this.elem.offsetWidth * this.lastScale * 0.3;
				let maxOffsetY = this.elem.offsetHeight * this.lastScale * 0.3;
				this.lastOffset.x = clamp(this.lastOffset.x, -maxOffsetX, maxOffsetX);
				this.lastOffset.y = clamp(this.lastOffset.y, -maxOffsetY, maxOffsetY);
			}
		}

		this.elem.style.transitionDuration = "0.2s";
		this.SetTransform(this.lastScale, this.lastOffset);
	}

	private static getPinchSize(touches: TouchList): number {
		let touch0 = touches.item(0),
			touch1 = touches.item(1);
		return Math.sqrt(
			Math.pow(touch0.screenX - touch1.screenX, 2) +
			Math.pow(touch0.screenY - touch1.screenY, 2)
		);
	}
	private static getPinchPosition(touches: TouchList): Vector2 {
		let touch0 = touches.item(0),
			touch1 = touches.item(1);
		return new Vector2(
			(touch0.screenX + touch1.screenX) / 2,
			(touch0.screenY + touch1.screenY) / 2,
		);
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
