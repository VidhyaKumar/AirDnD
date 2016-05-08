$(function(){
// start of javascript
  $('#searchForm').submit(function(event) {
    event.preventDefault();
    var formData = $(this).serializeArray();
    $('#preloader').removeClass('hidden');
    $.get('/properties/search', formData, function(data) {
      if (data.length === 0) {
        $('#resultsTableContainer').addClass('hidden');
        $('#errorMessage').removeClass('hidden').removeAttr("style").delay(5000).fadeOut('slow');
        $('#preloader').addClass('hidden');
      } else {
        $('#resultsTable tbody').empty();
        $.each(data, function(index, obj) {
          $('#resultsTable tbody').append(
            "<tr>" +
            "<td>" + obj.name + "</td>" +
            "<td>" + obj.bedrooms + "</td>" +
            "<td>" + obj.bathrooms + "</td>" +
            "<td>" + obj.garages + "</td>" +
            "<td>" + obj.storeys + "</td>" +
            "<td>" + accounting.formatMoney(obj.price) + "</td>" +
            "</tr>"
          );
        });
        $('#errorMessage').addClass('hidden');
        $('#resultsTableContainer').removeClass('hidden');
        $('#preloader').addClass('hidden');
      }
    }, 'json');
  });
// end of javascript
});
