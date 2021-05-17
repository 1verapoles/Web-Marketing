$(document).ready(function () {
var $card = $('.cards').isotope({
  itemSelector: '.card',
  getSortData: {
      price: function( itemElem ) { 
      return parseInt( $( itemElem ).find('.price').text() );
    },
    year: function( itemElem ) { 
      return parseInt( $( itemElem ).find('.year').text() );
    }
  }
   
});

$('.s').on('click', function() {
  var conc = $('.a:checked').attr('data-name') + $('.b:checked').attr('data-name');
  $card.isotope({ filter: conc });
});

$('#sort').on('change', function() {
   var e = $('option:selected').attr('data-name');
   console.log(e);
   $card.isotope({ sortBy : e });
});

});

