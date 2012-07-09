var page = new Array();
page[1] = 'home.html';
page[2] = 'teams.html';
page[3] = 'schedule.html';
page[4] = 'rank.html';

$('.tabs').load(page[1]);

function loadTab(id) {
	if (page[id].length > 0) {
		
  $.ajax(
  {
	  url: page[id], 
	  cache: true,
	  success: function() 
	  {			            	
		  $('.tabs').load(page[id]);
	  }
  });		
}
}

$(document).ready(function(){

  $('#page-1').click(function(ev)
{
	ev.preventDefault();
	$('li').removeClass('current');
	$('#page-1').addClass('current');
	loadTab(1);
});

  $('#page-2').click(function(ev)
{
	ev.preventDefault();
	$('li').removeClass('current');
	$('#page-2').addClass('current');
	loadTab(2);
});
  
  $('#page-3').click(function(ev)
{
	ev.preventDefault();
	$('li').removeClass('current');
	$('#page-3').addClass('current');
	loadTab(3);
});
  
  $('#page-4').click(function(ev)
{
	ev.preventDefault();
	$('li').removeClass('current');
	$('#page-4').addClass('current');
	loadTab(4);
  });
});
					