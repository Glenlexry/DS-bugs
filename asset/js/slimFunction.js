$("body").niceScroll({
  cursorcolor: "#ec5a24",
  cursorwidth: "6px",
  cursorborder: "none",
  cursorborderradius: "0px",
  railpadding: { top: 3, right: 3, left: 0, bottom: 3 },
  zindex: [5]
});
/*Menu*/
$(".ambege").click(function() {
  $(this).toggleClass("is-active");
  $(".menu-page")
    .toggleClass("hide", 250)
    .toggleClass("zoomIn")
    .toggleClass("zoomOut");
});

$("a.scopeTab").click(function() {
  $("a.scopeTab").removeClass("active");
  $(this).toggleClass("active");
});

/* Parallax */
$(window).scroll(function(e) {
  parallax();
});
function parallax() {
  var scrolled = $(window).scrollTop();
  $(".mainPage").css("top", -(scrolled * 1.15) + "px");
  $(".heading").css("margin-top", scrolled * 0.15 + 44 + "vh");
  $(".shade").css("bottom", scrolled * 0.35 - 700 + "px");
}

$(".anchorLink").click(function(e) {
  e.preventDefault();
  var target = $($(this).attr("href"));
  if (target.length) {
    var scrollTo = target.offset().top;
    $("body, html").animate({ scrollTop: scrollTo + "px" }, 1500);
  }
});

$(window).scroll(function() {
  if ($(this).scrollTop() > 100) {
    $(".scroll-to-top").fadeIn();
  } else {
    $(".scroll-to-top").fadeOut();
  }
});

$(".scroll-to-top").click(function() {
  $("html, body").animate(
    {
      scrollTop: 0
    },
    600
  );
  return false;
});

new WOW().init();
