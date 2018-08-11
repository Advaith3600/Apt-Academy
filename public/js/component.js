/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 51);
/******/ })
/************************************************************************/
/******/ ({

/***/ 1:
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ 51:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(52);


/***/ }),

/***/ 52:
/***/ (function(module, exports, __webpack_require__) {

Vue.component('profile-picture', __webpack_require__(53));
Vue.component('admin-profile-picture', __webpack_require__(56));
Vue.component('subject-selection', __webpack_require__(59));
Vue.component('attendance', __webpack_require__(62));

/***/ }),

/***/ 53:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(54)
/* template */
var __vue_template__ = __webpack_require__(55)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/ProfilePicture.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-7d9e1e8c", Component.options)
  } else {
    hotAPI.reload("data-v-7d9e1e8c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 54:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    methods: {
        handleFileUpload: function handleFileUpload(event) {
            var _this = this;

            this.$emit('uploading', true);
            document.querySelector('img.shadow-sm').classList.remove('border');
            document.querySelector('img.shadow-sm').classList.remove('border-danger');

            var data = new FormData();
            data.append('picture', this.$refs.file.files[0]);

            axios.post('/profile/password/update/picture', data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
                onUploadProgress: function onUploadProgress(progressEvent) {
                    _this.$emit('progress', [progressEvent.loaded, progressEvent.total]);
                }
            }).then(function (response) {
                _this.$emit('uploaded', response.data);
                _this.$emit('uploading', false);
            }).catch(function (error) {
                document.querySelector('img.shadow-sm').classList.add('border');
                document.querySelector('img.shadow-sm').classList.add('border-danger');
                _this.$emit('uploading', false);
            });
        }
    }
});

/***/ }),

/***/ 55:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("input", {
      ref: "file",
      staticClass: "d-none",
      attrs: { type: "file", id: "profile_picture", accept: "image/*" },
      on: { change: _vm.handleFileUpload }
    })
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-7d9e1e8c", module.exports)
  }
}

/***/ }),

/***/ 56:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(57)
/* template */
var __vue_template__ = __webpack_require__(58)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/adminProfilePicture.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-2b96e606", Component.options)
  } else {
    hotAPI.reload("data-v-2b96e606", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 57:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    props: ['model', 'id'],
    methods: {
        handleFileUpload: function handleFileUpload(event) {
            var _this = this;

            this.$emit('uploading', true);
            document.querySelector('img.shadow-sm').classList.remove('border');
            document.querySelector('img.shadow-sm').classList.remove('border-danger');

            var data = new FormData();
            data.append('picture', this.$refs.file.files[0]);
            data.append('model', '\\App\\' + this.model);
            data.append('id', this.id);

            axios.post('/admin/update/profile_picture', data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
                onUploadProgress: function onUploadProgress(progressEvent) {
                    _this.$emit('progress', [progressEvent.loaded, progressEvent.total]);
                }
            }).then(function (response) {
                _this.$emit('uploaded', response.data);
                _this.$emit('uploading', false);
            }).catch(function (error) {
                document.querySelector('img.shadow-sm').classList.add('border');
                document.querySelector('img.shadow-sm').classList.add('border-danger');
                _this.$emit('uploading', false);
            });
        }
    }
});

/***/ }),

/***/ 58:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("input", {
      ref: "file",
      staticClass: "d-none",
      attrs: { type: "file", id: "profile_picture", accept: "image/*" },
      on: { change: _vm.handleFileUpload }
    })
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-2b96e606", module.exports)
  }
}

/***/ }),

/***/ 59:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(60)
/* template */
var __vue_template__ = __webpack_require__(61)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/SubjectSelection.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-7fcc5012", Component.options)
  } else {
    hotAPI.reload("data-v-7fcc5012", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 60:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
	props: ['standard', 'select'],
	data: function data() {
		return {
			allSubjects: [],
			subject: []
		};
	},

	computed: {
		currentStandard: function currentStandard() {
			var _this = this;

			return this.allSubjects.filter(function (u) {
				return u.id == _this.standard;
			})[0];
		},
		inputValue: function inputValue() {
			if (this.currentStandard != undefined && this.currentStandard.subjects[0][2] == true) {
				return JSON.stringify(this.currentStandard);
			}

			return JSON.stringify(this.subject);
		}
	},
	watch: {
		standard: function standard() {
			this.subject = [];
		},
		subject: function subject() {
			this.$emit('subjectchanged', this.subject);
		}
	},
	mounted: function mounted() {
		var _this2 = this;

		axios.post('/get/standards').then(function (_ref) {
			var data = _ref.data;

			_this2.allSubjects = data;
		});

		try {
			if (JSON.parse(this.select) instanceof Array) {
				this.subject = JSON.parse(this.select);
			}
		} catch (e) {}
	}
});

/***/ }),

/***/ 61:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.allSubjects.length > 0
    ? _c("div", [
        _vm.standard != 0 &&
        _vm.currentStandard != undefined &&
        _vm.currentStandard.subjects[0][2] != true
          ? _c("div", { staticClass: "form-group" }, [
              _c(
                "label",
                { staticClass: "col-form-label", attrs: { for: "standard" } },
                [_vm._v("Select subject")]
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "d-flex align-items-center flex-wrap" },
                [
                  _vm._l(_vm.currentStandard.subjects, function(subjects) {
                    return [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.subject,
                            expression: "subject"
                          }
                        ],
                        staticClass: "mr-1",
                        attrs: {
                          id: subjects[0],
                          type: "checkbox",
                          name: "subject-select"
                        },
                        domProps: {
                          value: subjects,
                          checked: Array.isArray(_vm.subject)
                            ? _vm._i(_vm.subject, subjects) > -1
                            : _vm.subject
                        },
                        on: {
                          change: function($event) {
                            var $$a = _vm.subject,
                              $$el = $event.target,
                              $$c = $$el.checked ? true : false
                            if (Array.isArray($$a)) {
                              var $$v = subjects,
                                $$i = _vm._i($$a, $$v)
                              if ($$el.checked) {
                                $$i < 0 && (_vm.subject = $$a.concat([$$v]))
                              } else {
                                $$i > -1 &&
                                  (_vm.subject = $$a
                                    .slice(0, $$i)
                                    .concat($$a.slice($$i + 1)))
                              }
                            } else {
                              _vm.subject = $$c
                            }
                          }
                        }
                      }),
                      _vm._v(" "),
                      _c("label", {
                        staticClass: "mr-2 mb-0",
                        attrs: { for: subjects[0] },
                        domProps: { textContent: _vm._s(subjects[0]) }
                      })
                    ]
                  })
                ],
                2
              )
            ])
          : _vm._e(),
        _vm._v(" "),
        _c("input", {
          attrs: { type: "hidden", name: "subject" },
          domProps: { value: _vm.inputValue }
        })
      ])
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-7fcc5012", module.exports)
  }
}

/***/ }),

/***/ 62:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(63)
/* template */
var __vue_template__ = __webpack_require__(64)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/Attendance.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-667f93e0", Component.options)
  } else {
    hotAPI.reload("data-v-667f93e0", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 63:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
	props: ['id', 'selected', 'date'],
	data: function data() {
		return {
			attendance: '',
			getId: {
				present: '',
				absent: ''
			}
		};
	},

	watch: {
		attendance: function attendance(event) {
			axios.post('/admin/attendance/update/' + this.id, {
				attendance: this.attendance,
				date: this.date
			});
		}
	},
	mounted: function mounted() {
		if (this.selected != '') {
			this.attendance = Boolean(Number(this.selected));
		}

		this.getId.present = 'present' + this.id + Math.random().toString(36).substr(2, 9);
		this.getId.absent = 'absent' + this.id + Math.random().toString(36).substr(2, 9);
	}
});

/***/ }),

/***/ 64:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "d-flex align-items-center" }, [
    _c(
      "label",
      { staticClass: "mb-0 mr-1", attrs: { for: _vm.getId.present } },
      [_vm._v("Present")]
    ),
    _vm._v(" "),
    _c("input", {
      directives: [
        {
          name: "model",
          rawName: "v-model",
          value: _vm.attendance,
          expression: "attendance"
        }
      ],
      staticClass: "mr-2",
      attrs: { type: "radio", id: _vm.getId.present },
      domProps: { value: true, checked: _vm._q(_vm.attendance, true) },
      on: {
        change: function($event) {
          _vm.attendance = true
        }
      }
    }),
    _vm._v(" "),
    _c(
      "label",
      { staticClass: "mb-0 mr-1", attrs: { for: _vm.getId.absent } },
      [_vm._v("Absent")]
    ),
    _vm._v(" "),
    _c("input", {
      directives: [
        {
          name: "model",
          rawName: "v-model",
          value: _vm.attendance,
          expression: "attendance"
        }
      ],
      attrs: { type: "radio", id: _vm.getId.absent },
      domProps: { value: false, checked: _vm._q(_vm.attendance, false) },
      on: {
        change: function($event) {
          _vm.attendance = false
        }
      }
    })
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-667f93e0", module.exports)
  }
}

/***/ })

/******/ });