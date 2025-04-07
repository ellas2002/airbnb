
$(document).ready(function () {
  $(".viewListing").click(function () {
    var hood=$(this).data("hood");
    var room=$(this).data("room");
    var guestNum=$(this).data("guestNum");

    $.ajax({
      method: "GET",
      url: "src/ajax.php",
      data: {
          hood: hood,
          room: room,
          guestNum: guestNum
      }
  }).done(function (data) {
      console.log("Raw data:", data);  // Log raw data to check what's returned
  
      try {
          const json = JSON.parse(data);  // Try to parse it as JSON
          console.log("Parsed JSON:", json);
          
          var html = "<img src='" + json.pictureUrl + "'>";
          var nameHtml = "<h5>" + json.name + "</h5>";
  
          $("#modal-image").html(html);
          $("#modal-title").text(nameHtml);
      } catch (e) {
          console.error("Error parsing JSON:", e);  // Log parsing errors
      }
  });
  });
});



