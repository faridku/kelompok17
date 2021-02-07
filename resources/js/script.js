let btnAdd = document.querySelector('#likebtn');
let btnSubtract = document.querySelector('#dislikebtn');
let input = document.querySelector('input');

btnAdd.addEventListener('click', () ->{
	input.value = parseInt(input.value) + 1;
});

btnSubtract.addEventListener('click', () ->{
	input.value = parseInt(input.value) + 1;
});