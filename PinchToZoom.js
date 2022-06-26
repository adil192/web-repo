var __classPrivateFieldSet = (this && this.__classPrivateFieldSet) || function (receiver, state, value, kind, f) {
    if (kind === "m") throw new TypeError("Private method is not writable");
    if (kind === "a" && !f) throw new TypeError("Private accessor was defined without a setter");
    if (typeof state === "function" ? receiver !== state || !f : !state.has(receiver)) throw new TypeError("Cannot write private member to an object whose class did not declare it");
    return (kind === "a" ? f.call(receiver, value) : f ? f.value = value : state.set(receiver, value)), value;
};
var __classPrivateFieldGet = (this && this.__classPrivateFieldGet) || function (receiver, state, kind, f) {
    if (kind === "a" && !f) throw new TypeError("Private accessor was defined without a getter");
    if (typeof state === "function" ? receiver !== state || !f : !state.has(receiver)) throw new TypeError("Cannot read private member from an object whose class did not declare it");
    return kind === "m" ? f : kind === "a" ? f.call(receiver) : f ? f.value : state.get(receiver);
};
var _PinchToZoomHandler_enabled, _PinchToZoomHandler_elem, _PinchToZoomHandler_active;
class Vector2 {
    constructor(x, y) {
        this.x = x;
        this.y = y;
    }
    Add(v) {
        return new Vector2(this.x + v.x, this.y + v.y);
    }
    Subtract(v) {
        return new Vector2(this.x - v.x, this.y - v.y);
    }
}
Vector2.Zero = new Vector2(0, 0);
export class PinchToZoomHandler {
    constructor(elem) {
        _PinchToZoomHandler_enabled.set(this, true);
        this.reflexive = false;
        _PinchToZoomHandler_elem.set(this, void 0);
        _PinchToZoomHandler_active.set(this, void 0);
        this.startingScale = 1;
        this.startingOffset = Vector2.Zero;
        this.lastScale = 1;
        this.lastOffset = Vector2.Zero;
        __classPrivateFieldSet(this, _PinchToZoomHandler_elem, elem, "f");
        this.elem.style.willChange = "transform";
        this.elem.style.touchAction = "pan-x pan-y";
        this.elem.addEventListener("touchstart", (event) => this.onTouchStart(event), { passive: true });
        this.elem.addEventListener("touchend", (event) => this.onTouchEnd(event), { passive: true });
        this.elem.addEventListener("touchmove", (event) => this.onTouchMove(event), { passive: true });
    }
    get enabled() {
        return __classPrivateFieldGet(this, _PinchToZoomHandler_enabled, "f");
    }
    set enabled(enabled) {
        __classPrivateFieldSet(this, _PinchToZoomHandler_enabled, enabled, "f");
        if (!enabled && this.active)
            this.End();
    }
    get elem() { return __classPrivateFieldGet(this, _PinchToZoomHandler_elem, "f"); }
    get active() { return __classPrivateFieldGet(this, _PinchToZoomHandler_active, "f"); }
    set active(active) { __classPrivateFieldSet(this, _PinchToZoomHandler_active, active, "f"); }
    Start(touches) {
        this.startingPinchSize = PinchToZoomHandler.getPinchSize(touches);
        this.startingPinchPosition = PinchToZoomHandler.getPinchPosition(touches);
        this.active = true;
        this.elem.style.transitionProperty = "transform";
        this.elem.style.transitionDuration = "0s";
    }
    Update(touches) {
        let scale = PinchToZoomHandler.getPinchSize(touches) / this.startingPinchSize * this.startingScale;
        let offset = PinchToZoomHandler.getPinchPosition(touches).Subtract(this.startingPinchPosition).Add(this.startingOffset);
        this.SetTransform(scale, offset);
    }
    End() {
        this.active = false;
        this.FixTransform();
        this.startingScale = this.lastScale;
        this.startingOffset = this.lastOffset;
    }
    SetTransform(scale, offset) {
        this.lastScale = scale;
        this.lastOffset = offset;
        this.elem.style.transform = `scale(${scale}) translate(${offset.x}px, ${offset.y}px)`;
        this.onChange?.(scale, offset);
    }
    FixTransform() {
        if (this.reflexive) {
            this.lastScale = 1;
            this.lastOffset = Vector2.Zero;
        }
        else {
            if (this.lastScale < 1.05) {
                this.lastScale = 1;
                this.lastOffset = Vector2.Zero;
            }
            else {
                let maxOffsetX = this.elem.offsetWidth * this.lastScale * 0.3;
                let maxOffsetY = this.elem.offsetHeight * this.lastScale * 0.3;
                this.lastOffset.x = clamp(this.lastOffset.x, -maxOffsetX, maxOffsetX);
                this.lastOffset.y = clamp(this.lastOffset.y, -maxOffsetY, maxOffsetY);
            }
        }
        this.elem.style.transitionDuration = "0.2s";
        this.SetTransform(this.lastScale, this.lastOffset);
    }
    static getPinchSize(touches) {
        let touch0 = touches.item(0), touch1 = touches.item(1);
        return Math.sqrt(Math.pow(touch0.screenX - touch1.screenX, 2) +
            Math.pow(touch0.screenY - touch1.screenY, 2));
    }
    static getPinchPosition(touches) {
        let touch0 = touches.item(0), touch1 = touches.item(1);
        return new Vector2((touch0.screenX + touch1.screenX) / 2, (touch0.screenY + touch1.screenY) / 2);
    }
    onTouchStart(event) {
        if (!this.enabled)
            return;
        if (event.touches.length > 2)
            return this.End();
        else if (event.touches.length == 2)
            return this.Start(event.touches);
    }
    onTouchEnd(event) {
        this.End();
    }
    onTouchMove(event) {
        if (!this.active)
            return;
        this.Update(event.touches);
    }
    static Create(elem) {
        if (this.handlers.has(elem))
            return this.handlers.get(elem);
        let newHandler = new PinchToZoomHandler(elem);
        this.handlers.set(elem, newHandler);
        return newHandler;
    }
}
_PinchToZoomHandler_enabled = new WeakMap(), _PinchToZoomHandler_elem = new WeakMap(), _PinchToZoomHandler_active = new WeakMap();
PinchToZoomHandler.handlers = new Map();
function clamp(num, min, max) {
    return Math.min(Math.max(num, min), max);
}
export function allowPinchToZoom(elem, isPinchToZoomAllowed = null) {
    let handler = PinchToZoomHandler.Create(elem);
    if (isPinchToZoomAllowed != null)
        handler.enabled = isPinchToZoomAllowed;
    return handler;
}
//# sourceMappingURL=PinchToZoom.js.map