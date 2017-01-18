function LmOver(elem){
  elem.style.background = 'url(../images/template/selector.gif) no-repeat';
}

function LmOut(elem, clr){
    elem.style.background = 'black';
}

function LmDown(elem, clr){
  elem.style.background = elem.style.background = 'url(../images/template/selector.gif) #222222 no-repeat';
}

function LmUp(path){
  location.href = path;
}

function LmUpB(path){
  var newWindow = window.open (path, 'foro');
}
