var listtodo = document.getElementById('list');
var item = document.getElementById('item');

document.getElementsByTagName('form')[0].addEventListener('submit', function (e) {
	
	e.preventDefault();

	if (item.value != '') {
		
		var newItem = document.createElement('li');

		newItem.innerHTML = item.value;
		
		listtodo.appendChild(newItem);
	}

	item.value = '';
	
}, false);

listtodo.addEventListener('click', function (e) {
	
	if (e.target.className == 'erased') {
		
		e.target.className = '';
		
	} else {
		
		e.target.className = 'erased';
	}
	
}, false);
