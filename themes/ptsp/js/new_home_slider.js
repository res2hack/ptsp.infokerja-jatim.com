
//Header #jssor_header
jQuery(document).ready(function ($) {
				console.log(1);

    var jssor_header_SlideshowTransitions = [
      {$Duration:800,$Opacity:2}
    ];

    var jssor_header_options = {
      $AutoPlay: 1,
      $Align: 0,
      $SlideshowOptions: {
        $Class: $JssorSlideshowRunner$,
        $Transitions: jssor_header_SlideshowTransitions,
        $TransitionsOrder: 1
      }
    };

    var jssor_header_slider = new $JssorSlider$("jssor_header", jssor_header_options);

    /*#region responsive code begin*/

    var MAX_WIDTH = 1220;

    function ScaleSlider() {
        var containerElement = jssor_header_slider.$Elmt.parentNode;
        var containerWidth = containerElement.clientWidth;
				var bodyWidth = document.body.clientWidth;

        if (containerWidth) {

            var expectedWidth = Math.min(MAX_WIDTH || containerWidth, bodyWidth);

            jssor_header_slider.$ScaleWidth(expectedWidth);
						if(bodyWidth < MAX_WIDTH){
							$('.boxed').width(expectedWidth);
						}
            // containerElement.$ScaleWidth(expectedWidth);
						// console.log(containerWidth);
						// console.log(expectedWidth);
        }
        else {
            window.setTimeout(ScaleSlider, 30);
        }
    }

    ScaleSlider();

    $(window).bind("load", ScaleSlider);
    $(window).bind("resize", ScaleSlider);
    $(window).bind("orientationchange", ScaleSlider);
    /*#endregion responsive code end*/
});

//End Header #jssor_header
