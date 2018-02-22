   $(document).ready(function() {
	 $('.materialboxed').materialbox();
   $(".button-collapse").sideNav();
   
       $('.carousel').carousel();
function heightDetect(){
		$(".parallax-container222").css("height",($(window).height()-100));
	}

	heightDetect();

	$(window).resize(function(){
		heightDetect();
	})
});

  