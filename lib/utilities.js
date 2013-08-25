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

prev = function(elem, s){
	var that = elem;

	if(hasClass(that.previousSibling, s)){
		return that.previousSibling;
	}

	that = that.previousSibling;
	return prev(that, s);
}

function clearContext(ctx, preserveTransform) {
	if (preserveTransform) {
	  ctx.save();
	  ctx.setTransform(1, 0, 0, 1, 0, 0);
	}

	ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);

	if (preserveTransform) {
	  ctx.restore();
	}           
};

contains = function(elem, s){
	return (elem.indexOf(s));
}
function $(id) { return document.getElementById(id); }

function fadeIn(elem, timeout){
	if(elem === null){ return false};
	if(hasClass(elem,'fade-out')){
		(function(target, timeout){
			setTimeout(function(){
				removeClass(target, 'fade-out');
				addClass(target, 'fade-in');	
			}, timeout);
		}(elem, timeout || 0));
		return true;
	}
	return false;
}

function fadeOut(elem, timeout){
	if(elem === null){ return false};
	if(hasClass(elem,'fade-in')){
		(function(target, timeout){
			setTimeout(function(){
				removeClass(target, 'fade-in');
				addClass(target, 'fade-out');	
			}, timeout);
		}(elem, timeout || 0));
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

function selectIn(elem, timeout){
	if(elem === null){ return false};
	if(hasClass(elem,'not-selected')){
		(function(target, timeout){
			setTimeout(function(){
				removeClass(target, 'not-selected');
				addClass(target, 'selected');	
			}, timeout);
		}(elem, timeout || 0));
		return true;
	}
	return false;
}

function selectOut(elem, timeout){
	if(elem === null){ return false};
	if(hasClass(elem, 'selected')){
		(function(target, timeout){
			setTimeout(function(){
				removeClass(target, 'selected');
				addClass(target, 'not-selected');	
			}, timeout);
		}(elem, timeout || 0));
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