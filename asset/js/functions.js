var desktop = $("#pagination");
var mobile = $(".mobile-nav");
var a = "a";
var active = "active";

desktop.find(a).eq(0).addClass(active);
mobile.find(a).eq(0).addClass(active);
slidePage.init({
  before: function(index, direction, target) {
    if (direction == "next") {
      if (target == 1) {
        slidePage.fire(2);
      }
      $(".item").removeClass(active).eq(index).addClass(active);    
      desktop.find(a).removeClass(active).eq(index).addClass(active);      
      mobile.find(a).removeClass(active).eq(index).addClass(active);
      } else if (direction == "prev") {      
      $(".item").removeClass(active).eq(target - 1).addClass(active);    
      desktop.find(a).removeClass(active).eq(target - 1).addClass(active);
      mobile.find(a).removeClass(active).eq(target - 1).addClass(active);
      }
  },
  after: function(index, direction, target) {},
  useAnimation: true,
  refresh: true,
  useWheel: true,
  speed: 1250
});

$(".ambege").click(function() {
  $(this).toggleClass("is-active");
  $(".menu-page").toggleClass("hide",250).toggleClass("zoomIn").toggleClass("zoomOut");         
});