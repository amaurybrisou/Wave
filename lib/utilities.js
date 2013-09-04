hasClass = function(elem, cls) {

	return elem.className.match(new RegExp('(\\s|^)'+cls+'(\\s|$)'));
}
 
addClass = function(elem,cls) {
	if (!hasClass(elem, cls)){
		elem.className += " "+cls;	
	} 
}
 
removeClass = function(elem,cls) {
	if (hasClass(elem,cls)) {
		var reg = new RegExp('(\\s|^)'+cls+'(\\s|$)');
		elem.className = elem.className.replace(reg,' ');
	}
}

clearClass = function(elem){
	if(elem.className){
		elem.className = "";
	}
}

hide = function(elem){
	if(elem){
		addClass(elem, 'hide');
	}
}

unhide = function(elem){
	
	if(hasClass(elem, 'hide')){
		
		removeClass(elem, 'hide');
	}
}

prev = function(elem, s){
	var that = elem;

	if(hasClass(that.previousSibling, s)){
		return that.previousSibling;
	}

	that = that.previousSibling;
	return prev(that, s);
}

next = function(elem, s){
	var that = elem;
	
	if(hasClass(that.nextSibling, s)){
		return that.nextSibling;
	}
	
	that = that.nextSibling;
	return next(that, s);
}

function getHeight(elem) {
    
    var sOriginalOverflow = elem.style.overflow;
    var sOriginalHeight = elem.style.height;
    elem.style.overflow = "";
    elem.style.height = "";
    var height = elem.offsetHeight;
    elem.style.height = sOriginalHeight;
    elem.style.overflow = sOriginalOverflow;
    return height;
}

contains = function(elem, s){
	return (elem.indexOf(s));
}
function $(id) { return document.getElementById(id); }

function fadeIn(elem){
	if(elem === null){ return false};
	if(hasClass(elem,'fade-out')){
		removeClass(elem, 'fade-out');
		addClass(elem, 'fade-in');	
		return true;
	}
	return false;
}

function fadeOut(elem, timeout){
	if(elem === null){ return false};
	if(hasClass(elem,'fade-in')){
		removeClass(elem, 'fade-in');
		addClass(elem, 'fade-out');	
		return true;
	}
	return false;
}

function sizeIn(elem, timeout){
	if(elem === null){ return false};
	if(hasClass(elem, 'size-down')){
		(function(target, timeout){
			setTimeout(function(){
				removeClass(target, 'size-down');
				addClass(target, 'size-up');	
			}, timeout);
		}(elem, timeout || 0));
		return true;
	}
	return false;
}

function sizeDown(elem, timeout){
	if(elem === null){ return false};
	if(hasClass(elem, 'size-up')){
		(function(target, timeout){
			setTimeout(function(){
				removeClass(target, 'size-up');
				addClass(target, 'size-down');	
			}, timeout);
		}(elem, timeout || 0));
		return true;
	}
	return false;
}

function selectIn(elem){
	if(elem === null){ return false};
	if(hasClass(elem,'not-selected')){
		
			
				removeClass(elem, 'not-selected');
				addClass(elem, 'selected');	
			
		return true;
	}
	return false;
}

function selectOut(elem){
	if(elem === null){ return false};
	if(hasClass(elem, 'selected')){
		
				removeClass(elem, 'selected');
				addClass(elem, 'not-selected');	

		return true;
	}
	return false;
}

function getContext(){
	return (function(callback){
		console.log("label "+document.getElementById('labels'));
		$("labels").setAttribute("width", (window.innerWidth)+'px');
		$("labels").setAttribute("height", (window.innerHeight) +'px');
		return callback();
	}(function(){
		return $("labels").getContext("2d");
	}));
}

//if(!document.getElementsByClassName){


    	

    function getElementsByClassName(searchClass,node,tag) {
        var classElements = new Array();
        if ( node == null )
            node = document;
        if ( tag == null )
            tag = '*';
        var els = node.getElementsByTagName(tag);
        var elsLen = els.length;
        var pattern = new RegExp("(^|\\s)"+searchClass+"(\\s|$)");
        for (i = 0, j = 0; i < elsLen; i++) {
            if ( pattern.test(els[i].className) ) {
                classElements[j] = els[i];
                j++;
            }
        }
        return classElements;
    }




//}

var getPage = function(t){
	var xhr = new XMLHttpRequest(), ret = "";
	xhr.open('GET', t, false);
	xhr.onreadystatechange= function() {
	    if (this.readyState!==4) return;
	    if (this.status!==200) return; // or whatever error handling you want
	    ret = this.responseText;
	};
	xhr.send();
	return ret;
	
}
