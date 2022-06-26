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
    Multiply(c) {
        return new Vector2(this.x * c, this.y * c);
    }
}
Vector2.Zero = new Vector2(0, 0);
class Matrix2x2 {
    constructor(scale, origin) {
        this.scale = scale;
        this.offset = origin;
    }
    ToCssTransform() {
        return `scale(${this.scale}) translate(${this.offset.x}px, ${this.offset.y}px)`;
    }
}
Matrix2x2.Zero = new Matrix2x2(0, Vector2.Zero);
Matrix2x2.Identity = new Matrix2x2(1, Vector2.Zero);
export class PinchToZoomHandler {
    constructor(elem) {
        _PinchToZoomHandler_enabled.set(this, true);
        this.isScrollZoomEnabled = true;
        this.reflexive = false;
        this.maxScale = 5;
        _PinchToZoomHandler_elem.set(this, void 0);
        _PinchToZoomHandler_active.set(this, void 0);
        this.pinchStartInfo = Matrix2x2.Identity;
        this.startingTransform = Matrix2x2.Identity;
        this.lastTransform = Matrix2x2.Identity;
        this.wheelZoomSpeed = 0.1 / 141;
        this.wheelZoomTimeout = null;
        __classPrivateFieldSet(this, _PinchToZoomHandler_elem, elem, "f");
        this.elem.style.willChange = "transform";
        this.elem.style.touchAction = "pan-x pan-y";
        this.elem.addEventListener("touchstart", (event) => this.onTouchStart(event), { passive: true });
        this.elem.addEventListener("touchend", (event) => this.onTouchEnd(event), { passive: true });
        this.elem.addEventListener("touchmove", (event) => this.onTouchMove(event), { passive: true });
        this.elem.addEventListener("wheel", (event) => this.onWheel(event), { passive: false });
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
        this.pinchStartInfo = PinchToZoomHandler.getPinchInfo(touches);
        this.active = true;
        this.elem.style.transitionProperty = "transform";
        this.elem.style.transitionDuration = "0s";
    }
    Update(touches) {
        let currentPinchInfo = PinchToZoomHandler.getPinchInfo(touches);
        let transform = new Matrix2x2(currentPinchInfo.scale / this.pinchStartInfo.scale * this.startingTransform.scale, currentPinchInfo.offset.Subtract(this.pinchStartInfo.offset).Add(this.startingTransform.offset));
        this.SetTransform(transform);
    }
    End() {
        this.active = false;
        this.FixTransform();
        this.startingTransform = this.lastTransform;
    }
    SetTransform(transform) {
        this.lastTransform = transform;
        this.elem.style.transform = transform.ToCssTransform();
        this.onChange?.(transform.scale, transform.offset);
    }
    FixTransform() {
        if (this.reflexive) {
            this.lastTransform = Matrix2x2.Identity;
        }
        else {
            if (this.lastTransform.scale < 1.05) {
                this.lastTransform = Matrix2x2.Identity;
            }
            else {
                if (this.lastTransform.scale > this.maxScale)
                    this.lastTransform.scale = this.maxScale;
                let maxOffsetX = this.elem.offsetWidth * this.lastTransform.scale * 0.3;
                let maxOffsetY = this.elem.offsetHeight * this.lastTransform.scale * 0.3;
                this.lastTransform.offset = new Vector2(clamp(this.lastTransform.offset.x, -maxOffsetX, maxOffsetX), clamp(this.lastTransform.offset.y, -maxOffsetY, maxOffsetY));
            }
        }
        this.elem.style.transitionDuration = "0.2s";
        this.SetTransform(this.lastTransform);
    }
    static getPinchInfo(touches) {
        let touch0 = touches.item(0), touch1 = touches.item(1);
        let size = Math.sqrt(Math.pow(touch0.screenX - touch1.screenX, 2) +
            Math.pow(touch0.screenY - touch1.screenY, 2));
        let position = new Vector2((touch0.screenX + touch1.screenX) / 2, (touch0.screenY + touch1.screenY) / 2);
        return new Matrix2x2(size, position);
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
    onWheel(event) {
        if (!this.enabled)
            return;
        if (!this.isScrollZoomEnabled)
            return;
        event.preventDefault();
        if (event.deltaY == 0)
            return;
        let scale = this.lastTransform.scale * (1 - event.deltaY * this.wheelZoomSpeed);
        let scale_diff = this.lastTransform.scale - scale;
        let center = getRectCenter(this.elem.getBoundingClientRect());
        let centerToMouse = new Vector2(event.clientX, event.clientY).Subtract(center).Multiply(1 / this.lastTransform.scale);
        let offset = this.lastTransform.offset.Add(centerToMouse.Multiply(scale_diff / this.lastTransform.scale * 0.7));
        this.SetTransform(new Matrix2x2(scale, offset));
        clearTimeout(this.wheelZoomTimeout);
        this.wheelZoomTimeout = setTimeout(() => this.End(), 200);
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
function getRectCenter(rect) {
    return new Vector2(rect.left + rect.width / 2, rect.top + rect.height / 2);
}
export function allowPinchToZoom(elem, isPinchToZoomAllowed = null) {
    let handler = PinchToZoomHandler.Create(elem);
    if (isPinchToZoomAllowed != null)
        handler.enabled = isPinchToZoomAllowed;
    return handler;
}
//# sourceMappingURL=PinchToZoom.js.map