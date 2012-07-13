$(document).ready(function () {
	
	var nameAvailable = $('.name-available');
	var emailAvailable = $('.email-available');
	var passReq = 0;
	
	$('#username').on('change', function (ev) {
		var username = $(this).val();
		nameAvailable.attr('data-status', 'unchecked');
		
		if (username.length >= 3 && username.length <= 20) {
			var ajax = $.post('username-validation.php', {
				'username' : username
			});
			
			ajax.done(function (data) {
				if (data == 'available') {
				nameAvailable.attr('data-status', 'available').html('Available');
				}
				else {
				nameAvailable.attr('data-status', 'unavailable').html('Unavailable');
				}
			});
		}
		else {
			nameAvailable.attr('data-status', 'invalid').html('Invalid');
		}
	});
	
	$('#password').on('keyup', function (ev) {
		var password = $(this).val();
		passReq = 0;
		
		if (password.length > 5) {
			passReq++;
			$('#pwLength').attr('data-state', 'achieved');
		}
		
		if (password.match(/[a-z]/)) {
			passReq++;
			$('#pwLowercase').attr('data-state', 'achieved');
		}
		
		if (password.match(/[A-Z]/)) {
			passReq++;
			$('#pwUppercase').attr('data-state', 'achieved');
		}
		
		if (password.match(/\d/)) {
			passReq++;
			$('#pwNumber').attr('data-state', 'achieved');
		}
		
		if (password.match(/[^a-zA-Z0-9]/)) {
			passReq++;
			$('#pwSpecial').attr('data-state', 'achieved');
		}
	});
	
	$('#email').on('change', function (ev) {
		var email = $(this).val();
		emailAvailable.attr('data-status', 'unchecked');
		var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		
		if (email.length >= 5 && email.length <= 40 && filter.test(email)) {
			var ajax = $.post('email-validation.php', {
				'email' : email
			});
			
			ajax.done(function (data) {
				if (data == 'available') {
					emailAvailable.attr('data-status', 'available').html('Available');
				}
				else {
					emailAvailable.attr('data-status', 'unavailable').html('Unavailable');
				}
			});
		}
		else {
			emailAvailable.attr('data-status', 'invalid').html('Invalid');
		}
	});
	
	var cityCheck = false;
	$('#city').on('keyup', function (ev) {
		var city = $(this).val();
		
		if (city.match(/[a-zA-z]/)) {
			$('.city-check').attr('data-status', 'right');
			cityCheck = true;
		}
		if (city.match(/[0-9]/)){
			$('.city-check').attr('data-status', 'wrong');
			cityCheck = false;
		}
		if (city.match(/[^a-zA-z0-9]/)){
			$('.city-check').attr('data-status', 'wrong');
			cityCheck = false;
		}
	});
	
	$('#countryCanada').on('click', function() {
		$('#countryInfo').load('canada.html');
	});
	
	$('#countryUsa').on('click', function() {
		$('#countryInfo').load('usa.html');
	});
	
	$('#countryInfo').on('change', '#zip', function () {
		var zipCheck;
		
		if ($('[name="country"]:checked').val() == 'ca') {
			zipCheck = /^[a-zA-Z]\d[a-zA-Z]\s\d[a-zA-Z]\d$/;
		}
		
		if ($('[name="country"]:checked').val() == 'us') {
			zipCheck = /^\d\d\d\d\d(-\d\d\d\d)?$/;
		}
		
		if ($(this).val().match(zipCheck)) {
			$('.zip-correct').attr('data-status', 'valid').html('Valid');
		}
		else {
			$('.zip-correct').attr('data-status', 'invalid').html('Invalid');
		}
	});
	
	$('form').on('submit', function (ev) {
		if (
			nameAvailable.attr('data-status') == 'unchecked'
			|| nameAvailable.attr('data-status') == 'unavailable'
			|| nameAvailable.attr('data-status') == 'invalid'
			|| passReq < 5
			|| emailAvailable.attr('data-status') == 'unchecked'
			|| emailAvailable.attr('data-status') == 'unavailable'
			|| cityCheck == false
			|| $('.zip-correct').attr('data-status') == 'invalid'
			)
			{
				ev.preventDefault();
			}
		});
});