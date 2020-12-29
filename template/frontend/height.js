
	// product equel height 
	function productfuc(pr,ch){
		var maxHeight = 0;
		$(pr+" "+ch).css("height","auto");

		$(pr+" "+ch).each(function () {
		    if ($(this).height() > maxHeight) {
		        maxHeight = $(this).height();
		    }
		});		

		$(pr+" "+ch).height(maxHeight);

	}

	$(document).ready(function () {		 			 		
		
		setTimeout(function(){ productfuc(".projects-container",".portfolio-item"); }, 500);

	});


	$(window).resize(function(){		
		productfuc(".projects-container",".portfolio-item");			
	});

	$('#showmore').click(function(){				
		setTimeout(function(){ productfuc(".projects-container",".portfolio-item"); }, 2000);
	});

 