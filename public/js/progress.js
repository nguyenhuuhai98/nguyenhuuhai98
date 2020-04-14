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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/progress.js":
/*!**********************************!*\
  !*** ./resources/js/progress.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var array = [];
var value = $("#progress").data('value');
$('.0').change(function () {
  var id = $(this).data('id');

  if (jQuery.inArray(id, array) == -1) {
    array.push(id);
    $(".progress-bar").removeClass("s" + (array.length - 1));
    $(".progress-bar").addClass("s" + array.length);
    value = value + 1;
    var text = value * 20;
    $("#progress").text(text);
    ;
  }
});
$('.1').change(function () {
  var id = $(this).data('id');

  if (jQuery.inArray(id, array) == -1) {
    array.push(id);
    $(".progress-bar").removeClass("s" + (array.length - 1));
    $(".progress-bar").addClass("s" + array.length);
    value = value + 1;
    var text = value * 20;
    $("#progress").text(text);
  }
});
$('.2').change(function () {
  var id = $(this).data('id');

  if (jQuery.inArray(id, array) == -1) {
    array.push(id);
    $(".progress-bar").removeClass("s" + (array.length - 1));
    $(".progress-bar").addClass("s" + array.length);
    value = value + 1;
    var text = value * 20;
    $("#progress").text(text);
  }
});
$('.3').change(function () {
  var id = $(this).data('id');

  if (jQuery.inArray(id, array) == -1) {
    array.push(id);
    $(".progress-bar").removeClass("s" + (array.length - 1));
    $(".progress-bar").addClass("s" + array.length);
    value = value + 1;
    var text = value * 20;
    $("#progress").text(text);
  }
});
$('.4').change(function () {
  var id = $(this).data('id');

  if (jQuery.inArray(id, array) == -1) {
    array.push(id);
    $(".progress-bar").removeClass("s" + (array.length - 1));
    $(".progress-bar").addClass("s" + array.length);
    value = value + 1;
    var text = value * 20;
    $("#progress").text(text);
  }
});
$(document).on("click", ".memorised", function () {
  console.log(123);
  var target = $(this);
  var bookmark = target.children();
  var token = '{{ csrf_field() }}';
  var data = parseInt($(this).data('id'));
  var typeMethod = parseInt($(this).data('type'));
  var url = "/memorised/" + data;
  var method = "post";
  $.ajax({
    url: url,
    method: method,
    data: {
      "_token": "{{ csrf_token() }}",
      "id": data,
      "type": typeMethod
    },
    success: function success(data) {
      if (data.memory) {
        bookmark.removeClass('far');
        bookmark.addClass('fas');
        target.data('type', 1);
      } else if (data.unmemory) {
        bookmark.removeClass('fas');
        bookmark.addClass('far');
        target.data('type', 0);
      }

      console.log(data.memory);
    }
  });
});

/***/ }),

/***/ 3:
/*!****************************************!*\
  !*** multi ./resources/js/progress.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/huu_hai/project1/resources/js/progress.js */"./resources/js/progress.js");


/***/ })

/******/ });