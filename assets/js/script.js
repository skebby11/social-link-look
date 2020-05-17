// JavaScript Document

jQuery(function() {
	
	
	jQuery("#btnImage").on("click", function(){
			var images = wp.media({
				title: "Upload Image",
				multiple: false
			}).open().on("select", function(e) {
				var uploadedImages = images.state().get("selection").first();
				var selectedImages = uploadedImages.toJSON();
				
				jQuery("#getImage").attr("src", selectedImages.url);
				jQuery("#ogimginput").attr("value", selectedImages.url);
					
				});
	});
	
	
	jQuery("#btnTwImage").on("click", function(){
			var images = wp.media({
				title: "Upload Image",
				multiple: false
			}).open().on("select", function(e) {
				var uploadedImages = images.state().get("selection").first();
				var selectedImages = uploadedImages.toJSON();
				
				jQuery("#getTwImage").attr("src", selectedImages.url);
				jQuery("#twimginput").attr("value", selectedImages.url);
					
				});
	});
});
	
	
