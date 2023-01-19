(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_template_plugins_sweetalert2_sweetalert2_min_js"],{

/***/ "./resources/template/plugins/sweetalert2/sweetalert2.min.js":
/*!*******************************************************************!*\
  !*** ./resources/template/plugins/sweetalert2/sweetalert2.min.js ***!
  \*******************************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;function _get() { if (typeof Reflect !== "undefined" && Reflect.get) { _get = Reflect.get.bind(); } else { _get = function _get(target, property, receiver) { var base = _superPropBase(target, property); if (!base) return; var desc = Object.getOwnPropertyDescriptor(base, property); if (desc.get) { return desc.get.call(arguments.length < 3 ? target : receiver); } return desc.value; }; } return _get.apply(this, arguments); }

function _superPropBase(object, property) { while (!Object.prototype.hasOwnProperty.call(object, property)) { object = _getPrototypeOf(object); if (object === null) break; } return object; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); Object.defineProperty(subClass, "prototype", { writable: false }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } else if (call !== void 0) { throw new TypeError("Derived constructors may only return object or undefined"); } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _construct(Parent, args, Class) { if (_isNativeReflectConstruct()) { _construct = Reflect.construct.bind(); } else { _construct = function _construct(Parent, args, Class) { var a = [null]; a.push.apply(a, args); var Constructor = Function.bind.apply(Parent, a); var instance = new Constructor(); if (Class) _setPrototypeOf(instance, Class.prototype); return instance; }; } return _construct.apply(null, arguments); }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

!function (e, t) {
  "object" == ( false ? 0 : _typeof(exports)) && "undefined" != "object" ? module.exports = t() :  true ? !(__WEBPACK_AMD_DEFINE_FACTORY__ = (t),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
		__WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : 0;
}(this, function () {
  "use strict";

  var t = "SweetAlert2:",
      y = function y(e) {
    return e.charAt(0).toUpperCase() + e.slice(1);
  },
      i = function i(e) {
    return Array.prototype.slice.call(e);
  },
      a = function a(e) {
    console.warn("".concat(t, " ").concat("object" == _typeof(e) ? e.join(" ") : e));
  },
      v = function v(e) {
    console.error("".concat(t, " ").concat(e));
  },
      n = [],
      o = function o(e, t) {
    e = '"'.concat(e, '" is deprecated and will be removed in the next major release. Please use "').concat(t, '" instead.'), n.includes(e) || (n.push(e), a(e));
  },
      w = function w(e) {
    return "function" == typeof e ? e() : e;
  },
      C = function C(e) {
    return e && "function" == typeof e.toPromise;
  },
      k = function k(e) {
    return C(e) ? e.toPromise() : Promise.resolve(e);
  },
      A = function A(e) {
    return e && Promise.resolve(e) === e;
  },
      r = {
    title: "",
    titleText: "",
    text: "",
    html: "",
    footer: "",
    icon: void 0,
    iconColor: void 0,
    iconHtml: void 0,
    template: void 0,
    toast: !1,
    showClass: {
      popup: "swal2-show",
      backdrop: "swal2-backdrop-show",
      icon: "swal2-icon-show"
    },
    hideClass: {
      popup: "swal2-hide",
      backdrop: "swal2-backdrop-hide",
      icon: "swal2-icon-hide"
    },
    customClass: {},
    target: "body",
    color: void 0,
    backdrop: !0,
    heightAuto: !0,
    allowOutsideClick: !0,
    allowEscapeKey: !0,
    allowEnterKey: !0,
    stopKeydownPropagation: !0,
    keydownListenerCapture: !1,
    showConfirmButton: !0,
    showDenyButton: !1,
    showCancelButton: !1,
    preConfirm: void 0,
    preDeny: void 0,
    confirmButtonText: "OK",
    confirmButtonAriaLabel: "",
    confirmButtonColor: void 0,
    denyButtonText: "No",
    denyButtonAriaLabel: "",
    denyButtonColor: void 0,
    cancelButtonText: "Cancel",
    cancelButtonAriaLabel: "",
    cancelButtonColor: void 0,
    buttonsStyling: !0,
    reverseButtons: !1,
    focusConfirm: !0,
    focusDeny: !1,
    focusCancel: !1,
    returnFocus: !0,
    showCloseButton: !1,
    closeButtonHtml: "&times;",
    closeButtonAriaLabel: "Close this dialog",
    loaderHtml: "",
    showLoaderOnConfirm: !1,
    showLoaderOnDeny: !1,
    imageUrl: void 0,
    imageWidth: void 0,
    imageHeight: void 0,
    imageAlt: "",
    timer: void 0,
    timerProgressBar: !1,
    width: void 0,
    padding: void 0,
    background: void 0,
    input: void 0,
    inputPlaceholder: "",
    inputLabel: "",
    inputValue: "",
    inputOptions: {},
    inputAutoTrim: !0,
    inputAttributes: {},
    inputValidator: void 0,
    returnInputValueOnDeny: !1,
    validationMessage: void 0,
    grow: !1,
    position: "center",
    progressSteps: [],
    currentProgressStep: void 0,
    progressStepsDistance: void 0,
    willOpen: void 0,
    didOpen: void 0,
    didRender: void 0,
    willClose: void 0,
    didClose: void 0,
    didDestroy: void 0,
    scrollbarPadding: !0
  },
      s = ["allowEscapeKey", "allowOutsideClick", "background", "buttonsStyling", "cancelButtonAriaLabel", "cancelButtonColor", "cancelButtonText", "closeButtonAriaLabel", "closeButtonHtml", "color", "confirmButtonAriaLabel", "confirmButtonColor", "confirmButtonText", "currentProgressStep", "customClass", "denyButtonAriaLabel", "denyButtonColor", "denyButtonText", "didClose", "didDestroy", "footer", "hideClass", "html", "icon", "iconColor", "iconHtml", "imageAlt", "imageHeight", "imageUrl", "imageWidth", "preConfirm", "preDeny", "progressSteps", "returnFocus", "reverseButtons", "showCancelButton", "showCloseButton", "showConfirmButton", "showDenyButton", "text", "title", "titleText", "willClose"],
      c = {},
      P = ["allowOutsideClick", "allowEnterKey", "backdrop", "focusConfirm", "focusDeny", "focusCancel", "returnFocus", "heightAuto", "keydownListenerCapture"],
      B = function B(e) {
    return Object.prototype.hasOwnProperty.call(r, e);
  },
      x = function x(e) {
    return -1 !== s.indexOf(e);
  },
      E = function E(e) {
    return c[e];
  },
      T = function T(e) {
    !e.backdrop && e.allowOutsideClick && a('"allowOutsideClick" parameter requires `backdrop` parameter to be set to `true`');

    for (var _n in e) {
      t = _n, B(t) || a('Unknown parameter "'.concat(t, '"')), e.toast && (t = _n, P.includes(t) && a('The parameter "'.concat(t, '" is incompatible with toasts'))), t = _n, E(t) && o(t, E(t));
    }

    var t;
  };

  var e = function e(_e2) {
    var t = {};

    for (var _n2 in _e2) {
      t[_e2[_n2]] = "swal2-" + _e2[_n2];
    }

    return t;
  };

  var p = e(["container", "shown", "height-auto", "iosfix", "popup", "modal", "no-backdrop", "no-transition", "toast", "toast-shown", "show", "hide", "close", "title", "html-container", "actions", "confirm", "deny", "cancel", "default-outline", "footer", "icon", "icon-content", "image", "input", "file", "range", "select", "radio", "checkbox", "label", "textarea", "inputerror", "input-label", "validation-message", "progress-steps", "active-progress-step", "progress-step", "progress-step-line", "loader", "loading", "styled", "top", "top-start", "top-end", "top-left", "top-right", "center", "center-start", "center-end", "center-left", "center-right", "bottom", "bottom-start", "bottom-end", "bottom-left", "bottom-right", "grow-row", "grow-column", "grow-fullscreen", "rtl", "timer-progress-bar", "timer-progress-bar-container", "scrollbar-measure", "icon-success", "icon-warning", "icon-info", "icon-question", "icon-error"]),
      S = e(["success", "warning", "info", "question", "error"]),
      m = function m() {
    return document.body.querySelector(".".concat(p.container));
  },
      L = function L(e) {
    var t = m();
    return t ? t.querySelector(e) : null;
  },
      O = function O(e) {
    return L(".".concat(e));
  },
      g = function g() {
    return O(p.popup);
  },
      j = function j() {
    return O(p.icon);
  },
      M = function M() {
    return O(p.title);
  },
      D = function D() {
    return O(p["html-container"]);
  },
      I = function I() {
    return O(p.image);
  },
      H = function H() {
    return O(p["progress-steps"]);
  },
      q = function q() {
    return O(p["validation-message"]);
  },
      V = function V() {
    return L(".".concat(p.actions, " .").concat(p.confirm));
  },
      N = function N() {
    return L(".".concat(p.actions, " .").concat(p.deny));
  };

  var R = function R() {
    return L(".".concat(p.loader));
  },
      F = function F() {
    return L(".".concat(p.actions, " .").concat(p.cancel));
  },
      U = function U() {
    return O(p.actions);
  },
      W = function W() {
    return O(p.footer);
  },
      z = function z() {
    return O(p["timer-progress-bar"]);
  },
      _ = function _() {
    return O(p.close);
  },
      K = function K() {
    var e = i(g().querySelectorAll('[tabindex]:not([tabindex="-1"]):not([tabindex="0"])')).sort(function (e, t) {
      e = parseInt(e.getAttribute("tabindex")), t = parseInt(t.getAttribute("tabindex"));
      return t < e ? 1 : e < t ? -1 : 0;
    });
    var t = i(g().querySelectorAll('\n  a[href],\n  area[href],\n  input:not([disabled]),\n  select:not([disabled]),\n  textarea:not([disabled]),\n  button:not([disabled]),\n  iframe,\n  object,\n  embed,\n  [tabindex="0"],\n  [contenteditable],\n  audio[controls],\n  video[controls],\n  summary\n')).filter(function (e) {
      return "-1" !== e.getAttribute("tabindex");
    });
    return function (t) {
      var n = [];

      for (var _e3 = 0; _e3 < t.length; _e3++) {
        -1 === n.indexOf(t[_e3]) && n.push(t[_e3]);
      }

      return n;
    }(e.concat(t)).filter(function (e) {
      return ce(e);
    });
  },
      Y = function Y() {
    return !$(document.body, p["toast-shown"]) && !$(document.body, p["no-backdrop"]);
  },
      Z = function Z() {
    return g() && $(g(), p.toast);
  };

  function J(e) {
    var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
    var n = z();
    ce(n) && (t && (n.style.transition = "none", n.style.width = "100%"), setTimeout(function () {
      n.style.transition = "width ".concat(e / 1e3, "s linear"), n.style.width = "0%";
    }, 10));
  }

  var X = {
    previousBodyPadding: null
  },
      l = function l(t, e) {
    if (t.textContent = "", e) {
      var _n3 = new DOMParser(),
          _o = _n3.parseFromString(e, "text/html");

      i(_o.querySelector("head").childNodes).forEach(function (e) {
        t.appendChild(e);
      }), i(_o.querySelector("body").childNodes).forEach(function (e) {
        t.appendChild(e);
      });
    }
  },
      $ = function $(t, e) {
    if (!e) return !1;
    var n = e.split(/\s+/);

    for (var _e4 = 0; _e4 < n.length; _e4++) {
      if (!t.classList.contains(n[_e4])) return !1;
    }

    return !0;
  },
      G = function G(t, n) {
    i(t.classList).forEach(function (e) {
      Object.values(p).includes(e) || Object.values(S).includes(e) || Object.values(n.showClass).includes(e) || t.classList.remove(e);
    });
  },
      Q = function Q(e, t, n) {
    if (G(e, t), t.customClass && t.customClass[n]) {
      if ("string" != typeof t.customClass[n] && !t.customClass[n].forEach) return a("Invalid type of customClass.".concat(n, '! Expected string or iterable object, got "').concat(_typeof(t.customClass[n]), '"'));
      u(e, t.customClass[n]);
    }
  },
      ee = function ee(e, t) {
    if (!t) return null;

    switch (t) {
      case "select":
      case "textarea":
      case "file":
        return e.querySelector(".".concat(p.popup, " > .").concat(p[t]));

      case "checkbox":
        return e.querySelector(".".concat(p.popup, " > .").concat(p.checkbox, " input"));

      case "radio":
        return e.querySelector(".".concat(p.popup, " > .").concat(p.radio, " input:checked")) || e.querySelector(".".concat(p.popup, " > .").concat(p.radio, " input:first-child"));

      case "range":
        return e.querySelector(".".concat(p.popup, " > .").concat(p.range, " input"));

      default:
        return e.querySelector(".".concat(p.popup, " > .").concat(p.input));
    }
  },
      te = function te(e) {
    var t;
    e.focus(), "file" !== e.type && (t = e.value, e.value = "", e.value = t);
  },
      ne = function ne(e, t, n) {
    e && t && (t = "string" == typeof t ? t.split(/\s+/).filter(Boolean) : t).forEach(function (t) {
      Array.isArray(e) ? e.forEach(function (e) {
        n ? e.classList.add(t) : e.classList.remove(t);
      }) : n ? e.classList.add(t) : e.classList.remove(t);
    });
  },
      u = function u(e, t) {
    ne(e, t, !0);
  },
      oe = function oe(e, t) {
    ne(e, t, !1);
  },
      ie = function ie(e, t) {
    var n = i(e.childNodes);

    for (var _e5 = 0; _e5 < n.length; _e5++) {
      if ($(n[_e5], t)) return n[_e5];
    }
  },
      ae = function ae(e, t, n) {
    (n = n === "".concat(parseInt(n)) ? parseInt(n) : n) || 0 === parseInt(n) ? e.style[t] = "number" == typeof n ? "".concat(n, "px") : n : e.style.removeProperty(t);
  },
      d = function d(e) {
    e.style.display = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : "flex";
  },
      h = function h(e) {
    e.style.display = "none";
  },
      re = function re(e, t, n, o) {
    var i = e.querySelector(t);
    i && (i.style[n] = o);
  },
      se = function se(e, t, n) {
    t ? d(e, n) : h(e);
  },
      ce = function ce(e) {
    return !(!e || !(e.offsetWidth || e.offsetHeight || e.getClientRects().length));
  },
      le = function le() {
    return !ce(V()) && !ce(N()) && !ce(F());
  },
      ue = function ue(e) {
    return !!(e.scrollHeight > e.clientHeight);
  },
      de = function de(e) {
    var t = window.getComputedStyle(e);
    var e = parseFloat(t.getPropertyValue("animation-duration") || "0"),
        n = parseFloat(t.getPropertyValue("transition-duration") || "0");
    return 0 < e || 0 < n;
  },
      pe = function pe() {
    return "undefined" == typeof window || "undefined" == typeof document;
  },
      me = 100,
      f = {},
      ge = function ge() {
    f.previousActiveElement && f.previousActiveElement.focus ? (f.previousActiveElement.focus(), f.previousActiveElement = null) : document.body && document.body.focus();
  },
      he = function he(o) {
    return new Promise(function (e) {
      if (!o) return e();
      var t = window.scrollX,
          n = window.scrollY;
      f.restoreFocusTimeout = setTimeout(function () {
        ge(), e();
      }, me), window.scrollTo(t, n);
    });
  },
      fe = '\n <div aria-labelledby="'.concat(p.title, '" aria-describedby="').concat(p["html-container"], '" class="').concat(p.popup, '" tabindex="-1">\n   <button type="button" class="').concat(p.close, '"></button>\n   <ul class="').concat(p["progress-steps"], '"></ul>\n   <div class="').concat(p.icon, '"></div>\n   <img class="').concat(p.image, '" />\n   <h2 class="').concat(p.title, '" id="').concat(p.title, '"></h2>\n   <div class="').concat(p["html-container"], '" id="').concat(p["html-container"], '"></div>\n   <input class="').concat(p.input, '" />\n   <input type="file" class="').concat(p.file, '" />\n   <div class="').concat(p.range, '">\n     <input type="range" />\n     <output></output>\n   </div>\n   <select class="').concat(p.select, '"></select>\n   <div class="').concat(p.radio, '"></div>\n   <label for="').concat(p.checkbox, '" class="').concat(p.checkbox, '">\n     <input type="checkbox" />\n     <span class="').concat(p.label, '"></span>\n   </label>\n   <textarea class="').concat(p.textarea, '"></textarea>\n   <div class="').concat(p["validation-message"], '" id="').concat(p["validation-message"], '"></div>\n   <div class="').concat(p.actions, '">\n     <div class="').concat(p.loader, '"></div>\n     <button type="button" class="').concat(p.confirm, '"></button>\n     <button type="button" class="').concat(p.deny, '"></button>\n     <button type="button" class="').concat(p.cancel, '"></button>\n   </div>\n   <div class="').concat(p.footer, '"></div>\n   <div class="').concat(p["timer-progress-bar-container"], '">\n     <div class="').concat(p["timer-progress-bar"], '"></div>\n   </div>\n </div>\n').replace(/(^|\n)\s*/g, ""),
      be = function be() {
    var e = m();
    return !!e && (e.remove(), oe([document.documentElement, document.body], [p["no-backdrop"], p["toast-shown"], p["has-column"]]), !0);
  },
      ye = function ye() {
    f.currentInstance.resetValidationMessage();
  },
      ve = function ve() {
    var e = g(),
        t = ie(e, p.input),
        n = ie(e, p.file),
        o = e.querySelector(".".concat(p.range, " input")),
        i = e.querySelector(".".concat(p.range, " output")),
        a = ie(e, p.select),
        r = e.querySelector(".".concat(p.checkbox, " input")),
        s = ie(e, p.textarea);
    t.oninput = ye, n.onchange = ye, a.onchange = ye, r.onchange = ye, s.oninput = ye, o.oninput = function () {
      ye(), i.value = o.value;
    }, o.onchange = function () {
      ye(), o.nextSibling.value = o.value;
    };
  },
      we = function we(e) {
    return "string" == typeof e ? document.querySelector(e) : e;
  },
      Ce = function Ce(e) {
    var t = g();
    t.setAttribute("role", e.toast ? "alert" : "dialog"), t.setAttribute("aria-live", e.toast ? "polite" : "assertive"), e.toast || t.setAttribute("aria-modal", "true");
  },
      ke = function ke(e) {
    "rtl" === window.getComputedStyle(e).direction && u(m(), p.rtl);
  },
      Ae = function Ae(e, t) {
    if (e instanceof HTMLElement) t.appendChild(e);else if ("object" == _typeof(e)) {
      var n = e,
          o = t;
      if (n.jquery) Pe(o, n);else l(o, n.toString());
    } else e && l(t, e);
  },
      Pe = function Pe(t, n) {
    if (t.textContent = "", 0 in n) for (var _e6 = 0; (_e6 in n); _e6++) {
      t.appendChild(n[_e6].cloneNode(!0));
    } else t.appendChild(n.cloneNode(!0));
  },
      Be = function () {
    if (pe()) return !1;
    var e = document.createElement("div"),
        t = {
      WebkitAnimation: "webkitAnimationEnd",
      animation: "animationend"
    };

    for (var _n4 in t) {
      if (Object.prototype.hasOwnProperty.call(t, _n4) && void 0 !== e.style[_n4]) return t[_n4];
    }

    return !1;
  }(),
      xe = function xe(e, t) {
    var n,
        o,
        i,
        a,
        r,
        s = U(),
        c = R();
    (t.showConfirmButton || t.showDenyButton || t.showCancelButton ? d : h)(s), Q(s, t, "actions"), s = s, n = c, o = t, i = V(), a = N(), r = F(), Ee(i, "confirm", o), Ee(a, "deny", o), Ee(r, "cancel", o), function (e, t, n, o) {
      if (!o.buttonsStyling) return oe([e, t, n], p.styled);
      u([e, t, n], p.styled), o.confirmButtonColor && (e.style.backgroundColor = o.confirmButtonColor, u(e, p["default-outline"]));
      o.denyButtonColor && (t.style.backgroundColor = o.denyButtonColor, u(t, p["default-outline"]));
      o.cancelButtonColor && (n.style.backgroundColor = o.cancelButtonColor, u(n, p["default-outline"]));
    }(i, a, r, o), o.reverseButtons && (o.toast ? (s.insertBefore(r, i), s.insertBefore(a, i)) : (s.insertBefore(r, n), s.insertBefore(a, n), s.insertBefore(i, n))), l(c, t.loaderHtml), Q(c, t, "loader");
  };

  function Ee(e, t, n) {
    se(e, n["show".concat(y(t), "Button")], "inline-block"), l(e, n["".concat(t, "ButtonText")]), e.setAttribute("aria-label", n["".concat(t, "ButtonAriaLabel")]), e.className = p[t], Q(e, n, "".concat(t, "Button")), u(e, n["".concat(t, "ButtonClass")]);
  }

  var Te = function Te(e, t) {
    var n,
        o,
        i = m();
    i && (o = i, "string" == typeof (n = t.backdrop) ? o.style.background = n : n || u([document.documentElement, document.body], p["no-backdrop"]), o = i, (n = t.position) in p ? u(o, p[n]) : (a('The "position" parameter is not valid, defaulting to "center"'), u(o, p.center)), n = i, !(o = t.grow) || "string" != typeof o || (o = "grow-".concat(o)) in p && u(n, p[o]), Q(i, t, "container"));
  };

  var b = {
    awaitingPromise: new WeakMap(),
    promise: new WeakMap(),
    innerParams: new WeakMap(),
    domCache: new WeakMap()
  };

  var Se = ["input", "file", "range", "select", "radio", "checkbox", "textarea"],
      Le = function Le(e, r) {
    var s = g();
    var t,
        e = b.innerParams.get(e);
    var c = !e || r.input !== e.input;
    Se.forEach(function (e) {
      var t = p[e];
      var n = ie(s, t);
      {
        var o = r.inputAttributes;

        var _i = ee(g(), e);

        if (_i) {
          Oe(_i);

          for (var _a in o) {
            _i.setAttribute(_a, o[_a]);
          }
        }
      }
      n.className = t, c && h(n);
    }), r.input && (c && function (e) {
      if (!Ie[e.input]) return v('Unexpected type of input! Expected "text", "email", "password", "number", "tel", "select", "radio", "checkbox", "textarea", "file" or "url", got "'.concat(e.input, '"'));
      var t = De(e.input),
          n = Ie[e.input](t, e);
      d(n), setTimeout(function () {
        te(n);
      });
    }(r), e = r, t = De(e.input), e.customClass && u(t, e.customClass.input));
  },
      Oe = function Oe(t) {
    for (var _e7 = 0; _e7 < t.attributes.length; _e7++) {
      var n = t.attributes[_e7].name;
      ["type", "value", "style"].includes(n) || t.removeAttribute(n);
    }
  },
      je = function je(e, t) {
    e.placeholder && !t.inputPlaceholder || (e.placeholder = t.inputPlaceholder);
  },
      Me = function Me(e, t, n) {
    if (n.inputLabel) {
      e.id = p.input;

      var _i2 = document.createElement("label");

      var o = p["input-label"];
      _i2.setAttribute("for", e.id), _i2.className = o, u(_i2, n.customClass.inputLabel), _i2.innerText = n.inputLabel, t.insertAdjacentElement("beforebegin", _i2);
    }
  },
      De = function De(e) {
    e = p[e] || p.input;
    return ie(g(), e);
  },
      Ie = {},
      He = (Ie.text = Ie.email = Ie.password = Ie.number = Ie.tel = Ie.url = function (e, t) {
    return "string" == typeof t.inputValue || "number" == typeof t.inputValue ? e.value = t.inputValue : A(t.inputValue) || a('Unexpected type of inputValue! Expected "string", "number" or "Promise", got "'.concat(_typeof(t.inputValue), '"')), Me(e, e, t), je(e, t), e.type = t.input, e;
  }, Ie.file = function (e, t) {
    return Me(e, e, t), je(e, t), e;
  }, Ie.range = function (e, t) {
    var n = e.querySelector("input"),
        o = e.querySelector("output");
    return n.value = t.inputValue, n.type = t.input, o.value = t.inputValue, Me(n, e, t), e;
  }, Ie.select = function (e, t) {
    if (e.textContent = "", t.inputPlaceholder) {
      var _n5 = document.createElement("option");

      l(_n5, t.inputPlaceholder), _n5.value = "", _n5.disabled = !0, _n5.selected = !0, e.appendChild(_n5);
    }

    return Me(e, e, t), e;
  }, Ie.radio = function (e) {
    return e.textContent = "", e;
  }, Ie.checkbox = function (e, t) {
    var n = ee(g(), "checkbox");
    n.value = "1", n.id = p.checkbox, n.checked = Boolean(t.inputValue);
    var o = e.querySelector("span");
    return l(o, t.inputPlaceholder), e;
  }, Ie.textarea = function (n, e) {
    n.value = e.inputValue, je(n, e), Me(n, n, e);
    return setTimeout(function () {
      if ("MutationObserver" in window) {
        var _t2 = parseInt(window.getComputedStyle(g()).width);

        new MutationObserver(function () {
          var e = n.offsetWidth + (e = n, parseInt(window.getComputedStyle(e).marginLeft) + parseInt(window.getComputedStyle(e).marginRight));
          e > _t2 ? g().style.width = "".concat(e, "px") : g().style.width = null;
        }).observe(n, {
          attributes: !0,
          attributeFilter: ["style"]
        });
      }
    }), n;
  }, function (e, t) {
    var n = D();
    Q(n, t, "htmlContainer"), t.html ? (Ae(t.html, n), d(n, "block")) : t.text ? (n.textContent = t.text, d(n, "block")) : h(n), Le(e, t);
  }),
      qe = function qe(e, t) {
    var n = W();
    se(n, t.footer), t.footer && Ae(t.footer, n), Q(n, t, "footer");
  },
      Ve = function Ve(e, t) {
    var n = _();

    l(n, t.closeButtonHtml), Q(n, t, "closeButton"), se(n, t.showCloseButton), n.setAttribute("aria-label", t.closeButtonAriaLabel);
  },
      Ne = function Ne(e, t) {
    var e = b.innerParams.get(e),
        n = j();
    return e && t.icon === e.icon ? (ze(n, t), void Re(n, t)) : t.icon || t.iconHtml ? t.icon && -1 === Object.keys(S).indexOf(t.icon) ? (v('Unknown icon! Expected "success", "error", "warning", "info" or "question", got "'.concat(t.icon, '"')), h(n)) : (d(n), ze(n, t), Re(n, t), void u(n, t.showClass.icon)) : h(n);
  },
      Re = function Re(e, t) {
    for (var _n6 in S) {
      t.icon !== _n6 && oe(e, S[_n6]);
    }

    u(e, S[t.icon]), _e(e, t), Fe(), Q(e, t, "icon");
  },
      Fe = function Fe() {
    var e = g();
    var t = window.getComputedStyle(e).getPropertyValue("background-color");
    var n = e.querySelectorAll("[class^=swal2-success-circular-line], .swal2-success-fix");

    for (var _e8 = 0; _e8 < n.length; _e8++) {
      n[_e8].style.backgroundColor = t;
    }
  },
      Ue = '\n  <div class="swal2-success-circular-line-left"></div>\n  <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>\n  <div class="swal2-success-ring"></div> <div class="swal2-success-fix"></div>\n  <div class="swal2-success-circular-line-right"></div>\n',
      We = '\n  <span class="swal2-x-mark">\n    <span class="swal2-x-mark-line-left"></span>\n    <span class="swal2-x-mark-line-right"></span>\n  </span>\n',
      ze = function ze(e, t) {
    var n;
    e.textContent = "", t.iconHtml ? l(e, Ke(t.iconHtml)) : "success" === t.icon ? l(e, Ue) : "error" === t.icon ? l(e, We) : (n = {
      question: "?",
      warning: "!",
      info: "i"
    }, l(e, Ke(n[t.icon])));
  },
      _e = function _e(e, t) {
    if (t.iconColor) {
      e.style.color = t.iconColor, e.style.borderColor = t.iconColor;

      for (var _i3 = 0, _arr = [".swal2-success-line-tip", ".swal2-success-line-long", ".swal2-x-mark-line-left", ".swal2-x-mark-line-right"]; _i3 < _arr.length; _i3++) {
        var _n7 = _arr[_i3];
        re(e, _n7, "backgroundColor", t.iconColor);
      }

      re(e, ".swal2-success-ring", "borderColor", t.iconColor);
    }
  },
      Ke = function Ke(e) {
    return '<div class="'.concat(p["icon-content"], '">').concat(e, "</div>");
  },
      Ye = function Ye(e, t) {
    var n = I();
    if (!t.imageUrl) return h(n);
    d(n, ""), n.setAttribute("src", t.imageUrl), n.setAttribute("alt", t.imageAlt), ae(n, "width", t.imageWidth), ae(n, "height", t.imageHeight), n.className = p.image, Q(n, t, "image");
  },
      Ze = function Ze(e, o) {
    var i = H();
    if (!o.progressSteps || 0 === o.progressSteps.length) return h(i);
    d(i), i.textContent = "", o.currentProgressStep >= o.progressSteps.length && a("Invalid currentProgressStep parameter, it should be less than progressSteps.length (currentProgressStep like JS arrays starts from 0)"), o.progressSteps.forEach(function (e, t) {
      e = e, n = document.createElement("li"), u(n, p["progress-step"]), l(n, e);
      var n,
          e = n;
      i.appendChild(e), t === o.currentProgressStep && u(e, p["active-progress-step"]), t !== o.progressSteps.length - 1 && (n = function (e) {
        var t = document.createElement("li");
        return u(t, p["progress-step-line"]), e.progressStepsDistance && (t.style.width = e.progressStepsDistance), t;
      }(o), i.appendChild(n));
    });
  },
      Je = function Je(e, t) {
    var n = M();
    se(n, t.title || t.titleText, "block"), t.title && Ae(t.title, n), t.titleText && (n.innerText = t.titleText), Q(n, t, "title");
  },
      Xe = function Xe(e, t) {
    var n = m();
    var o = g();
    t.toast ? (ae(n, "width", t.width), o.style.width = "100%", o.insertBefore(R(), j())) : ae(o, "width", t.width), ae(o, "padding", t.padding), t.color && (o.style.color = t.color), t.background && (o.style.background = t.background), h(q());
    n = o;
    (n.className = "".concat(p.popup, " ").concat(ce(n) ? t.showClass.popup : ""), t.toast) ? (u([document.documentElement, document.body], p["toast-shown"]), u(n, p.toast)) : u(n, p.modal);
    Q(n, t, "popup"), "string" == typeof t.customClass && u(n, t.customClass);
    t.icon && u(n, p["icon-".concat(t.icon)]);
  },
      $e = function $e(e, t) {
    Xe(e, t), Te(e, t), Ze(e, t), Ne(e, t), Ye(e, t), Je(e, t), Ve(e, t), He(e, t), xe(e, t), qe(e, t), "function" == typeof t.didRender && t.didRender(g());
  },
      Ge = Object.freeze({
    cancel: "cancel",
    backdrop: "backdrop",
    close: "close",
    esc: "esc",
    timer: "timer"
  }),
      Qe = function Qe() {
    var e = i(document.body.children);
    e.forEach(function (e) {
      e === m() || e.contains(m()) || (e.hasAttribute("aria-hidden") && e.setAttribute("data-previous-aria-hidden", e.getAttribute("aria-hidden")), e.setAttribute("aria-hidden", "true"));
    });
  },
      et = function et() {
    var e = i(document.body.children);
    e.forEach(function (e) {
      e.hasAttribute("data-previous-aria-hidden") ? (e.setAttribute("aria-hidden", e.getAttribute("data-previous-aria-hidden")), e.removeAttribute("data-previous-aria-hidden")) : e.removeAttribute("aria-hidden");
    });
  },
      tt = ["swal-title", "swal-html", "swal-footer"],
      nt = function nt(e) {
    var n = {};
    return i(e.querySelectorAll("swal-param")).forEach(function (e) {
      lt(e, ["name", "value"]);
      var t = e.getAttribute("name"),
          e = e.getAttribute("value");
      "boolean" == typeof r[t] && "false" === e && (n[t] = !1), "object" == _typeof(r[t]) && (n[t] = JSON.parse(e));
    }), n;
  },
      ot = function ot(e) {
    var n = {};
    return i(e.querySelectorAll("swal-button")).forEach(function (e) {
      lt(e, ["type", "color", "aria-label"]);
      var t = e.getAttribute("type");
      n["".concat(t, "ButtonText")] = e.innerHTML, n["show".concat(y(t), "Button")] = !0, e.hasAttribute("color") && (n["".concat(t, "ButtonColor")] = e.getAttribute("color")), e.hasAttribute("aria-label") && (n["".concat(t, "ButtonAriaLabel")] = e.getAttribute("aria-label"));
    }), n;
  },
      it = function it(e) {
    var t = {},
        n = e.querySelector("swal-image");
    return n && (lt(n, ["src", "width", "height", "alt"]), n.hasAttribute("src") && (t.imageUrl = n.getAttribute("src")), n.hasAttribute("width") && (t.imageWidth = n.getAttribute("width")), n.hasAttribute("height") && (t.imageHeight = n.getAttribute("height")), n.hasAttribute("alt") && (t.imageAlt = n.getAttribute("alt"))), t;
  },
      at = function at(e) {
    var t = {},
        n = e.querySelector("swal-icon");
    return n && (lt(n, ["type", "color"]), n.hasAttribute("type") && (t.icon = n.getAttribute("type")), n.hasAttribute("color") && (t.iconColor = n.getAttribute("color")), t.iconHtml = n.innerHTML), t;
  },
      rt = function rt(e) {
    var n = {},
        t = e.querySelector("swal-input");
    t && (lt(t, ["type", "label", "placeholder", "value"]), n.input = t.getAttribute("type") || "text", t.hasAttribute("label") && (n.inputLabel = t.getAttribute("label")), t.hasAttribute("placeholder") && (n.inputPlaceholder = t.getAttribute("placeholder")), t.hasAttribute("value") && (n.inputValue = t.getAttribute("value")));
    e = e.querySelectorAll("swal-input-option");
    return e.length && (n.inputOptions = {}, i(e).forEach(function (e) {
      lt(e, ["value"]);
      var t = e.getAttribute("value"),
          e = e.innerHTML;
      n.inputOptions[t] = e;
    })), n;
  },
      st = function st(e, t) {
    var n = {};

    for (var _o2 in t) {
      var _i4 = t[_o2],
          _a2 = e.querySelector(_i4);

      _a2 && (lt(_a2, []), n[_i4.replace(/^swal-/, "")] = _a2.innerHTML.trim());
    }

    return n;
  },
      ct = function ct(e) {
    var t = tt.concat(["swal-param", "swal-button", "swal-image", "swal-icon", "swal-input", "swal-input-option"]);
    i(e.children).forEach(function (e) {
      e = e.tagName.toLowerCase();
      -1 === t.indexOf(e) && a("Unrecognized element <".concat(e, ">"));
    });
  },
      lt = function lt(t, n) {
    i(t.attributes).forEach(function (e) {
      -1 === n.indexOf(e.name) && a(['Unrecognized attribute "'.concat(e.name, '" on <').concat(t.tagName.toLowerCase(), ">."), "".concat(n.length ? "Allowed attributes are: ".concat(n.join(", ")) : "To set the value, use HTML within the element.")]);
    });
  };

  var ut = {
    email: function email(e, t) {
      return /^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9-]{2,24}$/.test(e) ? Promise.resolve() : Promise.resolve(t || "Invalid email address");
    },
    url: function url(e, t) {
      return /^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._+~#=]{1,256}\.[a-z]{2,63}\b([-a-zA-Z0-9@:%_+.~#?&/=]*)$/.test(e) ? Promise.resolve() : Promise.resolve(t || "Invalid URL");
    }
  };

  function dt(e) {
    (t = e).inputValidator || Object.keys(ut).forEach(function (e) {
      t.input === e && (t.inputValidator = ut[e]);
    }), e.showLoaderOnConfirm && !e.preConfirm && a("showLoaderOnConfirm is set to true, but preConfirm is not defined.\nshowLoaderOnConfirm should be used together with preConfirm, see usage example:\nhttps://sweetalert2.github.io/#ajax-request"), (n = e).target && ("string" != typeof n.target || document.querySelector(n.target)) && ("string" == typeof n.target || n.target.appendChild) || (a('Target parameter is not valid, defaulting to "body"'), n.target = "body"), "string" == typeof e.title && (e.title = e.title.split("\n").join("<br />"));
    var t,
        n = e,
        e = be();
    if (pe()) v("SweetAlert2 requires document to initialize");else {
      var _o3 = document.createElement("div"),
          _i5 = (_o3.className = p.container, e && u(_o3, p["no-transition"]), l(_o3, fe), we(n.target));

      _i5.appendChild(_o3), Ce(n), ke(_i5), ve();
    }
  }

  var pt = /*#__PURE__*/function () {
    function pt(e, t) {
      _classCallCheck(this, pt);

      this.callback = e, this.remaining = t, this.running = !1, this.start();
    }

    _createClass(pt, [{
      key: "start",
      value: function start() {
        return this.running || (this.running = !0, this.started = new Date(), this.id = setTimeout(this.callback, this.remaining)), this.remaining;
      }
    }, {
      key: "stop",
      value: function stop() {
        return this.running && (this.running = !1, clearTimeout(this.id), this.remaining -= new Date().getTime() - this.started.getTime()), this.remaining;
      }
    }, {
      key: "increase",
      value: function increase(e) {
        var t = this.running;
        return t && this.stop(), this.remaining += e, t && this.start(), this.remaining;
      }
    }, {
      key: "getTimerLeft",
      value: function getTimerLeft() {
        return this.running && (this.stop(), this.start()), this.remaining;
      }
    }, {
      key: "isRunning",
      value: function isRunning() {
        return this.running;
      }
    }]);

    return pt;
  }();

  var mt = function mt() {
    null === X.previousBodyPadding && document.body.scrollHeight > window.innerHeight && (X.previousBodyPadding = parseInt(window.getComputedStyle(document.body).getPropertyValue("padding-right")), document.body.style.paddingRight = "".concat(X.previousBodyPadding + function () {
      var e = document.createElement("div");
      e.className = p["scrollbar-measure"], document.body.appendChild(e);
      var t = e.getBoundingClientRect().width - e.clientWidth;
      return document.body.removeChild(e), t;
    }(), "px"));
  },
      gt = function gt() {
    null !== X.previousBodyPadding && (document.body.style.paddingRight = "".concat(X.previousBodyPadding, "px"), X.previousBodyPadding = null);
  },
      ht = function ht() {
    var e = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream || "MacIntel" === navigator.platform && 1 < navigator.maxTouchPoints;

    if (e && !$(document.body, p.iosfix)) {
      var t,
          e = document.body.scrollTop;
      document.body.style.top = "".concat(-1 * e, "px"), u(document.body, p.iosfix);
      {
        var _n8 = m();

        var _t3;

        _n8.ontouchstart = function (e) {
          _t3 = ft(e);
        }, _n8.ontouchmove = function (e) {
          _t3 && (e.preventDefault(), e.stopPropagation());
        };
      }
      {
        var _o4 = navigator.userAgent,
            _i6 = !!_o4.match(/iPad/i) || !!_o4.match(/iPhone/i),
            _a3 = !!_o4.match(/WebKit/i),
            _r = _i6 && _a3 && !_o4.match(/CriOS/i);

        _r && (t = 44, g().scrollHeight > window.innerHeight - 44 && (m().style.paddingBottom = "".concat(44, "px")));
      }
    }
  },
      ft = function ft(e) {
    var t,
        n = e.target,
        o = m();
    return !((t = e).touches && t.touches.length && "stylus" === t.touches[0].touchType || (t = e).touches && 1 < t.touches.length) && (n === o || !(ue(o) || "INPUT" === n.tagName || "TEXTAREA" === n.tagName || ue(D()) && D().contains(n)));
  },
      bt = function bt() {
    var e;
    $(document.body, p.iosfix) && (e = parseInt(document.body.style.top, 10), oe(document.body, p.iosfix), document.body.style.top = "", document.body.scrollTop = -1 * e);
  },
      yt = 10,
      vt = function vt(e) {
    var t = g();

    if (e.target === t) {
      var _n9 = m();

      t.removeEventListener(Be, vt), _n9.style.overflowY = "auto";
    }
  },
      wt = function wt(e, t) {
    Be && de(t) ? (e.style.overflowY = "hidden", t.addEventListener(Be, vt)) : e.style.overflowY = "auto";
  },
      Ct = function Ct(e, t, n) {
    ht(), t && "hidden" !== n && mt(), setTimeout(function () {
      e.scrollTop = 0;
    });
  },
      kt = function kt(e, t, n) {
    u(e, n.showClass.backdrop), t.style.setProperty("opacity", "0", "important"), d(t, "grid"), setTimeout(function () {
      u(t, n.showClass.popup), t.style.removeProperty("opacity");
    }, yt), u([document.documentElement, document.body], p.shown), n.heightAuto && n.backdrop && !n.toast && u([document.documentElement, document.body], p["height-auto"]);
  },
      At = function At(e) {
    var t = g();
    t || new vn(), t = g();
    var n = R();
    if (Z()) h(j());else {
      var o = t;

      var _i7 = U(),
          _a4 = R();

      !e && ce(V()) && (e = V());
      d(_i7), e && (h(e), _a4.setAttribute("data-button-to-replace", e.className));
      _a4.parentNode.insertBefore(_a4, e), u([o, _i7], p.loading);
    }
    d(n), t.setAttribute("data-loading", !0), t.setAttribute("aria-busy", !0), t.focus();
  },
      Pt = function Pt(t, n) {
    var o = g(),
        i = function i(e) {
      return xt[n.input](o, Et(e), n);
    };

    C(n.inputOptions) || A(n.inputOptions) ? (At(V()), k(n.inputOptions).then(function (e) {
      t.hideLoading(), i(e);
    })) : "object" == _typeof(n.inputOptions) ? i(n.inputOptions) : v("Unexpected type of inputOptions! Expected object, Map or Promise, got ".concat(_typeof(n.inputOptions)));
  },
      Bt = function Bt(t, n) {
    var o = t.getInput();
    h(o), k(n.inputValue).then(function (e) {
      o.value = "number" === n.input ? parseFloat(e) || 0 : "".concat(e), d(o), o.focus(), t.hideLoading();
    })["catch"](function (e) {
      v("Error in inputValue promise: ".concat(e)), o.value = "", d(o), o.focus(), t.hideLoading();
    });
  },
      xt = {
    select: function select(e, t, i) {
      var a = ie(e, p.select),
          r = function r(e, t, n) {
        var o = document.createElement("option");
        o.value = n, l(o, t), o.selected = Tt(n, i.inputValue), e.appendChild(o);
      };

      t.forEach(function (e) {
        var t = e[0];
        var n = e[1];

        if (Array.isArray(n)) {
          var _o5 = document.createElement("optgroup");

          _o5.label = t, _o5.disabled = !1, a.appendChild(_o5), n.forEach(function (e) {
            return r(_o5, e[1], e[0]);
          });
        } else r(a, n, t);
      }), a.focus();
    },
    radio: function radio(e, t, a) {
      var r = ie(e, p.radio),
          n = (t.forEach(function (e) {
        var t = e[0],
            e = e[1];
        var n = document.createElement("input"),
            o = document.createElement("label"),
            i = (n.type = "radio", n.name = p.radio, n.value = t, Tt(t, a.inputValue) && (n.checked = !0), document.createElement("span"));
        l(i, e), i.className = p.label, o.appendChild(n), o.appendChild(i), r.appendChild(o);
      }), r.querySelectorAll("input"));
      n.length && n[0].focus();
    }
  },
      Et = function Et(n) {
    var o = [];
    return "undefined" != typeof Map && n instanceof Map ? n.forEach(function (e, t) {
      var n = e;
      "object" == _typeof(n) && (n = Et(n)), o.push([t, n]);
    }) : Object.keys(n).forEach(function (e) {
      var t = n[e];
      "object" == _typeof(t) && (t = Et(t)), o.push([e, t]);
    }), o;
  },
      Tt = function Tt(e, t) {
    return t && t.toString() === e.toString();
  },
      St = function St(e, t) {
    var n = b.innerParams.get(e);
    if (!n.input) return v('The "input" parameter is needed to be set when using returnInputValueOn'.concat(y(t)));

    var o = function (e, t) {
      var n = e.getInput();
      if (!n) return null;

      switch (t.input) {
        case "checkbox":
          return n.checked ? 1 : 0;

        case "radio":
          return (o = n).checked ? o.value : null;

        case "file":
          return (o = n).files.length ? null !== o.getAttribute("multiple") ? o.files : o.files[0] : null;

        default:
          return t.inputAutoTrim ? n.value.trim() : n.value;
      }

      var o;
    }(e, n);

    if (n.inputValidator) {
      var i = e;
      var a = o;
      var r = t;

      var _s = b.innerParams.get(i),
          _c = (i.disableInput(), Promise.resolve().then(function () {
        return k(_s.inputValidator(a, _s.validationMessage));
      }));

      _c.then(function (e) {
        i.enableButtons(), i.enableInput(), e ? i.showValidationMessage(e) : ("deny" === r ? Lt : Mt)(i, a);
      });
    } else e.getInput().checkValidity() ? ("deny" === t ? Lt : Mt)(e, o) : (e.enableButtons(), e.showValidationMessage(n.validationMessage));
  },
      Lt = function Lt(t, n) {
    var e = b.innerParams.get(t || void 0);

    if (e.showLoaderOnDeny && At(N()), e.preDeny) {
      b.awaitingPromise.set(t || void 0, !0);

      var _o6 = Promise.resolve().then(function () {
        return k(e.preDeny(n, e.validationMessage));
      });

      _o6.then(function (e) {
        !1 === e ? t.hideLoading() : t.closePopup({
          isDenied: !0,
          value: void 0 === e ? n : e
        });
      })["catch"](function (e) {
        return jt(t || void 0, e);
      });
    } else t.closePopup({
      isDenied: !0,
      value: n
    });
  },
      Ot = function Ot(e, t) {
    e.closePopup({
      isConfirmed: !0,
      value: t
    });
  },
      jt = function jt(e, t) {
    e.rejectPromise(t);
  },
      Mt = function Mt(t, n) {
    var e = b.innerParams.get(t || void 0);

    if (e.showLoaderOnConfirm && At(), e.preConfirm) {
      t.resetValidationMessage(), b.awaitingPromise.set(t || void 0, !0);

      var _o7 = Promise.resolve().then(function () {
        return k(e.preConfirm(n, e.validationMessage));
      });

      _o7.then(function (e) {
        ce(q()) || !1 === e ? t.hideLoading() : Ot(t, void 0 === e ? n : e);
      })["catch"](function (e) {
        return jt(t || void 0, e);
      });
    } else Ot(t, n);
  },
      Dt = function Dt(n, e, o) {
    e.popup.onclick = function () {
      var e,
          t = b.innerParams.get(n);
      t && ((e = t).showConfirmButton || e.showDenyButton || e.showCancelButton || e.showCloseButton || t.timer || t.input) || o(Ge.close);
    };
  };

  var It = !1;

  var Ht = function Ht(t) {
    t.popup.onmousedown = function () {
      t.container.onmouseup = function (e) {
        t.container.onmouseup = void 0, e.target === t.container && (It = !0);
      };
    };
  },
      qt = function qt(t) {
    t.container.onmousedown = function () {
      t.popup.onmouseup = function (e) {
        t.popup.onmouseup = void 0, e.target !== t.popup && !t.popup.contains(e.target) || (It = !0);
      };
    };
  },
      Vt = function Vt(n, o, i) {
    o.container.onclick = function (e) {
      var t = b.innerParams.get(n);
      It ? It = !1 : e.target === o.container && w(t.allowOutsideClick) && i(Ge.backdrop);
    };
  };

  var Nt = function Nt() {
    return V() && V().click();
  };

  var Rt = function Rt(e, t, n) {
    var o = K();
    if (o.length) return (t += n) === o.length ? t = 0 : -1 === t && (t = o.length - 1), o[t].focus();
    g().focus();
  },
      Ft = ["ArrowRight", "ArrowDown"],
      Ut = ["ArrowLeft", "ArrowUp"],
      Wt = function Wt(e, n, o) {
    var i = b.innerParams.get(e);
    if (i) if (i.stopKeydownPropagation && n.stopPropagation(), "Enter" === n.key) e = e, a = n, t = i, w(t.allowEnterKey) && !a.isComposing && a.target && e.getInput() && a.target.outerHTML === e.getInput().outerHTML && (["textarea", "file"].includes(t.input) || (Nt(), a.preventDefault()));else if ("Tab" !== n.key) {
      if ([].concat(Ft, Ut).includes(n.key)) {
        e = n.key;

        var _s2 = V(),
            _c2 = N(),
            _d = F();

        if ([_s2, _c2, _d].includes(document.activeElement)) {
          var t = Ft.includes(e) ? "nextElementSibling" : "previousElementSibling";
          var _l = document.activeElement[t];
          _l instanceof HTMLElement && _l.focus();
        }
      } else if ("Escape" === n.key) {
        var a = n,
            e = i;

        if (w(e.allowEscapeKey)) {
          a.preventDefault();
          o(Ge.esc);
        }
      }
    } else {
      e = n;
      o = i;
      var u = e.target,
          r = K();

      var _t4 = -1;

      for (var _e9 = 0; _e9 < r.length; _e9++) {
        if (u === r[_e9]) {
          _t4 = _e9;
          break;
        }
      }

      e.shiftKey ? Rt(o, _t4, -1) : Rt(o, _t4, 1);
      e.stopPropagation(), e.preventDefault();
    }
  },
      zt = function zt(e) {
    return "object" == _typeof(e) && e.jquery;
  },
      _t = function _t(e) {
    return e instanceof Element || zt(e);
  };

  var Kt = function Kt() {
    if (f.timeout) {
      {
        var _n10 = z();

        var e = parseInt(window.getComputedStyle(_n10).width),
            t = (_n10.style.removeProperty("transition"), _n10.style.width = "100%", parseInt(window.getComputedStyle(_n10).width)),
            e = e / t * 100;
        _n10.style.removeProperty("transition"), _n10.style.width = "".concat(e, "%");
      }
      return f.timeout.stop();
    }
  },
      Yt = function Yt() {
    var e;
    if (f.timeout) return e = f.timeout.start(), J(e), e;
  };

  var Zt = !1;
  var Jt = {};

  var Xt = function Xt(t) {
    for (var _e10 = t.target; _e10 && _e10 !== document; _e10 = _e10.parentNode) {
      for (var _o8 in Jt) {
        var n = _e10.getAttribute(_o8);

        if (n) return void Jt[_o8].fire({
          template: n
        });
      }
    }
  };

  e = Object.freeze({
    isValidParameter: B,
    isUpdatableParameter: x,
    isDeprecatedParameter: E,
    argsToParams: function argsToParams(n) {
      var o = {};
      return "object" != _typeof(n[0]) || _t(n[0]) ? ["title", "html", "icon"].forEach(function (e, t) {
        t = n[t];
        "string" == typeof t || _t(t) ? o[e] = t : void 0 !== t && v("Unexpected type of ".concat(e, '! Expected "string" or "Element", got ').concat(_typeof(t)));
      }) : Object.assign(o, n[0]), o;
    },
    isVisible: function isVisible() {
      return ce(g());
    },
    clickConfirm: Nt,
    clickDeny: function clickDeny() {
      return N() && N().click();
    },
    clickCancel: function clickCancel() {
      return F() && F().click();
    },
    getContainer: m,
    getPopup: g,
    getTitle: M,
    getHtmlContainer: D,
    getImage: I,
    getIcon: j,
    getInputLabel: function getInputLabel() {
      return O(p["input-label"]);
    },
    getCloseButton: _,
    getActions: U,
    getConfirmButton: V,
    getDenyButton: N,
    getCancelButton: F,
    getLoader: R,
    getFooter: W,
    getTimerProgressBar: z,
    getFocusableElements: K,
    getValidationMessage: q,
    isLoading: function isLoading() {
      return g().hasAttribute("data-loading");
    },
    fire: function fire() {
      for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++) {
        t[n] = arguments[n];
      }

      return _construct(this, t);
    },
    mixin: function mixin(n) {
      var e = /*#__PURE__*/function (_this) {
        _inherits(e, _this);

        var _super = _createSuper(e);

        function e() {
          _classCallCheck(this, e);

          return _super.apply(this, arguments);
        }

        _createClass(e, [{
          key: "_main",
          value: function _main(_e11, t) {
            return _get(_getPrototypeOf(e.prototype), "_main", this).call(this, _e11, Object.assign({}, n, t));
          }
        }]);

        return e;
      }(this);

      return e;
    },
    showLoading: At,
    enableLoading: At,
    getTimerLeft: function getTimerLeft() {
      return f.timeout && f.timeout.getTimerLeft();
    },
    stopTimer: Kt,
    resumeTimer: Yt,
    toggleTimer: function toggleTimer() {
      var e = f.timeout;
      return e && (e.running ? Kt : Yt)();
    },
    increaseTimer: function increaseTimer(e) {
      if (f.timeout) return e = f.timeout.increase(e), J(e, !0), e;
    },
    isTimerRunning: function isTimerRunning() {
      return f.timeout && f.timeout.isRunning();
    },
    bindClickHandler: function bindClickHandler() {
      var e = 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : "data-swal-template";
      Jt[e] = this, Zt || (document.body.addEventListener("click", Xt), Zt = !0);
    }
  });

  function $t() {
    var e,
        t = b.innerParams.get(this);

    if (t) {
      var _n11 = b.domCache.get(this);

      h(_n11.loader), Z() ? t.icon && d(j()) : (t = _n11, (e = t.popup.getElementsByClassName(t.loader.getAttribute("data-button-to-replace"))).length ? d(e[0], "inline-block") : le() && h(t.actions)), oe([_n11.popup, _n11.actions], p.loading), _n11.popup.removeAttribute("aria-busy"), _n11.popup.removeAttribute("data-loading"), _n11.confirmButton.disabled = !1, _n11.denyButton.disabled = !1, _n11.cancelButton.disabled = !1;
    }
  }

  var Gt = {
    swalPromiseResolve: new WeakMap(),
    swalPromiseReject: new WeakMap()
  };

  function Qt(e, t, n, o) {
    Z() ? on(e, o) : (he(n).then(function () {
      return on(e, o);
    }), f.keydownTarget.removeEventListener("keydown", f.keydownHandler, {
      capture: f.keydownListenerCapture
    }), f.keydownHandlerAdded = !1), /^((?!chrome|android).)*safari/i.test(navigator.userAgent) ? (t.setAttribute("style", "display:none !important"), t.removeAttribute("class"), t.innerHTML = "") : t.remove(), Y() && (gt(), bt(), et()), oe([document.documentElement, document.body], [p.shown, p["height-auto"], p["no-backdrop"], p["toast-shown"]]);
  }

  function en(e) {
    e = void 0 !== (n = e) ? Object.assign({
      isConfirmed: !1,
      isDenied: !1,
      isDismissed: !1
    }, n) : {
      isConfirmed: !1,
      isDenied: !1,
      isDismissed: !0
    };
    var t = Gt.swalPromiseResolve.get(this);

    var n = function (e) {
      var t = g();
      if (!t) return false;
      var n = b.innerParams.get(e);
      if (!n || $(t, n.hideClass.popup)) return false;
      oe(t, n.showClass.popup), u(t, n.hideClass.popup);
      var o = m();
      return oe(o, n.showClass.backdrop), u(o, n.hideClass.backdrop), nn(e, t, n), true;
    }(this);

    this.isAwaitingPromise() ? e.isDismissed || (tn(this), t(e)) : n && t(e);
  }

  var tn = function tn(e) {
    e.isAwaitingPromise() && (b.awaitingPromise["delete"](e), b.innerParams.get(e) || e._destroy());
  },
      nn = function nn(e, t, n) {
    var o,
        i,
        a,
        r = m(),
        s = Be && de(t);
    "function" == typeof n.willClose && n.willClose(t), s ? (s = e, o = t, t = r, i = n.returnFocus, a = n.didClose, f.swalCloseEventFinishedCallback = Qt.bind(null, s, t, i, a), o.addEventListener(Be, function (e) {
      e.target === o && (f.swalCloseEventFinishedCallback(), delete f.swalCloseEventFinishedCallback);
    })) : Qt(e, r, n.returnFocus, n.didClose);
  },
      on = function on(e, t) {
    setTimeout(function () {
      "function" == typeof t && t.bind(e.params)(), e._destroy();
    });
  };

  function an(e, t, n) {
    var o = b.domCache.get(e);
    t.forEach(function (e) {
      o[e].disabled = n;
    });
  }

  function rn(e, t) {
    if (!e) return !1;

    if ("radio" === e.type) {
      var _n12 = e.parentNode.parentNode,
          _o9 = _n12.querySelectorAll("input");

      for (var _e12 = 0; _e12 < _o9.length; _e12++) {
        _o9[_e12].disabled = t;
      }
    } else e.disabled = t;
  }

  var sn = function sn(e) {
    e.isAwaitingPromise() ? (cn(b, e), b.awaitingPromise.set(e, !0)) : (cn(Gt, e), cn(b, e));
  },
      cn = function cn(e, t) {
    for (var _n13 in e) {
      e[_n13]["delete"](t);
    }
  };

  var ln = Object.freeze({
    hideLoading: $t,
    disableLoading: $t,
    getInput: function getInput(e) {
      var t = b.innerParams.get(e || this);
      return (e = b.domCache.get(e || this)) ? ee(e.popup, t.input) : null;
    },
    close: en,
    isAwaitingPromise: function isAwaitingPromise() {
      return !!b.awaitingPromise.get(this);
    },
    rejectPromise: function rejectPromise(e) {
      var t = Gt.swalPromiseReject.get(this);
      tn(this), t && t(e);
    },
    closePopup: en,
    closeModal: en,
    closeToast: en,
    enableButtons: function enableButtons() {
      an(this, ["confirmButton", "denyButton", "cancelButton"], !1);
    },
    disableButtons: function disableButtons() {
      an(this, ["confirmButton", "denyButton", "cancelButton"], !0);
    },
    enableInput: function enableInput() {
      return rn(this.getInput(), !1);
    },
    disableInput: function disableInput() {
      return rn(this.getInput(), !0);
    },
    showValidationMessage: function showValidationMessage(e) {
      var t = b.domCache.get(this);
      var n = b.innerParams.get(this);
      l(t.validationMessage, e), t.validationMessage.className = p["validation-message"], n.customClass && n.customClass.validationMessage && u(t.validationMessage, n.customClass.validationMessage), d(t.validationMessage);
      var o = this.getInput();
      o && (o.setAttribute("aria-invalid", !0), o.setAttribute("aria-describedby", p["validation-message"]), te(o), u(o, p.inputerror));
    },
    resetValidationMessage: function resetValidationMessage() {
      var e = b.domCache.get(this);
      e.validationMessage && h(e.validationMessage);
      var t = this.getInput();
      t && (t.removeAttribute("aria-invalid"), t.removeAttribute("aria-describedby"), oe(t, p.inputerror));
    },
    getProgressSteps: function getProgressSteps() {
      return b.domCache.get(this).progressSteps;
    },
    update: function update(e) {
      var t = g(),
          n = b.innerParams.get(this);
      if (!t || $(t, n.hideClass.popup)) return a("You're trying to update the closed or closing popup, that won't work. Use the update() method in preConfirm parameter or show a new popup.");
      t = function (t) {
        var n = {};
        return Object.keys(t).forEach(function (e) {
          if (x(e)) n[e] = t[e];else a('Invalid parameter to update: "'.concat(e, '". Updatable params are listed here: https://github.com/sweetalert2/sweetalert2/blob/master/src/utils/params.js\n\nIf you think this parameter should be updatable, request it here: https://github.com/sweetalert2/sweetalert2/issues/new?template=02_feature_request.md'));
        }), n;
      }(e), n = Object.assign({}, n, t), $e(this, n), b.innerParams.set(this, n), Object.defineProperties(this, {
        params: {
          value: Object.assign({}, this.params, e),
          writable: !1,
          enumerable: !0
        }
      });
    },
    _destroy: function _destroy() {
      var e = b.domCache.get(this);
      var t = b.innerParams.get(this);
      t ? (e.popup && f.swalCloseEventFinishedCallback && (f.swalCloseEventFinishedCallback(), delete f.swalCloseEventFinishedCallback), f.deferDisposalTimer && (clearTimeout(f.deferDisposalTimer), delete f.deferDisposalTimer), "function" == typeof t.didDestroy && t.didDestroy(), e = this, sn(e), delete e.params, delete f.keydownHandler, delete f.keydownTarget, delete f.currentInstance) : sn(this);
    }
  });
  var un;

  var dn = /*#__PURE__*/function () {
    function dn() {
      _classCallCheck(this, dn);

      if ("undefined" != typeof window) {
        un = this;

        for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++) {
          t[n] = arguments[n];
        }

        var o = Object.freeze(this.constructor.argsToParams(t)),
            o = (Object.defineProperties(this, {
          params: {
            value: o,
            writable: !1,
            enumerable: !0,
            configurable: !0
          }
        }), this._main(this.params));
        b.promise.set(this, o);
      }
    }

    _createClass(dn, [{
      key: "_main",
      value: function _main(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {},
            e = (T(Object.assign({}, t, e)), f.currentInstance && (f.currentInstance._destroy(), Y() && et()), f.currentInstance = this, mn(e, t)),
            t = (dt(e), Object.freeze(e), f.timeout && (f.timeout.stop(), delete f.timeout), clearTimeout(f.restoreFocusTimeout), gn(this));
        return $e(this, e), b.innerParams.set(this, e), pn(this, t, e);
      }
    }, {
      key: "then",
      value: function then(e) {
        var t = b.promise.get(this);
        return t.then(e);
      }
    }, {
      key: "finally",
      value: function _finally(e) {
        var t = b.promise.get(this);
        return t["finally"](e);
      }
    }]);

    return dn;
  }();

  var pn = function pn(l, u, d) {
    return new Promise(function (e, t) {
      var n = function n(e) {
        l.closePopup({
          isDismissed: !0,
          dismiss: e
        });
      };

      var o, i, a;
      Gt.swalPromiseResolve.set(l, e), Gt.swalPromiseReject.set(l, t), u.confirmButton.onclick = function () {
        var e = l,
            t = b.innerParams.get(e);
        e.disableButtons(), t.input ? St(e, "confirm") : Mt(e, !0);
      }, u.denyButton.onclick = function () {
        var e = l,
            t = b.innerParams.get(e);
        e.disableButtons(), t.returnInputValueOnDeny ? St(e, "deny") : Lt(e, !1);
      }, u.cancelButton.onclick = function () {
        var e = l,
            t = n;
        e.disableButtons(), t(Ge.cancel);
      }, u.closeButton.onclick = function () {
        return n(Ge.close);
      }, e = l, t = u, a = n, b.innerParams.get(e).toast ? Dt(e, t, a) : (Ht(t), qt(t), Vt(e, t, a)), o = l, e = f, t = d, i = n, e.keydownTarget && e.keydownHandlerAdded && (e.keydownTarget.removeEventListener("keydown", e.keydownHandler, {
        capture: e.keydownListenerCapture
      }), e.keydownHandlerAdded = !1), t.toast || (e.keydownHandler = function (e) {
        return Wt(o, e, i);
      }, e.keydownTarget = t.keydownListenerCapture ? window : g(), e.keydownListenerCapture = t.keydownListenerCapture, e.keydownTarget.addEventListener("keydown", e.keydownHandler, {
        capture: e.keydownListenerCapture
      }), e.keydownHandlerAdded = !0), a = l, "select" === (t = d).input || "radio" === t.input ? Pt(a, t) : ["text", "email", "number", "tel", "textarea"].includes(t.input) && (C(t.inputValue) || A(t.inputValue)) && (At(V()), Bt(a, t));
      {
        var r = d;

        var _s3 = m(),
            _c3 = g();

        "function" == typeof r.willOpen && r.willOpen(_c3), e = window.getComputedStyle(document.body).overflowY, kt(_s3, _c3, r), setTimeout(function () {
          wt(_s3, _c3);
        }, yt), Y() && (Ct(_s3, r.scrollbarPadding, e), Qe()), Z() || f.previousActiveElement || (f.previousActiveElement = document.activeElement), "function" == typeof r.didOpen && setTimeout(function () {
          return r.didOpen(_c3);
        }), oe(_s3, p["no-transition"]);
      }
      hn(f, d, n), fn(u, d), setTimeout(function () {
        u.container.scrollTop = 0;
      });
    });
  },
      mn = function mn(e, t) {
    var n = function (e) {
      e = "string" == typeof e.template ? document.querySelector(e.template) : e.template;
      if (!e) return {};
      e = e.content, ct(e), e = Object.assign(nt(e), ot(e), it(e), at(e), rt(e), st(e, tt));
      return e;
    }(e);

    var o = Object.assign({}, r, t, n, e);
    return o.showClass = Object.assign({}, r.showClass, o.showClass), o.hideClass = Object.assign({}, r.hideClass, o.hideClass), o;
  },
      gn = function gn(e) {
    var t = {
      popup: g(),
      container: m(),
      actions: U(),
      confirmButton: V(),
      denyButton: N(),
      cancelButton: F(),
      loader: R(),
      closeButton: _(),
      validationMessage: q(),
      progressSteps: H()
    };
    return b.domCache.set(e, t), t;
  },
      hn = function hn(e, t, n) {
    var o = z();
    h(o), t.timer && (e.timeout = new pt(function () {
      n("timer"), delete e.timeout;
    }, t.timer), t.timerProgressBar && (d(o), Q(o, t, "timerProgressBar"), setTimeout(function () {
      e.timeout && e.timeout.running && J(t.timer);
    })));
  },
      fn = function fn(e, t) {
    if (!t.toast) return w(t.allowEnterKey) ? void (bn(e, t) || Rt(t, -1, 1)) : yn();
  },
      bn = function bn(e, t) {
    return t.focusDeny && ce(e.denyButton) ? (e.denyButton.focus(), !0) : t.focusCancel && ce(e.cancelButton) ? (e.cancelButton.focus(), !0) : !(!t.focusConfirm || !ce(e.confirmButton)) && (e.confirmButton.focus(), !0);
  },
      yn = function yn() {
    document.activeElement instanceof HTMLElement && "function" == typeof document.activeElement.blur && document.activeElement.blur();
  },
      vn = (Object.assign(dn.prototype, ln), Object.assign(dn, e), Object.keys(ln).forEach(function (e) {
    dn[e] = function () {
      var _un;

      if (un) return (_un = un)[e].apply(_un, arguments);
    };
  }), dn.DismissReason = Ge, dn.version = "11.4.0", dn);

  return vn["default"] = vn, vn;
}), void 0 !== this && this.Sweetalert2 && (this.swal = this.sweetAlert = this.Swal = this.SweetAlert = this.Sweetalert2);

/***/ })

}]);