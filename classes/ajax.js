// jQuery( document ).ready(function() {

// 	jQuery(document).on("keyup", "#barcode", function() {
// 		var barcode = jQuery(this).val();
// 		var action = "findProduct";
// 		if (barcode=="") {
// 			jQuery("#costPrice").val("");
// 		}

// 		else {
// 		$.ajax({
// 			url:"ajax.php",
// 			type: "POST",
// 			dataType: "JSON",
// 			data: {
// 				"action":action,
// 				"barcode":barcode
// 			},
// 			success: function(response) {
// 				jQuery("#costPrice").val(response.costPrice);
// 				jQuery("#product_id").val(response.id);
// 				findStock(response.id);


// 			}
// 		})
// 	  }
// 	})


// 	function findStock(product_id){
// 		$.ajax({
// 			url:"././Classes/ajax.php",
// 			type:"POST",
// 			dataType:"JSON",
// 			data:{
// 				"action":"findStock",
// 				"product_id":product_id
// 			},
// 			success:function(response){
// 				 jQuery("#stock").val(response.qnt);
// 				 jQuery(".stock").val(response.qnt);
// 			}
// 		});
// 	}



// 	jQuery(document).on("keyup", "#quantity", function() {
// 		var qnt = jQuery(this).val();
// 		if (qnt == "") {
// 			jQuery("#total").val("");

// 		}
// 		else{
// 			var price = jQuery("#costPrice").val();
// 			var total = qnt * price;
// 			jQuery("#total").val(total);

// 		}
// 	})


// 	jQuery(document).on("click", ".addItem", function(){
// 		var pdate = jQuery("#pdate").val();
// 		var cName = jQuery("#cName").val();
// 		var invoice = jQuery("#invoice").val();
// 		var product_id = jQuery("#product_id").val();
// 		var barcode = jQuery("#barcode").val();
// 		var price = jQuery("#costPrice").val();
// 		var qnt = jQuery("#quantity").val();
// 		var total = jQuery("#total").val();	

// 		$.ajax({
// 			url: "././classes/ajax.php",
// 			type: "POST",
// 			data: {
// 				'pdate':pdate,
// 				'cName':cName,
// 				'invoice':invoice,
// 				'product_id':product_id,
// 				'barcode':barcode,
// 				'price':price,
// 				'qnt':qnt,
// 				'total':total,
// 				'action': "addItem" 
// 			},

// 			success: function(response) {
// 				if (response=="200") {
// 					showItem();
// 					qntCal();
// 					amountCal();
// 					alert("Item Added");
// 				}
// 				else {
// 					alert ("Something went wrong");
// 				}
// 			}
// 		})
// 	});

// 	function showItem(){
// 		var invoice = jQuery("#invoice").val();
// 		var action = "showItem";

// 		$.ajax({
// 			url: "././classes/ajax.php",
// 			type: "POST",
// 			data: {
// 				'invoice':invoice,
// 				'action':action
// 			},
// 			success:function(response){
// 				jQuery(".tdata").html(response);
// 			}
// 		});
// 	}

// 	function qntCal(){
// 		var invoice = jQuery("#invoice").val();
// 		var action = "qntCal";

// 		$.ajax({
// 			url: "././classes/ajax.php",
// 			type: "POST",
// 			data: {
// 				'invoice':invoice,
// 				'action':action
// 			},
// 			success:function(response){
// 				jQuery("#totalQnt").val(response);
// 			}
// 		});
// 	}

// 	function amountCal(){
// 		var invoice = jQuery("#invoice").val();
// 		var action = "amountCal";

// 		$.ajax({
// 			url: "././classes/ajax.php",
// 			type: "POST",
// 			data: {
// 				'invoice':invoice,
// 				'action':action
// 			},
// 			success:function(response){
// 				jQuery("#totalAmt").val(response);
// 			}
// 		});
// 	}



// 	jQuery(document).on("change", "#dis", function(){
// 		var dis = jQuery(this).val();
// 		var amount = jQuery("#totalAmt").val();
// 		var disAmount = ((amount*dis)/100);
// 		jQuery("#disAmt").val(disAmount);
// 		var gTotal = amount-disAmount;
// 		jQuery("#gTotal").val(gTotal);
// 	})

// 	jQuery(document).on("keyup", "#payment", function(){
// 		var pay = jQuery(this).val();
// 		var gTotal = jQuery("#gTotal").val();
// 		var due = pay - gTotal;
// 		jQuery("#due").val(due);
// 	})

// 	jQuery(document).on("click", "#save", function(){
// 		var pdate = jQuery("#pdate").val();
// 		var cName = jQuery("#cName").val();
// 		var invoice = jQuery("#invoice").val();
// 		var total_quantity = jQuery("#totalQnt").val();
// 		var total_price =jQuery("#totalAmt").val();
// 		var dis = jQuery("#dis").val();
// 		var dis_amount =jQuery("#disAmt").val();
// 		var grand_total =jQuery("#gTotal").val();
// 		var pay =jQuery("#payment").val();
// 		var due =jQuery("#due").val();
// 		var action ="purchaseSummery";

// 		$.ajax({
// 			url: "././classes/ajax.php",
// 			type:"POST",
// 			data:{
// 				'pdate' :pdate,
// 				'cName' :cName,
// 				'invoice' :invoice,
// 				'total_quantity' :total_quantity,
// 				'total_price' :total_price,
// 				'dis' :dis,
// 				'dis_amount' :dis_amount,
// 				'grand_total' :grand_total,
// 				'pay' :pay,
// 				'due' :due,
// 				'action' :action
// 			},
// 			success:function(response){
// 			 alert("Successfully Saved");
// 			}
// 		})
// 	})

// 	jQuery(document).on("click", ".removeItem", function(){
// 		var id = jQuery(this).val();
// 		var action = "removeItem";

// 		$.ajax({
// 			url: "././classes/ajax.php",
// 			type: "POST",
// 			data: {
// 				"id": id,
// 				"action": action
// 			},
// 			success:function(response){
// 				showItem();
// 				alert("Item Removed");

// 			}
// 		})

// 	})



//  	jQuery(document).on("keyup",".barcode",function(){
//  		var barcode = jQuery(this).val();
//  		var action ="findProduct";
//  		$.ajax({
// 			url: "././classes/ajax.php",
//  			type:"POST",
//  			dataType:"JSON",
//  			data:{
//  				"barcode":barcode,
//  				"action":action
//  			},
//  			success:function(response){
//  				jQuery(".price").val(response.salePrice);
//  				jQuery(".product_id").val(response.id);
//  				findStock(response.id);
//  			}
//  		})
//  	});

 	
//  	jQuery(document).on("keyup", ".qnt", function(){
//  		var qnt = jQuery(this).val();
//  		var price = jQuery(".price").val();
//  		var total = qnt * price;
//  		jQuery(".total").val(total);
//  	});



    
// });

jQuery(document).ready(function() {
	jQuery(document).on("keyup", ".inv_id", function() {
		var inv_id = jQuery(this).val();
		var action = "history";
		// console.log(inv_id);
		$.ajax ({
    url:"classes/ajax.php",
    type: "POST",
    dataType: "JSON", // Make sure to set the dataType to "JSON"
    data: {
        "action":action,
        "inv_id":inv_id
    },
    success:function(response) {
        console.log(response);
        // Loop through the response data and use it as needed
        for (var i = 0; i < response.length; i++) {
            console.log(response[i].id);
            console.log(response[i].date);
            console.log(response[i].pre_loc);
            // etc.
        }
        // jQuery("#sl_no").val(response.sl_no);
        // jQuery("#user").val(response.user);
        // jQuery("#dept").val(response.dept);
        jQuery("#new_loc").val(response.pre_loc);
    }
});
	});


	jQuery(document).on("keyup", "#inv_id", function() {
		var inv_id = jQuery(this).val();
		var action = "findProduct";
		var history = "history";

		// console.log(inv_id);
		$.ajax ({
			url:"classes/ajax.php",
			type: "POST",
			dataType: "JSON",
			data: {
				"action":action,
				"history":history,
				"inv_id":inv_id
			},
			success:function(response) {




				if (response.product_cat == 1) {
    var spec = `Processor: ${response.processor}, RAM: ${response.ram}GB, HDD: ${response.hdd}`;
    var product_cat = 'CPU';
}
else if (response.product_cat == 2) {
    var product_cat = 'Laptop';
    var spec = response.processor + ", RAM-" + response.ram + "GB, HDD-" + response.hdd;
}
else if (response.product_cat == 3) {
    var product_cat = 'Monitor';
    var spec = "Size : " +response.mon_size + '"';
}
else if (response.product_cat == 4) {
    var product_cat = 'Printer';
    var spec = "";
}
else if (response.product_cat == 5) {
    var product_cat = 'Mouse';
    var spec = "";
}
else if (response.product_cat == 6) {
    var product_cat = 'Keyboard';
    var spec = "";                            
}
else if (response.product_cat == 7) {
    var product_cat = 'UPS';
    var spec = response.va + "VA";
}
else if (response.product_cat == 8) {
    var product_cat = 'Cash Drawer';
    var spec = "N/A";                            
}
else if (response.product_cat == 9) {
    var product_cat = 'POS Terminal';
    var spec = response.processor + ", RAM-" + response.ram + "GB, HDD-" + response.hdd;
}

if (response.product_cat == '1' || response.product_cat == '2') {
    jQuery("#brand").val(response.brand);
    jQuery("#model").val(response.model);
    jQuery("#sl_no").val(response.sl_no);
    jQuery("#spec").val(spec);
    jQuery("#user").val(response.user);
    jQuery("#dept").val(response.dept);
    jQuery("#location").val(response.location);
}
else {
    jQuery("#brand").val(response.brand);
    jQuery("#model").val(response.model);
    jQuery("#sl_no").val(response.sl_no);
    jQuery("#spec").val(spec);
    jQuery("#user").val(response.user);
    jQuery("#dept").val(response.dept);
    jQuery("#location").val(response.location);
}
			}
		})
	});



	jQuery(document).on("click", ".addItem", function(){
		var pdate = jQuery("#pdate").val();
		var gp_id = jQuery("#gp_id").val();
		var inv_id = jQuery("#inv_id").val();
		var brand = jQuery("#brand").val();
		var model = jQuery("#model").val();
		var sl_no = jQuery("#sl_no").val();
		var spec = jQuery("#spec").val();
		var location = jQuery("#location").val();
		var new_loc = jQuery("#new_loc").val();
		var dept = jQuery("#dept").val();
		var new_dept = jQuery("#new_dept").val();
		var r_name = jQuery("#r_name").val();
		var r_desig = jQuery("#r_desig").val();
		var company = jQuery("#company").val();
		var remarks = jQuery("#remarks").val();
		
		$.ajax({
			url: "././classes/ajax.php",
			type: "POST",
			data: {
				'pdate':pdate,
				'gp_id':gp_id,
				'inv_id':inv_id,
				'brand':brand,
				'model':model,
				'sl_no':sl_no,
				'spec':spec,
				'location':location,
				'new_loc':new_loc,
				'dept':dept,
				'new_dept':new_dept,
				'r_name':r_name,
				'r_desig':r_desig,
				'company':company,
				'remarks':remarks,
				'action': "addItem" 
			},

			// success: function(response) {
			// 	if (response=="200") {
			// 		showItem();
			// 		// qntCal();
			// 		// amountCal();
			// 		alert("Item Added");
			// 	}
			// 	else {
			// 		alert ("Something went wrong");
			// 	}
			// }


	success: function(response) {
    var data = JSON.parse(response);
    if (data.status === "success") {
        showItem();
        alert(data.message);
    }
    else {
        alert(data.message);
    }
}

		})
	});



	function showItem(){
		var gp_id = jQuery("#gp_id").val();
		var action = "showItem";

		$.ajax({
			url: "././classes/ajax.php",
			type: "POST",
			data: {
				'gp_id':gp_id,
				'action':action
			},
			success:function(response){
				jQuery(".tdata").html(response);
			}
		});
	}


	jQuery(document).on("click", ".removeItem", function(){
		var id = jQuery(this).val();
		var action = "removeItem";

		$.ajax({
			url: "././classes/ajax.php",
			type: "POST",
			data: {
				"id": id,
				"action": action
			},
			success:function(response){
				showItem();
				alert("Item Removed");

			}
		})

	})


	 $(document).ready(function() {
        $('#gp_id').on('input', function() {
            var gp_id = $(this).val();
            var url = 'reports/multicell-table.php?id=' + gp_id;
            $('#print-btn').attr('href', url);
        });
    });








});





