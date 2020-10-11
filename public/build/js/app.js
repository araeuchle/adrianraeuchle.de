(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["js/app"],{

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var cookie_notice_dist_cookie_notice_min_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! cookie-notice/dist/cookie.notice.min.js */ "./node_modules/cookie-notice/dist/cookie.notice.min.js");
/* harmony import */ var cookie_notice_dist_cookie_notice_min_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(cookie_notice_dist_cookie_notice_min_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _functions__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./functions */ "./assets/js/functions.js");
/* harmony import */ var _functions__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_functions__WEBPACK_IMPORTED_MODULE_1__);
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)
// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';



/***/ }),

/***/ "./assets/js/functions.js":
/*!********************************!*\
  !*** ./assets/js/functions.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var element = document.getElementById('mobileToggler');

if (element !== null) {
  element.addEventListener('click', toggleMenu);
}

function toggleMenu() {
  var nav = document.getElementById('navbar-menu-container');

  if (nav.classList.contains('hidden')) {
    nav.classList.remove('hidden');
  } else {
    nav.classList.add('hidden');
  }
}

/***/ }),

/***/ "./node_modules/cookie-notice/dist/cookie.notice.min.js":
/*!**************************************************************!*\
  !*** ./node_modules/cookie-notice/dist/cookie.notice.min.js ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*! cookie-notice v1.3.3 by Alessandro Benoit, Bernhard Behrendt 2020-09-11 */

!function(){"use strict";var f,b,k={messageLocales:{it:"Utilizziamo i cookie per essere sicuri che tu possa avere la migliore esperienza sul nostro sito. Se continui ad utilizzare questo sito assumiamo che tu ne sia felice.",en:"We use cookies to ensure that you have the best experience on our website. If you continue to use this site we assume that you accept this.",de:"Wir verwenden Cookies um sicherzustellen, dass Sie das beste Erlebnis auf unserer Website haben.",fr:"Nous utilisons des cookies afin d'être sûr que vous pouvez avoir la meilleure expérience sur notre site. Si vous continuez à utiliser ce site, nous supposons que vous acceptez.",pt:"Utilizamos cookies para garantir que você tenha a melhor experiência em nosso site. Se você continuar a usar este site, assumimos que você aceita isso."},cookieNoticePosition:"bottom",learnMoreLinkEnabled:!1,learnMoreLinkHref:"/cookie-banner-information.html",learnMoreLinkText:{it:"Saperne di più",en:"Learn more",de:"Mehr erfahren",fr:"En savoir plus",pt:"Saber mais"},buttonLocales:{en:"OK"},expiresIn:30,fontFamily:"inherit",fontSize:12,buttonBgColor:"#ca5000",buttonTextColor:"#fff",noticeBgColor:"#000",noticeTextColor:"#fff",linkColor:"#009fdd",linkBgColor:"#000",linkTarget:"_blank",debug:!1};function g(e){var t=(navigator.userLanguage||navigator.language).substr(0,2);return e[t]?e[t]:e.en}document.addEventListener("DOMContentLoaded",function(){f||new cookieNoticeJS}),window.cookieNoticeJS=function(){if(void 0===f&&(f=this,-1==document.cookie.indexOf("cookie_notice"))){var t,o=document.querySelector("script[ data-cookie-notice ]");try{t=o?JSON.parse(o.getAttribute("data-cookie-notice")):{}}catch(e){console.error("data-cookie-notice JSON error:",o,e),t={}}var r=function e(t,o){for(var i in o)o.hasOwnProperty(i)&&("object"==typeof t[i]?t[i]=e(t[i],o[i]):t[i]=o[i]);return t}(k,arguments[0]||t||{});r.debug&&console.warn("cookie-notice:",r);var e,i,n,a,s,c,l,u,d=function(e,t,o,i,n,r){var a=document.createElement("div"),s=a.style;{var c;n=void 0!==n?n:12,a.innerHTML=e+"&nbsp;",a.setAttribute("id","cookieNotice"),a.setAttribute("data-test-section","cookie-notice"),a.setAttribute("data-test-transitioning","false"),s.position="fixed","top"===r?(c=document.querySelector("body"),b=c.style.paddingTop,s.top="0",c.style.paddingTop="48px"):s.bottom="0"}s.left="0",s.right="0",s.background=t,s.color=o,s["z-index"]="999",s.padding="10px 5px",s["text-align"]="center",s["font-size"]=n+"px",s["line-height"]="28px",i&&(s.fontFamily=i);return a}(g(r.messageLocales),r.noticeBgColor,r.noticeTextColor,r.fontFamily,r.fontSize,r.cookieNoticePosition);r.learnMoreLinkEnabled&&(i=g(r.learnMoreLinkText),n=i,a=r.learnMoreLinkHref,s=r.linkTarget,c=r.linkColor,r.linkBgColor,l=document.createElement("a"),u=l.style,l.href=a,l.textContent=n,l.title=n,l.target=s,l.className="learn-more",l.setAttribute("data-test-action","learn-more-link"),u.color=c,u.backgroundColor="transparent",u["text-decoration"]="underline",u.display="inline",e=l);var p=function(e,t,o,i){var n=document.createElement("span"),r=n.style;n.href="#",n.innerHTML=e,n.setAttribute("role","button"),n.className="confirm",n.setAttribute("data-test-action","dismiss-cookie-notice"),r.background=t,r.color=o,r["text-decoration"]="none",r.cursor="pointer",r.display="inline-block",r.padding="0 15px",r.margin="0 0 0 10px",i&&(r.fontFamily=i);return n}(g(r.buttonLocales),r.buttonBgColor,r.buttonTextColor,r.fontFamily);p.addEventListener("click",function(e){var t,o,i,n;e.preventDefault(),t=60*parseInt(r.expiresIn+"",10)*1e3*60*24,o=new Date,(i=new Date).setTime(o.getTime()+t),document.cookie="cookie_notice=1; expires="+i.toUTCString()+"; path=/;",(n=d).style.opacity=1,n.setAttribute("data-test-transitioning","true"),function e(){(n.style.opacity-=.1)<.01?(void 0!==b&&(document.querySelector("body").style.paddingTop=b),document.body.removeChild(n)):setTimeout(e,40)}()});var m=document.body.appendChild(d);e&&m.appendChild(e),m.appendChild(p)}}}();

/***/ })

},[["./assets/js/app.js","runtime"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvYXBwLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9mdW5jdGlvbnMuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2Nvb2tpZS1ub3RpY2UvZGlzdC9jb29raWUubm90aWNlLm1pbi5qcyJdLCJuYW1lcyI6WyJlbGVtZW50IiwiZG9jdW1lbnQiLCJnZXRFbGVtZW50QnlJZCIsImFkZEV2ZW50TGlzdGVuZXIiLCJ0b2dnbGVNZW51IiwibmF2IiwiY2xhc3NMaXN0IiwiY29udGFpbnMiLCJyZW1vdmUiLCJhZGQiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7Ozs7OztBQU9BO0FBR0E7QUFDQTtBQUVBOzs7Ozs7Ozs7Ozs7QUNiQSxJQUFJQSxPQUFPLEdBQUdDLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixlQUF4QixDQUFkOztBQUVBLElBQUlGLE9BQU8sS0FBSyxJQUFoQixFQUFzQjtBQUNsQkEsU0FBTyxDQUFDRyxnQkFBUixDQUF5QixPQUF6QixFQUFrQ0MsVUFBbEM7QUFDSDs7QUFFRCxTQUFTQSxVQUFULEdBQXNCO0FBQ2xCLE1BQUlDLEdBQUcsR0FBR0osUUFBUSxDQUFDQyxjQUFULENBQXdCLHVCQUF4QixDQUFWOztBQUNBLE1BQUlHLEdBQUcsQ0FBQ0MsU0FBSixDQUFjQyxRQUFkLENBQXVCLFFBQXZCLENBQUosRUFBc0M7QUFDbENGLE9BQUcsQ0FBQ0MsU0FBSixDQUFjRSxNQUFkLENBQXFCLFFBQXJCO0FBQ0gsR0FGRCxNQUVPO0FBQ0hILE9BQUcsQ0FBQ0MsU0FBSixDQUFjRyxHQUFkLENBQWtCLFFBQWxCO0FBQ0g7QUFDSixDOzs7Ozs7Ozs7OztBQ2JEOztBQUVBLFlBQVksYUFBYSxXQUFXLGdCQUFnQix1dkJBQXV2Qiw4SEFBOEgsMkZBQTJGLGdCQUFnQixRQUFRLCtNQUErTSxjQUFjLCtEQUErRCxzQkFBc0Isd0RBQXdELHNCQUFzQixtQ0FBbUMsc0VBQXNFLCtEQUErRCxJQUFJLHdEQUF3RCxTQUFTLHlEQUF5RCxzQkFBc0Isd0ZBQXdGLFNBQVMsc0JBQXNCLEVBQUUsMENBQTBDLDRDQUE0QywrQ0FBK0MsTUFBTSx1Q0FBdUMsa1JBQWtSLG1MQUFtTCxTQUFTLHVHQUF1Ryw4WEFBOFgsd0JBQXdCLCtDQUErQyx3U0FBd1MsU0FBUyxvRUFBb0UsdUNBQXVDLFlBQVksOElBQThJLDZCQUE2QixRQUFRLHNGQUFzRiwwSUFBMEksR0FBRyxFQUFFLG1DQUFtQyx1Q0FBdUMsRyIsImZpbGUiOiJqcy9hcHAuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvKlxuICogV2VsY29tZSB0byB5b3VyIGFwcCdzIG1haW4gSmF2YVNjcmlwdCBmaWxlIVxuICpcbiAqIFdlIHJlY29tbWVuZCBpbmNsdWRpbmcgdGhlIGJ1aWx0IHZlcnNpb24gb2YgdGhpcyBKYXZhU2NyaXB0IGZpbGVcbiAqIChhbmQgaXRzIENTUyBmaWxlKSBpbiB5b3VyIGJhc2UgbGF5b3V0IChiYXNlLmh0bWwudHdpZykuXG4gKi9cblxuLy8gYW55IENTUyB5b3UgaW1wb3J0IHdpbGwgb3V0cHV0IGludG8gYSBzaW5nbGUgY3NzIGZpbGUgKGFwcC5jc3MgaW4gdGhpcyBjYXNlKVxuXG5cbi8vIE5lZWQgalF1ZXJ5PyBJbnN0YWxsIGl0IHdpdGggXCJ5YXJuIGFkZCBqcXVlcnlcIiwgdGhlbiB1bmNvbW1lbnQgdG8gaW1wb3J0IGl0LlxuLy8gaW1wb3J0ICQgZnJvbSAnanF1ZXJ5JztcblxuaW1wb3J0IGNvb2tpZSBmcm9tICdjb29raWUtbm90aWNlL2Rpc3QvY29va2llLm5vdGljZS5taW4uanMnO1xuaW1wb3J0IGZ1bmN0aW9ucyBmcm9tICcuL2Z1bmN0aW9ucyc7XG4iLCJsZXQgZWxlbWVudCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdtb2JpbGVUb2dnbGVyJyk7XG5cbmlmIChlbGVtZW50ICE9PSBudWxsKSB7XG4gICAgZWxlbWVudC5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIHRvZ2dsZU1lbnUpO1xufVxuXG5mdW5jdGlvbiB0b2dnbGVNZW51KCkge1xuICAgIGxldCBuYXYgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnbmF2YmFyLW1lbnUtY29udGFpbmVyJyk7XG4gICAgaWYgKG5hdi5jbGFzc0xpc3QuY29udGFpbnMoJ2hpZGRlbicpKSB7XG4gICAgICAgIG5hdi5jbGFzc0xpc3QucmVtb3ZlKCdoaWRkZW4nKTtcbiAgICB9IGVsc2Uge1xuICAgICAgICBuYXYuY2xhc3NMaXN0LmFkZCgnaGlkZGVuJyk7XG4gICAgfVxufVxuIiwiLyohIGNvb2tpZS1ub3RpY2UgdjEuMy4zIGJ5IEFsZXNzYW5kcm8gQmVub2l0LCBCZXJuaGFyZCBCZWhyZW5kdCAyMDIwLTA5LTExICovXG5cbiFmdW5jdGlvbigpe1widXNlIHN0cmljdFwiO3ZhciBmLGIsaz17bWVzc2FnZUxvY2FsZXM6e2l0OlwiVXRpbGl6emlhbW8gaSBjb29raWUgcGVyIGVzc2VyZSBzaWN1cmkgY2hlIHR1IHBvc3NhIGF2ZXJlIGxhIG1pZ2xpb3JlIGVzcGVyaWVuemEgc3VsIG5vc3RybyBzaXRvLiBTZSBjb250aW51aSBhZCB1dGlsaXp6YXJlIHF1ZXN0byBzaXRvIGFzc3VtaWFtbyBjaGUgdHUgbmUgc2lhIGZlbGljZS5cIixlbjpcIldlIHVzZSBjb29raWVzIHRvIGVuc3VyZSB0aGF0IHlvdSBoYXZlIHRoZSBiZXN0IGV4cGVyaWVuY2Ugb24gb3VyIHdlYnNpdGUuIElmIHlvdSBjb250aW51ZSB0byB1c2UgdGhpcyBzaXRlIHdlIGFzc3VtZSB0aGF0IHlvdSBhY2NlcHQgdGhpcy5cIixkZTpcIldpciB2ZXJ3ZW5kZW4gQ29va2llcyB1bSBzaWNoZXJ6dXN0ZWxsZW4sIGRhc3MgU2llIGRhcyBiZXN0ZSBFcmxlYm5pcyBhdWYgdW5zZXJlciBXZWJzaXRlIGhhYmVuLlwiLGZyOlwiTm91cyB1dGlsaXNvbnMgZGVzIGNvb2tpZXMgYWZpbiBkJ8OqdHJlIHPDu3IgcXVlIHZvdXMgcG91dmV6IGF2b2lyIGxhIG1laWxsZXVyZSBleHDDqXJpZW5jZSBzdXIgbm90cmUgc2l0ZS4gU2kgdm91cyBjb250aW51ZXogw6AgdXRpbGlzZXIgY2Ugc2l0ZSwgbm91cyBzdXBwb3NvbnMgcXVlIHZvdXMgYWNjZXB0ZXouXCIscHQ6XCJVdGlsaXphbW9zIGNvb2tpZXMgcGFyYSBnYXJhbnRpciBxdWUgdm9jw6ogdGVuaGEgYSBtZWxob3IgZXhwZXJpw6puY2lhIGVtIG5vc3NvIHNpdGUuIFNlIHZvY8OqIGNvbnRpbnVhciBhIHVzYXIgZXN0ZSBzaXRlLCBhc3N1bWltb3MgcXVlIHZvY8OqIGFjZWl0YSBpc3NvLlwifSxjb29raWVOb3RpY2VQb3NpdGlvbjpcImJvdHRvbVwiLGxlYXJuTW9yZUxpbmtFbmFibGVkOiExLGxlYXJuTW9yZUxpbmtIcmVmOlwiL2Nvb2tpZS1iYW5uZXItaW5mb3JtYXRpb24uaHRtbFwiLGxlYXJuTW9yZUxpbmtUZXh0OntpdDpcIlNhcGVybmUgZGkgcGnDuVwiLGVuOlwiTGVhcm4gbW9yZVwiLGRlOlwiTWVociBlcmZhaHJlblwiLGZyOlwiRW4gc2F2b2lyIHBsdXNcIixwdDpcIlNhYmVyIG1haXNcIn0sYnV0dG9uTG9jYWxlczp7ZW46XCJPS1wifSxleHBpcmVzSW46MzAsZm9udEZhbWlseTpcImluaGVyaXRcIixmb250U2l6ZToxMixidXR0b25CZ0NvbG9yOlwiI2NhNTAwMFwiLGJ1dHRvblRleHRDb2xvcjpcIiNmZmZcIixub3RpY2VCZ0NvbG9yOlwiIzAwMFwiLG5vdGljZVRleHRDb2xvcjpcIiNmZmZcIixsaW5rQ29sb3I6XCIjMDA5ZmRkXCIsbGlua0JnQ29sb3I6XCIjMDAwXCIsbGlua1RhcmdldDpcIl9ibGFua1wiLGRlYnVnOiExfTtmdW5jdGlvbiBnKGUpe3ZhciB0PShuYXZpZ2F0b3IudXNlckxhbmd1YWdlfHxuYXZpZ2F0b3IubGFuZ3VhZ2UpLnN1YnN0cigwLDIpO3JldHVybiBlW3RdP2VbdF06ZS5lbn1kb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiRE9NQ29udGVudExvYWRlZFwiLGZ1bmN0aW9uKCl7Znx8bmV3IGNvb2tpZU5vdGljZUpTfSksd2luZG93LmNvb2tpZU5vdGljZUpTPWZ1bmN0aW9uKCl7aWYodm9pZCAwPT09ZiYmKGY9dGhpcywtMT09ZG9jdW1lbnQuY29va2llLmluZGV4T2YoXCJjb29raWVfbm90aWNlXCIpKSl7dmFyIHQsbz1kb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwic2NyaXB0WyBkYXRhLWNvb2tpZS1ub3RpY2UgXVwiKTt0cnl7dD1vP0pTT04ucGFyc2Uoby5nZXRBdHRyaWJ1dGUoXCJkYXRhLWNvb2tpZS1ub3RpY2VcIikpOnt9fWNhdGNoKGUpe2NvbnNvbGUuZXJyb3IoXCJkYXRhLWNvb2tpZS1ub3RpY2UgSlNPTiBlcnJvcjpcIixvLGUpLHQ9e319dmFyIHI9ZnVuY3Rpb24gZSh0LG8pe2Zvcih2YXIgaSBpbiBvKW8uaGFzT3duUHJvcGVydHkoaSkmJihcIm9iamVjdFwiPT10eXBlb2YgdFtpXT90W2ldPWUodFtpXSxvW2ldKTp0W2ldPW9baV0pO3JldHVybiB0fShrLGFyZ3VtZW50c1swXXx8dHx8e30pO3IuZGVidWcmJmNvbnNvbGUud2FybihcImNvb2tpZS1ub3RpY2U6XCIscik7dmFyIGUsaSxuLGEscyxjLGwsdSxkPWZ1bmN0aW9uKGUsdCxvLGksbixyKXt2YXIgYT1kb2N1bWVudC5jcmVhdGVFbGVtZW50KFwiZGl2XCIpLHM9YS5zdHlsZTt7dmFyIGM7bj12b2lkIDAhPT1uP246MTIsYS5pbm5lckhUTUw9ZStcIiZuYnNwO1wiLGEuc2V0QXR0cmlidXRlKFwiaWRcIixcImNvb2tpZU5vdGljZVwiKSxhLnNldEF0dHJpYnV0ZShcImRhdGEtdGVzdC1zZWN0aW9uXCIsXCJjb29raWUtbm90aWNlXCIpLGEuc2V0QXR0cmlidXRlKFwiZGF0YS10ZXN0LXRyYW5zaXRpb25pbmdcIixcImZhbHNlXCIpLHMucG9zaXRpb249XCJmaXhlZFwiLFwidG9wXCI9PT1yPyhjPWRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCJib2R5XCIpLGI9Yy5zdHlsZS5wYWRkaW5nVG9wLHMudG9wPVwiMFwiLGMuc3R5bGUucGFkZGluZ1RvcD1cIjQ4cHhcIik6cy5ib3R0b209XCIwXCJ9cy5sZWZ0PVwiMFwiLHMucmlnaHQ9XCIwXCIscy5iYWNrZ3JvdW5kPXQscy5jb2xvcj1vLHNbXCJ6LWluZGV4XCJdPVwiOTk5XCIscy5wYWRkaW5nPVwiMTBweCA1cHhcIixzW1widGV4dC1hbGlnblwiXT1cImNlbnRlclwiLHNbXCJmb250LXNpemVcIl09bitcInB4XCIsc1tcImxpbmUtaGVpZ2h0XCJdPVwiMjhweFwiLGkmJihzLmZvbnRGYW1pbHk9aSk7cmV0dXJuIGF9KGcoci5tZXNzYWdlTG9jYWxlcyksci5ub3RpY2VCZ0NvbG9yLHIubm90aWNlVGV4dENvbG9yLHIuZm9udEZhbWlseSxyLmZvbnRTaXplLHIuY29va2llTm90aWNlUG9zaXRpb24pO3IubGVhcm5Nb3JlTGlua0VuYWJsZWQmJihpPWcoci5sZWFybk1vcmVMaW5rVGV4dCksbj1pLGE9ci5sZWFybk1vcmVMaW5rSHJlZixzPXIubGlua1RhcmdldCxjPXIubGlua0NvbG9yLHIubGlua0JnQ29sb3IsbD1kb2N1bWVudC5jcmVhdGVFbGVtZW50KFwiYVwiKSx1PWwuc3R5bGUsbC5ocmVmPWEsbC50ZXh0Q29udGVudD1uLGwudGl0bGU9bixsLnRhcmdldD1zLGwuY2xhc3NOYW1lPVwibGVhcm4tbW9yZVwiLGwuc2V0QXR0cmlidXRlKFwiZGF0YS10ZXN0LWFjdGlvblwiLFwibGVhcm4tbW9yZS1saW5rXCIpLHUuY29sb3I9Yyx1LmJhY2tncm91bmRDb2xvcj1cInRyYW5zcGFyZW50XCIsdVtcInRleHQtZGVjb3JhdGlvblwiXT1cInVuZGVybGluZVwiLHUuZGlzcGxheT1cImlubGluZVwiLGU9bCk7dmFyIHA9ZnVuY3Rpb24oZSx0LG8saSl7dmFyIG49ZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcInNwYW5cIikscj1uLnN0eWxlO24uaHJlZj1cIiNcIixuLmlubmVySFRNTD1lLG4uc2V0QXR0cmlidXRlKFwicm9sZVwiLFwiYnV0dG9uXCIpLG4uY2xhc3NOYW1lPVwiY29uZmlybVwiLG4uc2V0QXR0cmlidXRlKFwiZGF0YS10ZXN0LWFjdGlvblwiLFwiZGlzbWlzcy1jb29raWUtbm90aWNlXCIpLHIuYmFja2dyb3VuZD10LHIuY29sb3I9byxyW1widGV4dC1kZWNvcmF0aW9uXCJdPVwibm9uZVwiLHIuY3Vyc29yPVwicG9pbnRlclwiLHIuZGlzcGxheT1cImlubGluZS1ibG9ja1wiLHIucGFkZGluZz1cIjAgMTVweFwiLHIubWFyZ2luPVwiMCAwIDAgMTBweFwiLGkmJihyLmZvbnRGYW1pbHk9aSk7cmV0dXJuIG59KGcoci5idXR0b25Mb2NhbGVzKSxyLmJ1dHRvbkJnQ29sb3Isci5idXR0b25UZXh0Q29sb3Isci5mb250RmFtaWx5KTtwLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLGZ1bmN0aW9uKGUpe3ZhciB0LG8saSxuO2UucHJldmVudERlZmF1bHQoKSx0PTYwKnBhcnNlSW50KHIuZXhwaXJlc0luK1wiXCIsMTApKjFlMyo2MCoyNCxvPW5ldyBEYXRlLChpPW5ldyBEYXRlKS5zZXRUaW1lKG8uZ2V0VGltZSgpK3QpLGRvY3VtZW50LmNvb2tpZT1cImNvb2tpZV9ub3RpY2U9MTsgZXhwaXJlcz1cIitpLnRvVVRDU3RyaW5nKCkrXCI7IHBhdGg9LztcIiwobj1kKS5zdHlsZS5vcGFjaXR5PTEsbi5zZXRBdHRyaWJ1dGUoXCJkYXRhLXRlc3QtdHJhbnNpdGlvbmluZ1wiLFwidHJ1ZVwiKSxmdW5jdGlvbiBlKCl7KG4uc3R5bGUub3BhY2l0eS09LjEpPC4wMT8odm9pZCAwIT09YiYmKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCJib2R5XCIpLnN0eWxlLnBhZGRpbmdUb3A9YiksZG9jdW1lbnQuYm9keS5yZW1vdmVDaGlsZChuKSk6c2V0VGltZW91dChlLDQwKX0oKX0pO3ZhciBtPWRvY3VtZW50LmJvZHkuYXBwZW5kQ2hpbGQoZCk7ZSYmbS5hcHBlbmRDaGlsZChlKSxtLmFwcGVuZENoaWxkKHApfX19KCk7Il0sInNvdXJjZVJvb3QiOiIifQ==