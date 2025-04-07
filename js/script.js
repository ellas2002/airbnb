$(document).ready(function () {
  $(".viewListing").click(function () {
    var id=$(this).attr("id");


    $.ajax({
      method: "GET",
      url: "src/ajax.php",
      data: {
        id: id
      }
  }).done(function (data) {  

        const json = JSON.parse(data);  // Try to parse it as JSON

        picture = json[0].pictureUrl;
        
        var html = "<img src='" + json[0].pictureUrl + " 'class='img-fluid >";
        var nameHtml = "<p>"+json[0].name+"</p>";
        "<p>"+name+"</p><img src='"+pictureUrl+"'>";

        $("#modal-image").html(picture);
        $("#modal-title").text(nameHtml);

          
    });
  });
});



