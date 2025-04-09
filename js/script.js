$(document).ready(function () {
  
  $(".viewListing").on("click", function () {
    var listingId = $(this).data("id");
    
    


    $.ajax({
      method: "GET",
      url: "src/ajax.php",
      data: {
        id: listingId
      }
  }).done(function (data) {  

    const json = JSON.parse(data); 
    var listing = json[0];
    


    $("#modal-title").html(listing.name);
    $("#modal-image img").attr("src", listing.pictureUrl).attr("alt", listing.name);
    $("modal-neighborhood").text(listing.neighborhood); 
    $(".modal-footer p:eq(1)").text("$" + listing.price + " / night");
    $(".modal-footer p:eq(2)").text("Accommodates " + listing.accommodates);
    $(".modal-footer p:eq(3)").html('<i class="bi bi-star-fill"></i> ' + listing.rating);
    $(".modal-footer p:eq(4)").text("Hosted by " + listing.hostName);
    $(".modal-footer p:eq(5)").text("amenities: " + listing.amenity);
    });
  });
});

