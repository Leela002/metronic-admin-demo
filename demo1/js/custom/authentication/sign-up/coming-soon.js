/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/core/js/custom/authentication/sign-up/coming-soon.js":
/*!*******************************************************************************!*\
  !*** ./resources/assets/core/js/custom/authentication/sign-up/coming-soon.js ***!
  \*******************************************************************************/
/***/ (() => {

eval("\n\n// Class Definition\nvar KTSignupComingSoon = function () {\n  // Elements\n  var form;\n  var submitButton;\n  var validator;\n  var counterDays;\n  var counterHours;\n  var counterMinutes;\n  var counterSeconds;\n  var handleForm = function handleForm(e) {\n    var validation;\n    if (!form) {\n      return;\n    }\n\n    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/\n    validator = FormValidation.formValidation(form, {\n      fields: {\n        'email': {\n          validators: {\n            regexp: {\n              regexp: /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$/,\n              message: 'The value is not a valid email address'\n            },\n            notEmpty: {\n              message: 'Email address is required'\n            }\n          }\n        }\n      },\n      plugins: {\n        trigger: new FormValidation.plugins.Trigger(),\n        bootstrap: new FormValidation.plugins.Bootstrap5({\n          rowSelector: '.fv-row',\n          eleInvalidClass: '',\n          eleValidClass: ''\n        })\n      }\n    });\n    submitButton.addEventListener('click', function (e) {\n      e.preventDefault();\n\n      // Validate form\n      validator.validate().then(function (status) {\n        if (status == 'Valid') {\n          // Show loading indication\n          submitButton.setAttribute('data-kt-indicator', 'on');\n\n          // Disable button to avoid multiple click \n          submitButton.disabled = true;\n\n          // Simulate ajax request\n          setTimeout(function () {\n            // Hide loading indication\n            submitButton.removeAttribute('data-kt-indicator');\n\n            // Enable button\n            submitButton.disabled = false;\n\n            // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/\n            Swal.fire({\n              text: \"We have received your request. You will be notified once we go live.\",\n              icon: \"success\",\n              buttonsStyling: false,\n              confirmButtonText: \"Ok, got it!\",\n              customClass: {\n                confirmButton: \"btn btn-primary\"\n              }\n            }).then(function (result) {\n              if (result.isConfirmed) {\n                form.querySelector('[name=\"email\"]').value = \"\";\n                //form.submit();\n\n                //form.submit(); // submit form\n                var redirectUrl = form.getAttribute('data-kt-redirect-url');\n                if (redirectUrl) {\n                  location.href = redirectUrl;\n                }\n              }\n            });\n          }, 2000);\n        } else {\n          // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/\n          Swal.fire({\n            text: \"Sorry, looks like there are some errors detected, please try again.\",\n            icon: \"error\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn btn-primary\"\n            }\n          });\n        }\n      });\n    });\n  };\n  var initCounter = function initCounter() {\n    // Set the date we're counting down to\n    var currentTime = new Date();\n    var countDownDate = new Date(currentTime.getTime() + 1000 * 60 * 60 * 24 * 15 + 1000 * 60 * 60 * 10 + 1000 * 60 * 15).getTime();\n    var count = function count() {\n      // Get todays date and time\n      var now = new Date().getTime();\n\n      // Find the distance between now an the count down date\n      var distance = countDownDate - now;\n\n      // Time calculations for days, hours, minutes and seconds\n      var days = Math.floor(distance / (1000 * 60 * 60 * 24));\n      var hours = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));\n      var minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));\n      var seconds = Math.floor(distance % (1000 * 60) / 1000);\n\n      // Display the result\n      if (counterDays) counterDays.innerHTML = days;\n      if (counterHours) counterHours.innerHTML = hours;\n      if (counterMinutes) counterMinutes.innerHTML = minutes;\n      if (counterSeconds) counterSeconds.innerHTML = seconds;\n    };\n\n    // Update the count down every 1 second\n    var x = setInterval(count, 1000);\n\n    // Initial count\n    count();\n  };\n\n  // Public Functions\n  return {\n    // public functions\n    init: function init() {\n      form = document.querySelector('#kt_coming_soon_form');\n      submitButton = document.querySelector('#kt_coming_soon_submit');\n      handleForm();\n      counterDays = document.querySelector('#kt_coming_soon_counter_days');\n      if (counterDays) {\n        counterHours = document.querySelector('#kt_coming_soon_counter_hours');\n        counterMinutes = document.querySelector('#kt_coming_soon_counter_minutes');\n        counterSeconds = document.querySelector('#kt_coming_soon_counter_seconds');\n        initCounter();\n      }\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTSignupComingSoon.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2F1dGhlbnRpY2F0aW9uL3NpZ24tdXAvY29taW5nLXNvb24uanMuanMiLCJtYXBwaW5ncyI6IkFBQWE7O0FBRWI7QUFDQSxJQUFJQSxrQkFBa0IsR0FBRyxZQUFXO0VBQ2hDO0VBQ0EsSUFBSUMsSUFBSTtFQUNSLElBQUlDLFlBQVk7RUFDbkIsSUFBSUMsU0FBUztFQUVWLElBQUlDLFdBQVc7RUFDZixJQUFJQyxZQUFZO0VBQ2hCLElBQUlDLGNBQWM7RUFDbEIsSUFBSUMsY0FBYztFQUVsQixJQUFJQyxVQUFVLEdBQUcsU0FBYkEsVUFBVSxDQUFZQyxDQUFDLEVBQUU7SUFDekIsSUFBSUMsVUFBVTtJQUVkLElBQUksQ0FBQ1QsSUFBSSxFQUFHO01BQ1I7SUFDSjs7SUFFQTtJQUNBRSxTQUFTLEdBQUdRLGNBQWMsQ0FBQ0MsY0FBYyxDQUM5Q1gsSUFBSSxFQUNKO01BQ0NZLE1BQU0sRUFBRTtRQUNQLE9BQU8sRUFBRTtVQUNVQyxVQUFVLEVBQUU7WUFDUkMsTUFBTSxFQUFFO2NBQ0pBLE1BQU0sRUFBRSw0QkFBNEI7Y0FDcENDLE9BQU8sRUFBRTtZQUNiLENBQUM7WUFDdEJDLFFBQVEsRUFBRTtjQUNURCxPQUFPLEVBQUU7WUFDVjtVQUNEO1FBQ0Q7TUFDRCxDQUFDO01BQ0RFLE9BQU8sRUFBRTtRQUNSQyxPQUFPLEVBQUUsSUFBSVIsY0FBYyxDQUFDTyxPQUFPLENBQUNFLE9BQU8sRUFBRTtRQUM3Q0MsU0FBUyxFQUFFLElBQUlWLGNBQWMsQ0FBQ08sT0FBTyxDQUFDSSxVQUFVLENBQUM7VUFDOUJDLFdBQVcsRUFBRSxTQUFTO1VBQ3RCQyxlQUFlLEVBQUUsRUFBRTtVQUNuQkMsYUFBYSxFQUFFO1FBQ25CLENBQUM7TUFDakI7SUFDRCxDQUFDLENBQ0Q7SUFFS3ZCLFlBQVksQ0FBQ3dCLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxVQUFVakIsQ0FBQyxFQUFFO01BQ2hEQSxDQUFDLENBQUNrQixjQUFjLEVB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TSxDQUFDQyxrQkFBa0IsQ0FBQyxZQUFXO0VBQ2pDdkUsa0JBQWtCLENBQUNvRSxJQUFJLEVBQUU7QUFDN0IsQ0FBQyxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9jb3JlL2pzL2N1c3RvbS9hdXRoZW50aWNhdGlvbi9zaWduLXVwL2NvbWluZy1zb29uLmpzPzdiY2YiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4vLyBDbGFzcyBEZWZpbml0aW9uXHJcbnZhciBLVFNpZ251cENvbWluZ1Nvb24gPSBmdW5jdGlvbigpIHtcclxuICAgIC8vIEVsZW1lbnRzXHJcbiAgICB2YXIgZm9ybTtcclxuICAgIHZhciBzdWJtaXRCdXR0b247XHJcblx0dmFyIHZhbGlkYXRvcjsgXHJcblxyXG4gICAgdmFyIGNvdW50ZXJEYXlzO1xyXG4gICAgdmFyIGNvdW50ZXJIb3VycztcclxuICAgIHZhciBjb3VudGVyTWludXRlcztcclxuICAgIHZhciBjb3VudGVyU2Vjb25kcztcclxuXHJcbiAgICB2YXIgaGFuZGxlRm9ybSA9IGZ1bmN0aW9uKGUpIHtcclxuICAgICAgICB2YXIgdmFsaWRhdGlvbjtcdFx0IFxyXG5cclxuICAgICAgICBpZiggIWZvcm0gKSB7XHJcbiAgICAgICAgICAgIHJldHVybjtcclxuICAgICAgICB9ICAgICAgICBcclxuXHJcbiAgICAgICAgLy8gSW5pdCBmb3JtIHZhbGlkYXRpb24gcnVsZXMuIEZvciBtb3JlIGluZm8gY2hlY2sgdGhlIEZvcm1WYWxpZGF0aW9uIHBsdWdpbidzIG9mZmljaWFsIGRvY3VtZW50YXRpb246aHR0cHM6Ly9mb3JtdmFsaWRhdGlvbi5pby9cclxuICAgICAgICB2YWxpZGF0b3IgPSBGb3JtVmFsaWRhdGlvbi5mb3JtVmFsaWRhdGlvbihcclxuXHRcdFx0Zm9ybSxcclxuXHRcdFx0e1xyXG5cdFx0XHRcdGZpZWxkczoge1x0XHRcdFx0XHRcclxuXHRcdFx0XHRcdCdlbWFpbCc6IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsaWRhdG9yczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcmVnZXhwOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgcmVnZXhwOiAvXlteXFxzQF0rQFteXFxzQF0rXFwuW15cXHNAXSskLyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBtZXNzYWdlOiAnVGhlIHZhbHVlIGlzIG5vdCBhIHZhbGlkIGVtYWlsIGFkZHJlc3MnLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSxcclxuXHRcdFx0XHRcdFx0XHRub3RFbXB0eToge1xyXG5cdFx0XHRcdFx0XHRcdFx0bWVzc2FnZTogJ0VtYWlsIGFkZHJlc3MgaXMgcmVxdWlyZWQnXHJcblx0XHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0XHR9XHJcblx0XHRcdFx0XHR9IFxyXG5cdFx0XHRcdH0sXHJcblx0XHRcdFx0cGx1Z2luczoge1xyXG5cdFx0XHRcdFx0dHJpZ2dlcjogbmV3IEZvcm1WYWxpZGF0aW9uLnBsdWdpbnMuVHJpZ2dlcigpLFxyXG5cdFx0XHRcdFx0Ym9vdHN0cmFwOiBuZXcgRm9ybVZhbGlkYXRpb24ucGx1Z2lucy5Cb290c3RyYXA1KHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgcm93U2VsZWN0b3I6ICcuZnYtcm93JyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgZWxlSW52YWxpZENsYXNzOiAnJyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgZWxlVmFsaWRDbGFzczogJydcclxuICAgICAgICAgICAgICAgICAgICB9KVxyXG5cdFx0XHRcdH1cclxuXHRcdFx0fVxyXG5cdFx0KTtcdFx0XHJcblxyXG4gICAgICAgIHN1Ym1pdEJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuXHJcbiAgICAgICAgICAgIC8vIFZhbGlkYXRlIGZvcm1cclxuICAgICAgICAgICAgdmFsaWRhdG9yLnZhbGlkYXRlKCkudGhlbihmdW5jdGlvbiAoc3RhdHVzKSB7XHJcbiAgICAgICAgICAgICAgICBpZiAoc3RhdHVzID09ICdWYWxpZCcpIHtcclxuICAgICAgICAgICAgICAgICAgICAvLyBTaG93IGxvYWRpbmcgaW5kaWNhdGlvblxyXG4gICAgICAgICAgICAgICAgICAgIHN1Ym1pdEJ1dHRvbi5zZXRBdHRyaWJ1dGUoJ2RhdGEta3QtaW5kaWNhdG9yJywgJ29uJyk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIC8vIERpc2FibGUgYnV0dG9uIHRvIGF2b2lkIG11bHRpcGxlIGNsaWNrIFxyXG4gICAgICAgICAgICAgICAgICAgIHN1Ym1pdEJ1dHRvbi5kaXNhYmxlZCA9IHRydWU7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIC8vIFNpbXVsYXRlIGFqYXggcmVxdWVzdFxyXG4gICAgICAgICAgICAgICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8vIEhpZGUgbG9hZGluZyBpbmRpY2F0aW9uXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHN1Ym1pdEJ1dHRvbi5yZW1vdmVBdHRyaWJ1dGUoJ2RhdGEta3QtaW5kaWNhdG9yJyk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAvLyBFbmFibGUgYnV0dG9uXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHN1Ym1pdEJ1dHRvbi5kaXNhYmxlZCA9IGZhbHNlO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgLy8gU2hvdyBtZXNzYWdlIHBvcHVwLiBGb3IgbW9yZSBpbmZvIGNoZWNrIHRoZSBwbHVnaW4ncyBvZmZpY2lhbCBkb2N1bWVudGF0aW9uOiBodHRwczovL3N3ZWV0YWxlcnQyLmdpdGh1Yi5pby9cclxuICAgICAgICAgICAgICAgICAgICAgICAgU3dhbC5maXJlKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRleHQ6IFwiV2UgaGF2ZSByZWNlaXZlZCB5b3VyIHJlcXVlc3QuIFlvdSB3aWxsIGJlIG5vdGlmaWVkIG9uY2Ugd2UgZ28gbGl2ZS5cIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGljb246IFwic3VjY2Vzc1wiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IFwiT2ssIGdvdCBpdCFcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9KS50aGVuKGZ1bmN0aW9uIChyZXN1bHQpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmIChyZXN1bHQuaXNDb25maXJtZWQpIHsgXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgZm9ybS5xdWVyeVNlbGVjdG9yKCdbbmFtZT1cImVtYWlsXCJdJykudmFsdWU9IFwiXCI7ICAgICAgICAgICAgICAgICAgICAgICAgICAgIFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vZm9ybS5zdWJtaXQoKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgLy9mb3JtLnN1Ym1pdCgpOyAvLyBzdWJtaXQgZm9ybVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHZhciByZWRpcmVjdFVybCA9IGZvcm0uZ2V0QXR0cmlidXRlKCdkYXRhLWt0LXJlZGlyZWN0LXVybCcpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmIChyZWRpcmVjdFVybCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBsb2NhdGlvbi5ocmVmID0gcmVkaXJlY3RVcmw7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICB9LCAyMDAwKTsgICBcdFx0XHRcdFx0XHRcclxuICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgLy8gU2hvdyBlcnJvciBwb3B1cC4gRm9yIG1vcmUgaW5mbyBjaGVjayB0aGUgcGx1Z2luJ3Mgb2ZmaWNpYWwgZG9jdW1lbnRhdGlvbjogaHR0cHM6Ly9zd2VldGFsZXJ0Mi5naXRodWIuaW8vXHJcbiAgICAgICAgICAgICAgICAgICAgU3dhbC5maXJlKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGV4dDogXCJTb3JyeSwgbG9va3MgbGlrZSB0aGVyZSBhcmUgc29tZSBlcnJvcnMgZGV0ZWN0ZWQsIHBsZWFzZSB0cnkgYWdhaW4uXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGljb246IFwiZXJyb3JcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogXCJPaywgZ290IGl0IVwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjdXN0b21DbGFzczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIlxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0pO1xyXG5cdFx0fSk7XHJcbiAgICB9XHJcblxyXG4gICAgdmFyIGluaXRDb3VudGVyID0gZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgLy8gU2V0IHRoZSBkYXRlIHdlJ3JlIGNvdW50aW5nIGRvd24gdG9cclxuICAgICAgICB2YXIgY3VycmVudFRpbWUgPSBuZXcgRGF0ZSgpOyBcclxuICAgICAgICB2YXIgY291bnREb3duRGF0ZSA9IG5ldyBEYXRlKGN1cnJlbnRUaW1lLmdldFRpbWUoKSArIDEwMDAgKiA2MCAqIDYwICogMjQgKiAxNSArIDEwMDAgKiA2MCAqIDYwICogMTAgKyAxMDAwICogNjAgKiAxNSkuZ2V0VGltZSgpO1xyXG5cclxuICAgICAgICB2YXIgY291bnQgPSBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgLy8gR2V0IHRvZGF5cyBkYXRlIGFuZCB0aW1lXHJcbiAgICAgICAgICAgIHZhciBub3cgPSBuZXcgRGF0ZSgpLmdldFRpbWUoKTtcclxuXHJcbiAgICAgICAgICAgIC8vIEZpbmQgdGhlIGRpc3RhbmNlIGJldHdlZW4gbm93IGFuIHRoZSBjb3VudCBkb3duIGRhdGVcclxuICAgICAgICAgICAgdmFyIGRpc3RhbmNlID0gY291bnREb3duRGF0ZSAtIG5vdztcclxuXHJcbiAgICAgICAgICAgIC8vIFRpbWUgY2FsY3VsYXRpb25zIGZvciBkYXlzLCBob3VycywgbWludXRlcyBhbmQgc2Vjb25kc1xyXG4gICAgICAgICAgICB2YXIgZGF5cyA9IE1hdGguZmxvb3IoZGlzdGFuY2UgLyAoMTAwMCAqIDYwICogNjAgKiAyNCkpO1xyXG4gICAgICAgICAgICB2YXIgaG91cnMgPSBNYXRoLmZsb29yKChkaXN0YW5jZSAlICgxMDAwICogNjAgKiA2MCAqIDI0KSkgLyAoMTAwMCAqIDYwICogNjApKTtcclxuICAgICAgICAgICAgdmFyIG1pbnV0ZXMgPSBNYXRoLmZsb29yKChkaXN0YW5jZSAlICgxMDAwICogNjAgKiA2MCkpIC8gKDEwMDAgKiA2MCkpO1xyXG4gICAgICAgICAgICB2YXIgc2Vjb25kcyA9IE1hdGguZmxvb3IoKGRpc3RhbmNlICUgKDEwMDAgKiA2MCkpIC8gMTAwMCk7XHJcblxyXG4gICAgICAgICAgICAvLyBEaXNwbGF5IHRoZSByZXN1bHRcclxuICAgICAgICAgICAgaWYoY291bnRlckRheXMpIGNvdW50ZXJEYXlzLmlubmVySFRNTCA9IGRheXM7IFxyXG4gICAgICAgICAgICBpZihjb3VudGVySG91cnMpIGNvdW50ZXJIb3Vycy5pbm5lckhUTUwgPSBob3VycztcclxuICAgICAgICAgICAgaWYoY291bnRlck1pbnV0ZXMpIGNvdW50ZXJNaW51dGVzLmlubmVySFRNTCA9IG1pbnV0ZXM7XHJcbiAgICAgICAgICAgIGlmKGNvdW50ZXJTZWNvbmRzKSBjb3VudGVyU2Vjb25kcy5pbm5lckhUTUwgPSBzZWNvbmRzO1xyXG4gICAgICAgIH07XHJcblxyXG4gICAgICAgIC8vIFVwZGF0ZSB0aGUgY291bnQgZG93biBldmVyeSAxIHNlY29uZFxyXG4gICAgICAgIHZhciB4ID0gc2V0SW50ZXJ2YWwoY291bnQsIDEwMDApO1xyXG5cclxuICAgICAgICAvLyBJbml0aWFsIGNvdW50XHJcbiAgICAgICAgY291bnQoKTtcclxuICAgIH1cclxuXHJcbiAgICAvLyBQdWJsaWMgRnVuY3Rpb25zXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIC8vIHB1YmxpYyBmdW5jdGlvbnNcclxuICAgICAgICBpbml0OiBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgZm9ybSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNrdF9jb21pbmdfc29vbl9mb3JtJyk7XHJcbiAgICAgICAgICAgIHN1Ym1pdEJ1dHRvbiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNrdF9jb21pbmdfc29vbl9zdWJtaXQnKTtcclxuICAgICAgICAgICBcclxuICAgICAgICAgICAgaGFuZGxlRm9ybSgpO1xyXG5cclxuICAgICAgICAgICAgY291bnRlckRheXMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcja3RfY29taW5nX3Nvb25fY291bnRlcl9kYXlzJyk7XHJcbiAgICAgICAgICAgIGlmIChjb3VudGVyRGF5cykgeyAgICAgICAgICAgICAgICBcclxuICAgICAgICAgICAgICAgIGNvdW50ZXJIb3VycyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNrdF9jb21pbmdfc29vbl9jb3VudGVyX2hvdXJzJyk7XHJcbiAgICAgICAgICAgICAgICBjb3VudGVyTWludXRlcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNrdF9jb21pbmdfc29vbl9jb3VudGVyX21pbnV0ZXMnKTtcclxuICAgICAgICAgICAgICAgIGNvdW50ZXJTZWNvbmRzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2t0X2NvbWluZ19zb29uX2NvdW50ZXJfc2Vjb25kcycpO1xyXG4gICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgICAgICBpbml0Q291bnRlcigpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgfTtcclxufSgpO1xyXG5cclxuLy8gT24gZG9jdW1lbnQgcmVhZHlcclxuS1RVdGlsLm9uRE9NQ29udGVudExvYWRlZChmdW5jdGlvbigpIHtcclxuICAgIEtUU2lnbnVwQ29taW5nU29vbi5pbml0KCk7XHJcbn0pO1xyXG4iXSwibmFtZXMiOlsiS1RTaWdudXBDb21pbmdTb29uIiwiZm9ybSIsInN1Ym1pdEJ1dHRvbiIsInZhbGlkYXRvciIsImNvdW50ZXJEYXlzIiwiY291bnRlckhvdXJzIiwiY291bnRlck1pbnV0ZXMiLCJjb3VudGVyU2Vjb25kcyIsImhhbmRsZUZvcm0iLCJlIiwidmFsaWRhdGlvbiIsIkZvcm1WYWxpZGF0aW9uIiwiZm9ybVZhbGlkYXRpb24iLCJmaWVsZHMiLCJ2YWxpZGF0b3JzIiwicmVnZXhwIiwibWVzc2FnZSIsIm5vdEVtcHR5IiwicGx1Z2lucyIsInRyaWdnZXIiLCJUcmlnZ2VyIiwiYm9vdHN0cmFwIiwiQm9vdHN0cmFwNSIsInJvd1NlbGVjdG9yIiwiZWxlSW52YWxpZENsYXNzIiwiZWxlVmFsaWRDbGFzcyIsImFkZEV2ZW50TGlzdGVuZXIiLCJwcmV2ZW50RGVmYXVsdCIsInZhbGlkYXRlIiwidGhlbiIsInN0YXR1cyIsInNldEF0dHJpYnV0ZSIsImRpc2FibGVkIiwic2V0VGltZW91dCIsInJlbW92ZUF0dHJpYnV0ZSIsIlN3YWwiLCJmaXJlIiwidGV4dCIsImljb24iLCJidXR0b25zU3R5bGluZyIsImNvbmZpcm1CdXR0b25UZXh0IiwiY3VzdG9tQ2xhc3MiLCJjb25maXJtQnV0dG9uIiwicmVzdWx0IiwiaXNDb25maXJtZWQiLCJxdWVyeVNlbGVjdG9yIiwidmFsdWUiLCJyZWRpcmVjdFVybCIsImdldEF0dHJpYnV0ZSIsImxvY2F0aW9uIiwiaHJlZiIsImluaXRDb3VudGVyIiwiY3VycmVudFRpbWUiLCJEYXRlIiwiY291bnREb3duRGF0ZSIsImdldFRpbWUiLCJjb3VudCIsIm5vdyIsImRpc3RhbmNlIiwiZGF5cyIsIk1hdGgiLCJmbG9vciIsImhvdXJzIiwibWludXRlcyIsInNlY29uZHMiLCJpbm5lckhUTUwiLCJ4Iiwic2V0SW50ZXJ2YWwiLCJpbml0IiwiZG9jdW1lbnQiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/authentication/sign-up/coming-soon.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/authentication/sign-up/coming-soon.js"]();
/******/ 	
/******/ })()
;