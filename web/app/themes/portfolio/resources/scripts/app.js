import {domReady} from '@roots/sage/client';
import 'bootstrap';
import 'jquery';

let $ = jQuery;

$(window).on("load", function() {
  // isotopeMasonry();
  
  $(".preloader").addClass("active");
  setTimeout(function () {
    $(".preloader").addClass("done");
  }, 1000);
});


/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }
  

  // application code
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
