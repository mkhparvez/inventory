

jQuery(document).ready(function() {
    // Hide specific elements on page load
    jQuery('.mon_size, .toner, .hdd, .processor, .ram, .va, .port, .port_type, .ip, .cam_type, .cam_res, .brand, .model, .sl_no, .user, .user_designation, .PF, .dept_id, .location, .status, .remarks').hide();

    // Function to handle the visibility logic
    function handleProductCatChange() {
        var productCatValue = jQuery('#product_cat').val();

        // If no value is selected (i.e., it's null, empty, or has a default unselected value)
        if (!productCatValue) {
            jQuery('.processor, .ram, .hdd, .mon_size, .toner, .va, .mouseKeyboard, .port, .port_type, .cam_type, .cam_res, .ip').hide(); 
            jQuery('.brand, .model, .sl_no, .user, .user_designation, .PF, .dept_id, .location, .status, .remarks').hide();
        }
        //---------- CPU, Laptop, POS Terminal ----------\\
        else if (productCatValue == '1' || productCatValue == '2' || productCatValue == '9') {
            jQuery('.hdd, .processor, .ram, .mouseKeyboard').show(); 
            jQuery('.mon_size, .toner, .va, .cam_type, .cam_res').hide(); 
            jQuery('.brand, .model, .sl_no, .user, .user_designation, .PF, .dept_id, .ip, .location, .status, .remarks').show();
        } 
        //---------- Monitor ----------\\
        else if (productCatValue == '3') {
            jQuery('.mon_size').show(); 
            jQuery('.toner, .hdd, .processor, .va, .ram, .port, .port_type, .ip, .cam_type, .cam_res').hide(); 
            jQuery('.brand, .model, .sl_no, .user, .user_designation, .PF, .dept_id, .location, .status, .remarks').show();
        } 
        //---------- Printer ----------\\
        else if (productCatValue == '4') {
            jQuery('.toner').show(); 
            jQuery('.mon_size, .hdd, .processor, .va, .ram, .cam_type, .cam_res').hide(); 
            jQuery('.brand, .model, .sl_no, .user, .user_designation, .PF, .dept_id, .ip, .location, .status, .remarks').show();
        } 

        //---------- UPS ----------\\
        else if (productCatValue == '7') {
            jQuery('.va').show(); 
            jQuery('.mon_size, .toner, .hdd, .processor, .ram, .port, .port_type, .cam_type, .cam_res, .ip').hide(); 
            jQuery('.brand, .model, .sl_no, .user, .user_designation, .PF, .dept_id, .location, .status, .remarks').show();
        }
        //---------- Scanner, Barcode Scanner, Photocopier ----------\\
        else if (productCatValue == '10' || productCatValue == '11' || productCatValue == '12') {
            jQuery('.mon_size, .toner, .hdd, .processor, .va, .ram,.port').hide(); 
            jQuery('.brand, .model, .sl_no, .user, .user_designation, .PF, .dept_id, .location, .status, .remarks').show();
            jQuery('.ip').hide();
        }
        //---------- Camera ----------\\
        else if (productCatValue == '13') {
            jQuery('.cam_type, .cam_res, .ip').show(); 
            jQuery('.mon_size, .toner, .hdd, .processor, .va, .ram').hide(); 
            jQuery('.brand, .model, .sl_no, .dept_id, .location, .status, .remarks').show();
            jQuery('.user, .user_designation, .PF').hide();
        }
        //---------- Switch ----------\\
        else if (productCatValue == '14') {
            jQuery('.port, .port_type, .ip').show(); 
            jQuery('.mon_size, .toner, .hdd, .processor, .va, .ram, .cam_type, .cam_res').hide(); 
            jQuery('.brand, .model, .sl_no, .dept_id, .location, .status, .remarks').show();
            jQuery('.user, .user_designation, .PF').hide();
        }
        //---------- Router ----------\\
        else if (productCatValue == '15') {
            jQuery('.port, .ip').show(); 
            jQuery('.mon_size, .toner, .hdd, .processor, .va, .ram, .port_type, .cam_type, .cam_res').hide(); 
            jQuery('.brand, .model, .sl_no, .dept_id, .location, .status, .remarks').show();
            jQuery('.user, .user_designation, .PF').hide();
        }
        //---------- DVR, NVR ----------\\
        else if (productCatValue == '16' || productCatValue == '17') {
            jQuery('.hdd,.port, .ip').show(); 
            jQuery('.mon_size, .toner, .processor, .va, .ram, .port_type, .cam_type, .cam_res').hide(); 
            jQuery('.brand, .model, .sl_no, .dept_id, .location, .status, .remarks').show();
            jQuery('.user, .user_designation, .PF').hide();
        }
        //---------- Storage Devices ----------\\
        else if (productCatValue == '18' || productCatValue == '19' || productCatValue == '20') {
            jQuery('.hdd').show(); 
            jQuery('.mon_size, .toner, .processor, .va, .ram,.ip').hide(); 
            jQuery('.brand, .model, .sl_no, .user, .user_designation, .PF, .dept_id, .location, .status, .remarks').show();
        }
        // Hide all fields if an invalid category is selected
         else if (productCatValue == '0') {
            jQuery('.processor, .ram, .hdd, .mon_size, .toner, .va, .mouseKeyboard, .port, .port_type, .cam_type, .cam_res, .ip').hide(); 
            jQuery('.brand, .model, .sl_no, .user, .user_designation, .PF, .dept_id, .location, .status, .remarks').hide();
        }
        // Hide all fields if an invalid category is selected
        else {
            jQuery('.processor, .ram, .hdd, .mon_size, .toner, .va, .mouseKeyboard, .port, .port_type, .cam_type, .cam_res, .ip').hide(); 
            jQuery('.brand, .model, .sl_no, .user, .user_designation, .PF, .dept_id, .location, .status, .remarks').show();
        }
    }

    // Call function on page load to check initial value
    handleProductCatChange();

    // Call function on product category change
    jQuery(document).on("change", "#product_cat", function() {
        handleProductCatChange();
    });
});






jQuery(document).ready(function() {



  toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "3000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}





jQuery(document).on("click", "#add", function(){

  alert("Hello World");

});

});




  //---------- Backend User Search ----------\\

$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings("#result").css({"padding":"5px"});
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    // Set search input value and populate other fields on click of result item
    $(document).on("click", "#result p", function(){
        var selectedName = $(this).text();
        var designation = $(this).data('designation');
        var pf = $(this).data('pf');

        // Set the input value
        $(this).parents(".search-box").find('input[type="text"]').val(selectedName);

        // Set the designation and PF fields
        $('#user_designation').val(designation);
        $('#PF').val(pf);

        // Clear the result dropdown
        $(this).parent("#result").empty();
    });
});


$(document).ready(function () {
  // Data Table
    // $('#active_con').DataTable();
    $('#active_con').DataTable({
        order: [[ 2, 'asc' ], [ 3, 'asc' ]],
    });

    $('#assets').DataTable();

    // Asset History Slowloading
    $("#history tr").hide();
    $("#history tr").each(function(index){
    $(this).delay(index*700).show(1000);
});

});





    



