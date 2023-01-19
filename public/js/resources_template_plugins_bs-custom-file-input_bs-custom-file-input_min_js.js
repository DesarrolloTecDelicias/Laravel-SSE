(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_template_plugins_bs-custom-file-input_bs-custom-file-input_min_js"],{

/***/ "./resources/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js":
/*!*************************************************************************************!*\
  !*** ./resources/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js ***!
  \*************************************************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

/*!
 * bsCustomFileInput v1.3.4 (https://github.com/Johann-S/bs-custom-file-input)
 * Copyright 2018 - 2020 Johann-S <johann.servoire@gmail.com>
 * Licensed under MIT (https://github.com/Johann-S/bs-custom-file-input/blob/master/LICENSE)
 */
!function (e, t) {
  "object" == ( false ? 0 : _typeof(exports)) && "undefined" != "object" ? module.exports = t() :  true ? !(__WEBPACK_AMD_DEFINE_FACTORY__ = (t),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
		__WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : 0;
}(this, function () {
  "use strict";

  var s = {
    CUSTOMFILE: '.custom-file input[type="file"]',
    CUSTOMFILELABEL: ".custom-file-label",
    FORM: "form",
    INPUT: "input"
  },
      l = function l(e) {
    if (0 < e.childNodes.length) for (var t = [].slice.call(e.childNodes), n = 0; n < t.length; n++) {
      var l = t[n];
      if (3 !== l.nodeType) return l;
    }
    return e;
  },
      u = function u(e) {
    var t = e.bsCustomFileInput.defaultText,
        n = e.parentNode.querySelector(s.CUSTOMFILELABEL);
    n && (l(n).textContent = t);
  },
      n = !!window.File,
      r = function r(e) {
    if (e.hasAttribute("multiple") && n) return [].slice.call(e.files).map(function (e) {
      return e.name;
    }).join(", ");
    if (-1 === e.value.indexOf("fakepath")) return e.value;
    var t = e.value.split("\\");
    return t[t.length - 1];
  };

  function d() {
    var e = this.parentNode.querySelector(s.CUSTOMFILELABEL);

    if (e) {
      var t = l(e),
          n = r(this);
      n.length ? t.textContent = n : u(this);
    }
  }

  function v() {
    for (var e = [].slice.call(this.querySelectorAll(s.INPUT)).filter(function (e) {
      return !!e.bsCustomFileInput;
    }), t = 0, n = e.length; t < n; t++) {
      u(e[t]);
    }
  }

  var p = "bsCustomFileInput",
      m = "reset",
      h = "change";
  return {
    init: function init(e, t) {
      void 0 === e && (e = s.CUSTOMFILE), void 0 === t && (t = s.FORM);

      for (var n, l, r = [].slice.call(document.querySelectorAll(e)), i = [].slice.call(document.querySelectorAll(t)), o = 0, u = r.length; o < u; o++) {
        var c = r[o];
        Object.defineProperty(c, p, {
          value: {
            defaultText: (n = void 0, n = "", (l = c.parentNode.querySelector(s.CUSTOMFILELABEL)) && (n = l.textContent), n)
          },
          writable: !0
        }), d.call(c), c.addEventListener(h, d);
      }

      for (var f = 0, a = i.length; f < a; f++) {
        i[f].addEventListener(m, v), Object.defineProperty(i[f], p, {
          value: !0,
          writable: !0
        });
      }
    },
    destroy: function destroy() {
      for (var e = [].slice.call(document.querySelectorAll(s.FORM)).filter(function (e) {
        return !!e.bsCustomFileInput;
      }), t = [].slice.call(document.querySelectorAll(s.INPUT)).filter(function (e) {
        return !!e.bsCustomFileInput;
      }), n = 0, l = t.length; n < l; n++) {
        var r = t[n];
        u(r), r[p] = void 0, r.removeEventListener(h, d);
      }

      for (var i = 0, o = e.length; i < o; i++) {
        e[i].removeEventListener(m, v), e[i][p] = void 0;
      }
    }
  };
});

/***/ })

}]);