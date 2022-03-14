<html>
<head>
<style>
 body{
	font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

.hide {
    max-height: 0 !important;
}

.dropdown{
	border: 0.1em solid black;
	width: 10em;
	margin-bottom: 1em;
}

.dropdown .title{
	margin: .3em .3em .3em .3em;	
	width: 100%;
}


.dropdown .menu{
	transition: max-height 2s ease-out;
	max-height: 20em;
	overflow: hidden;
}

.dropdown .menu .option{
	margin: .3em .3em .3em .3em;
	margin-top: 0.3em;
}

.dropdown .menu .option:hover{
	background: rgba(0,0,0,0.2);
}

.pointerCursor:hover{
	cursor: pointer;
}

</style>
</head>
	<div class='dropdown'>
		<div class='title pointerCursor'>Select an option <i class="fas fa-bars"></i></div>
		
		<div class='menu pointerCursor hide'>
			<div class='option' id='option1'>Option 1</div>
			<div class='option' id='option2'>Option 2</div>
			<div class='option' id='option3'>Option 3</div>
			<div class='option' id='option4'>Option 4</div>
		</div>

	</div>

	<span id='result'>The result is: </span>

    <script>
function toggleClass(elem,className){
  if (elem.className.indexOf(className) !== -1){
    elem.className = elem.className.replace(className,'');
  }
  else{
    elem.className = elem.className.replace(/\s+/g,' ') + 	' ' + className;
  }

  return elem;
}



function toggleMenuDisplay(e){
  const dropdown = e.currentTarget.parentNode;
  const menu = dropdown.querySelector('.menu');

  toggleClass(menu,'hide');

}



const dropdownTitle = document.querySelector('.dropdown .title');


dropdownTitle.addEventListener('click', toggleMenuDisplay);




</script>

<html>
   





