import {domReady} from '@roots/sage/client';
import 'bootstrap';
import 'jquery';
import Isotope from 'isotope-layout';

let $ = jQuery;

$(window).on("load", function() {

  isotopeMasonry();

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
  animatedProgressBar();
  windowHieght();
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);


function animatedProgressBar () {
  $(".progress").each(function() {
    var skillValue = $(this).find(".skill-lavel").attr("data-skill-value");
    $(this).find(".bar").animate({
      width: skillValue,
    }, 1500);

    $(this).find(".skill-lavel").text(skillValue);
  });
}

function windowHieght(){
  if ( $(window).height() <=768 ) {
    $(".pt-table").addClass("desktop-768");
  } else {
    $(".pt-table").removeClass("desktop-768");
  }
}

/*----------------------------------------
  Isotope Masonry
------------------------------------------*/
function isotopeMasonry() {
  var gutterSelector = document.querySelector('.isotope-gutter');
  var iso;
  if(gutterSelector) {
    iso = new Isotope( gutterSelector, {
      itemSelector: '[class^="col-"]',
      percentPosition: true,
    });
  }

  var noGutterSelector = document.querySelector('.isotope-no-gutter');
  if(noGutterSelector) {
    new Isotope( noGutterSelector, {
      itemSelector: '[class^="col-"]',
      percentPosition: true,
      masonry: {
        columnWidth: 1,
      },
    });
  }

  $(".filter a").on("click", function() {
    $(".filter a").removeClass("active");
    $(this).addClass("active");
    iso.arrange({ filter: $(this).attr("data-filter") });
    
    return false;
  });
}