jQuery(function ($) {
var $circle = $('#circle')
, $property = $('#property')
, $color = $('#color')
;

$('form').on('submit', function (e) {
var color = $color.val();

e.preventDefault();

if (color) {
  $circle.css($property.val(), color);
}
});

$('#hide-show').on('click', function (e) {
$circle.toggle(800);
});
});
