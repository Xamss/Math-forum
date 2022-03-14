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
    console.log(e.currentTarget.parentNode);
    console.log(dropdownTitle);
    const menu = dropdown.querySelector('.menu');
  
    toggleClass(menu,'hide');
  
  }

  const dropdownTitle = document.querySelector('.dropdown .title');
  
  dropdownTitle.addEventListener('click', toggleMenuDisplay);
  





var audioFile = new Array("first rule.m4a","second rule.m4a","third rule.m4a");
var audio = new Array;

    for (i=0; i<audioFile.length; i++) {
      audio[i]= new Audio("Audio/"+audioFile[i]);
      audio[i].load();
    }

audio[1].onended=function(){
  setTimeout(function(){
    audio[2].play()
  ;}, 1000);
};

audio[0].onended=function(){
  setTimeout(function(){
    audio[1].play()
  ;}, 1000);
};
    



  
  
  