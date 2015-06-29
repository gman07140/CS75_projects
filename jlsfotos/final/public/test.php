<!DOCTYPE html>

<html>
    <head>
    <style>
    .gallery-wrap { margin: 0 auto; overflow: hidden; width: 732px; }
.gallery { position: relative; left: 0; top: 0; }
.gallery__item { float: left; list-style: none; margin-right: 20px; }
.gallery__img { display: block; border: 4px solid #40331b; height: 175px; width: 160px; }

.gallery__controls { margin-top: 10px; }
.gallery__controls-prev { cursor: pointer; float: left; }
.gallery__controls-next { cursor: pointer; float: right; }
</style>
        <script> 
        
  $(window).load(function(){

    // Fancybox specific
    $(".gallery__link").fancybox({
        'titleShow'     : false,
        'transitionIn'  : 'elastic',
        'transitionOut' : 'elastic'
    });

    // Set general variables
    // ====================================================================
    var totalWidth = 0;

    // Total width is calculated by looping through each gallery item and
    // adding up each width and storing that in `totalWidth`
    $(".gallery__item").each(function(){
        totalWidth = totalWidth + $(this).outerWidth(true);
    });

    // The maxScrollPosition is the furthest point the items should
    // ever scroll to. We always want the viewport to be full of images.
    var maxScrollPosition = totalWidth - $(".gallery-wrap").outerWidth();

    // This is the core function that animates to the target item
    // ====================================================================
    function toGalleryItem($targetItem){
        // Make sure the target item exists, otherwise do nothing
        if($targetItem.length){

            // The new position is just to the left of the targetItem
            var newPosition = $targetItem.position().left;

            // If the new position isn't greater than the maximum width
            if(newPosition <= maxScrollPosition){

                // Add active class to the target item
                $targetItem.addClass("gallery__item--active");

                // Remove the Active class from all other items
                $targetItem.siblings().removeClass("gallery__item--active");

                // Animate .gallery element to the correct left position.
                $(".gallery").animate({
                    left : - newPosition
                });
            } else {
                // Animate .gallery element to the correct left position.
                $(".gallery").animate({
                    left : - maxScrollPosition
                });
            };
        };
    };

    // Basic HTML manipulation
    // ====================================================================
    // Set the gallery width to the totalWidth. This allows all items to
    // be on one line.
    $(".gallery").width(totalWidth);

    // Add active class to the first gallery item
    $(".gallery__item:first").addClass("gallery__item--active");

    // When the prev button is clicked
    // ====================================================================
    $(".gallery__controls-prev").click(function(){
        // Set target item to the item before the active item
        var $targetItem = $(".gallery__item--active").prev();
        toGalleryItem($targetItem);
    });

    // When the next button is clicked
    // ====================================================================
    $(".gallery__controls-next").click(function(){
        // Set target item to the item after the active item
        var $targetItem = $(".gallery__item--active").next();
        toGalleryItem($targetItem);
    });
});
</script>
<script src="/java/jquery-1.11.2.min.js"></script>
<script src="/java/scripts.js"></script>
    </head>
    
    <div class="gallery-wrap">
  <div class="gallery clearfix">
    <div class="gallery__item">
      <img src="pics/IMG_0477.JPG" class="gallery__img" alt="" />
    </div>
     <div class="gallery__item">
      <img src="pics/IMG_0489.JPG" class="gallery__img" alt="" />
    </div>
    <div class="gallery__item">
      <img src="pics/IMG_0479.JPG" class="gallery__img" alt="" />
    </div>
    <div class="gallery__item">
      <img src="pics/IMG_0482.JPG" class="gallery__img" alt="" />
    </div>
    <div class="gallery__item">
      <img src="pics/IMG_0487.JPG" class="gallery__img" alt="" />
    </div>
  </div>
  <div class="gallery__controls clearfix">
    <div href="#" class="gallery__controls-prev">
      <img src="logopics/arrowleft.png" alt="" />
    </div>
    <div href="#" class="gallery__controls-next">
      <img src="logopics/arrowright.png" alt="" />
    </div>
  </div>
</div>
