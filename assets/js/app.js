/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)


// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

import functions from './functions';

window.$ = window.jQuery = require('jquery');
require('jquery.easing');
require('waypoints/src/waypoint');
require('jquery.counterup');
require('popper.js');
require('bootstrap');
require('isotope-layout');
require('infinite-scroll');
require('slick');
window.WOW = require('wow.js');
require('./morphext.min');
require('magnific-popup');
require('./custom');
