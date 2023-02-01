<!DOCTYPE html>
<html>
  <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
      $(document).ready(function() {
        // Submit form
        $("#form").submit(function(e) {
          e.preventDefault();

          // Get form data
          var formData = $(this).serialize();

          // Send data to server
          $.ajax({
            type: 'POST',
            url: 'submit.php',
            data: formData,
            success: function(response) {
              // Check if operation was successful
              if (response == "success") {
                // Show success message
                toastr.success('The operation was successful!');
              } else {
                // Show error message
                toastr.error('The operation failed!');
              }
            }
          });
        });
      });
    </script>
  </head>
  <body>
    <form id="form">
      <!-- Add form fields here -->
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
