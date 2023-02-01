jQuery( document ).ready(function() {

	jQuery(document).on("keyup", "#barcode", function() {
		var barcode = jQuery(this).val();
		var action = "findProduct";
		console.log(barcode);

		$.ajax({
			url:"././classes/ajax.php",
			type: "POST",
			dataType: "JSON",
			data: {
				"action":action,
				"barcode":barcode
			},
			success: function(response) {
				jQuery(#costPrice).val(response.costPrice);

			}
		})


	})

	jQuery(document).on("change", "#product_cat", function(){

    	if(jQuery('#product_cat').val() == '3') {
            jQuery('#mon_size').show(); 
            jQuery('#toner').hide(); 
            jQuery('#hdd').hide(); 
            jQuery('#processor').hide(); 
            jQuery('#ram').hide(); 

        } 

        else if (jQuery('#product_cat').val() == '4') {
        	jQuery('#mon_size').hide(); 
            jQuery('#toner').show(); 
            jQuery('#hdd').hide(); 
            jQuery('#processor').hide(); 
            jQuery('#ram').hide(); 

        }
	
	else {
            alert("OK"); 
        } 
    });
    
});



