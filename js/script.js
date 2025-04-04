
$(document).ready(function() {
    // Attach a click handler to the View button
    $('.view-button').click(function() {
      // Perform the AJAX request
      $.ajax({
        url: 'src/ajax.php', // The URL of your PHP script
        type: 'GET', // Or POST, depending on your PHP script
        success: function(response) {
          // Handle the successful response from ajax.php
          console.log('Success:', response);
          // Update the page with the response, if needed
          // $('#someDiv').html(response);
        },
        error: function(xhr, status, error) {
          // Handle any errors
          console.error('Error:', status, error);
        }
      });
    });
  });