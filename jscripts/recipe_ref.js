$(document).ready(function() {

  /* hide all divs inside demo-show2 */
  $('div.cont> div').hide();
  
  /* click function for all relevant anchors */
  $('div.cont> a').click(function() {
   
   /* setup div variables */
	var $nextDiv = $(this).next();
    var $visibleSiblings = $nextDiv.siblings('div:visible');
	
		/* We want to slide any visible sibling <div> up first and then toggle the next <div> using .slideToggle(). 
		But we want this queued effect to occur only if there actually is a visible div. 
		So, we'll use an if statement */
		
		if ($visibleSiblings.length ) {
				$visibleSiblings.slideUp('slow', function() {
				$nextDiv.slideToggle('slow');	
		});
			} else {
			   $nextDiv.slideToggle('slow');
			}
		  });
    
});

   
