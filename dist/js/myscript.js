  
  jQuery( document ).ready(function() {

    if(jQuery('#product_cat').val() == 'Monitor') {
            jQuery('.mon_size').show(); 
            jQuery('.toner').hide(); 
            jQuery('.hdd').hide(); 
            jQuery('.processor').hide(); 
            jQuery('.ram').hide(); 

        } 

        else if (jQuery('#product_cat').val() == 'Printer') {
          jQuery('.mon_size').hide(); 
            jQuery('.toner').show(); 
            jQuery('.hdd').hide(); 
            jQuery('.processor').hide(); 
            jQuery('.ram').hide(); 

        }

        else if (jQuery('#product_cat').val() == 'CPU') {
          jQuery('.mon_size').hide(); 
            jQuery('.toner').hide(); 
            jQuery('.hdd').show(); 
            jQuery('.processor').show(); 
            jQuery('.ram').show(); 

        }
  
  else {
            jQuery('.mon_size').hide(); 
            jQuery('.toner').hide();
            jQuery('.hdd').hide(); 
            jQuery('.processor').hide(); 
            jQuery('.ram').hide(); 
        } 
    });



  jQuery(document).on("change", "#product_cat", function(){

      if(jQuery('#product_cat').val() == '3') {
            jQuery('.mon_size').show(); 
            jQuery('.toner').hide(); 
            jQuery('.hdd').hide(); 
            jQuery('.processor').hide(); 
            jQuery('.ram').hide(); 

        } 

        else if (jQuery('#product_cat').val() == '4') {
          jQuery('.mon_size').hide(); 
            jQuery('.toner').show(); 
            jQuery('.hdd').hide(); 
            jQuery('.processor').hide(); 
            jQuery('.ram').hide(); 

        }

        else if (jQuery('#product_cat').val() == '1') {
          jQuery('.mon_size').hide(); 
            jQuery('.toner').hide(); 
            jQuery('.hdd').show(); 
            jQuery('.processor').show(); 
            jQuery('.ram').show(); 

        }
  
  else {
            jQuery('.mon_size').hide(); 
            jQuery('.toner').hide();
            jQuery('.hdd').hide(); 
            jQuery('.processor').hide(); 
            jQuery('.ram').hide(); 
 
        } 
    });



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

$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings("#result").css({"padding":"5px"});
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", "#result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent("#result").empty();
    });
});


$(document).ready(function () {
  // Data Table
    $('#assets').DataTable();

    // Asset History Slowloading
    $("#history tr").hide();
    $("#history tr").each(function(index){
    $(this).delay(index*700).show(1000);
});

});


    



