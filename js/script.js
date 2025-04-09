$(document).ready(function () {
  
  $(".viewListing").on("click", function () {
    var listingId = $(this).data("id");
    alert(listingId);
    
    


    $.ajax({
      method: "GET",
      url: "src/ajax.php",
      data: {
        id: listingId
      }
  }).done(function (data) {  
    alert(data);

    const json = JSON.parse(data);  // Try to parse it as JSON
    console.log("Parsed JSON: ", json);  // Log the parsed JSON object    
    var listing = json[0];
    


    $("#modal-title").html(listing.name);
    $("#modal-image img").attr("src", listing.pictureUrl).attr("alt", listing.name);
    
    // Update footer information with data from the card
    $("modal-neighborhood").text(listing.neighborhood); // Neighborhood
    $(".modal-footer p:eq(1)").text("$" + listing.price + " / night");
    $(".modal-footer p:eq(2)").text("Accommodates " + listing.accommodates);
    $(".modal-footer p:eq(3)").html('<i class="bi bi-star-fill"></i> ' + listing.rating);
    $(".modal-footer p:eq(4)").text("Hosted by " + listing.hostName);
    $(".modal-footer p:eq(5)").text("amenities: " + listing.amenity);
          
    
          
    });
  });
});

