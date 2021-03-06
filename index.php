<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr,en,es" lang="fr,en,es"/>
<head>
	<link rel="shortcut icon" href="img/favicon.png" />
	<meta charset="UTF-8" />
	<meta name="robots" content="index,follow"/>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Language" content="fr,en,sp" />

	<meta name="description" content="Curriculum de Amaury Brisou, Java/Map Reduce Programador/Administrator." />
	<meta name="keywords" content="Resume,CV,Curriculum vitae,Programmeur,Programador,Coder,Developer,Java,Hadoop,HDFS,Map/Reduce,MRv2,MR,Javascript,HTML5,CSS3,Python,Amaury Brisou" />

	<title>Amaury Brisou - Curriculum vitae</title>

	<script type="text/javascript" src="lib/execute_script.js"></script>
	<script type="text/javascript" src="lib/utilities.js"></script>
	<script type="text/javascript">
		if (navigator.browserLanguage || navigator.language)
			var lang = navigator.browserLanguage || navigator.language || "en-US";
	</script>
	
	<link rel='stylesheet' type="text/css" href="css/main.css">


</head>
<body>
		<div id="export" style="hidden"></div>
		<div id="photo_info" ></div>
		<div id="links" class="fade-out">
			<a class="pin" href='http://www.linkedin.com/pub/amaury-brisou/7a/22a/445' target="_blank" ><img class='pin' src='img/linkedin.png'/></a>
			<a id="cv" class="pin" href='export/cv-amaury-brisou-fr.pdf' target="_blank" ><img id="cv_pdf" class="pin" src="img/cv.png"/></a>
		</div>
		<div id="language" class="fade-out">
			<img id="fr-FR" class="flag" src='img/fr-flag.png' />
			<img id="en-US" class="flag" src='img/en-flag.png' />
			<img id="es-ES" class="flag" src='img/sp-flag.png' />
		</div>
		
		
		<img usemap="#img_map" id="img_back" class="click" src="img/seignosse.jpg" />
		<div id="labels" >
			<div class="label area fade-out click" id="who" filename="who"></div>
			<div class="label area fade-out click" id="contact" filename="contact"></div>
			<div class="label area fade-out click" id="github" filename="github"></div>
			<div class="label area fade-out click" id="blog" filename="blog"></div>
			<div class="label area fade-out click" id="artwork" filename="artwork"></div>
		</div>
		<div id="main_modal" class="fade-out size-down close">
			<div id="modal_content" class="fade-out size-down">
				<div id="close" class="close" onmousedown="javascript:CloseModal;"></div>
				<div id="info_left" class='fade-out size-down'></div>
				
				<div id="info_right" class='not-selected fade-out'>
					<div id='table_entry_info' ></div>
				</div>

				<div id="modal_labels">
					<div class="modal_label click" id="modal_who" filename="who"></div>
					<div class="modal_label click" id="modal_contact" filename="contact"></div>
					<div class="modal_label click" id="modal_github" filename="github"></div>
					<div class="modal_label click" id="modal_blog" filename="blog"></div>
					<div class="modal_label click" id="modal_artwork" filename="artwork"></div>
				</div>

			</div>
		</div>




	<script type="text/javascript">


		<!--//--><![CDATA[//><!--


			var re = new RegExp("^(en|fr|es)-[A-Z]{2}$");

			var images =  [
					{
						 
						title: 'who', 
						file: new Image().src  = 'img/wave.png', 
						coords : [{x:0,y:860, _x:585, _y:1100},
								{x:650,y:860, _x:2500, _y:1100}]
					}, //levre
					{
						
						title: 'blog', 
						file: new Image().src  = 'img/poto_droite.png', 
						coords : [{x:2100, y:1303, _x:2717, _y:1923}]
					}, //poto droite
					{
						
						title: 'artwork', 
						file: new Image().src  = 'img/poto_gauche.png', 
						coords :[{x:586, y:0, _x:642, _y:(1920)}]
					}, //poto left
					{
						
						title: 'github', 
						file: new Image().src  = 'img/poto_centre.png', 
						coords : [{x:1330, y:1038, _x:(1365), _y:(1038 + 882)}]
					},//poto centre
					{

						title: 'contact', 
						file: new Image().src  = 'img/mouette.png', 
						coords : [{x:1390, y:1630, _x:1450, _y:1680}]
					}
				]; //mouette
			var label_timeout = 5000;
			var attach = document.body;
		
		//--><!]]>

		window.onload = function(){
			//avoid image dragging
			document.body.ondragstart = function() { return false; };

			init_map();
			init_events();
			init_language();
			init_labels();

			document.onmousemove = onMouseMove;
			$('main_modal').onmousedown = $('main_modal').click = CloseModal;
		}


		function init_language(){
  			if (lang.match(re)) {
				lang_content = JSON.parse(getPage('lang/'+lang.substring(0,2)+'.json'));

				$('cv').href = "export/cv-amaury-brisou-"+lang+".pdf";
			}

		}

		function init_labels(){

			var entry, attach, img_attach;

			$('photo_info').innerHTML = lang_content.photo;

			for(var i = 0; i < lang_content.labels.length; i++){
				entry = lang_content.labels[i];
				
				attach = $(entry.id);
				
				img_attach = getElementsByClassName(entry.id, $('img_map'), 'area');
				if(attach){
					attach.innerHTML = entry['value'];
				}

				attach = $('modal_'+entry.id);
				if(attach){
					attach.innerHTML = entry["value"];
				}
				if(img_attach){
					for(var j = 0; j < img_attach.length; j++){
						img_attach[j].title = entry['value'];
					}
				}
			}
		
		}
		
		
		

		function init_map(){
			document.body.innerHTML += '<map id="img_map" name="img_map" >';
			
			var map = $("img_map");
			var h = (window.innerHeight / 1920);
			var w = (window.innerWidth / 2560);

			for( var i = 0; i < images.length; i++){
				map.innerHTML += "<img id='img_"+images[i].title+"' src='"+images[i].file+"' class='img fade-out' />";
				
				for(var j = 0; j < images[i].coords.length; j++){
					coords = images[i].coords[j];
					
					map.innerHTML += '<area id="img_'+i+'_'+j+'" shape="rect" class="area click '+images[i].title+'" title="'+images[i].title+'" filename="'+images[i].title+'" coords="'+
						Number(coords.x * w).toFixed(2)+','+
						Number(coords.y * h).toFixed(2)+','+
						Number(coords._x * w).toFixed(2)+','+
						Number(coords._y * h).toFixed(2)+'" />';
				}
			}
			document.body.innerHTML += ' </map> ';
		}


		function init_events(){
			var areas = getElementsByClassName('area', document.body);
			
			
			var area;
			for(var i = 0; i < areas.length; i++){

				area = areas[i];
				

				area.onmouseover = area.onmousenter = onMouseOver;
				area.onmouseout = area.onmouseleave = onMouseOut;
			}

			var clicks = getElementsByClassName('click', document.body);
			
			var click;
			for(var i = 0; i < clicks.length; i++){

				click = clicks[i];
				
				click.onmousedown = onMouseClick;

			}

			
			var target = $('language');
			if(target){
				target.onMouseMove = onMouseMove;
				target.onmousedown = ChangeLanguage;
			}

			/*target = $('cv_pdf');
			target.onmousedown = exportToPdf;*/
		}

		function onMouseOver(e){

			if (e == null) e = window.event;
			var target = e.target != null ? e.target : e.srcElement;
			var img;
			
			if(hasClass(target, 'area')){
				img = $('img_'+target.getAttribute('filename'));
			} else {
				img = prev(target,'img');
			}

			fadeIn(img);
		}

		var old_over_title;
		function onMouseOut(m_e){

			if (m_e == null) m_e = window.event;
			var target = m_e.target != null ? m_e.target : m_e.srcElement;
			var img;

			if(hasClass(target, 'area')){
				img = $('img_'+target.getAttribute('filename'));
			} else {
				img = prev(target,'img');
			}

			fadeOut(img, 0);
		}




		function ChangeLanguage(e){
			if (e == null) e = window.event;
			var target = e.target != null ? e.target : e.srcElement;

			if(target.getAttribute('id') === "language") return;

			lang = target.getAttribute('id');

			init_language();
			init_labels();
		}

		window.onresize = function(){
			var h = (window.innerHeight / 1920);
			var w = (window.innerWidth / 2560);
			var coords, img;
			for( var i = 0; i < images.length; i++){
				for(var j = 0; j < images[i].coords.length; j++){
					img = $('img_'+i+'_'+j);
					coords = images[i].coords[j];
					
					img.coords = Number((coords.x * w).toFixed(2))+','+
						Number((coords.y * h).toFixed(2))+','+
						Number((coords._x * w).toFixed(2))+','+
						Number((coords._y * h).toFixed(2));
				}
			}

			//Labels(1);
		}

		var timeout = null;
		function onMouseMove(e){

			var labels = getElementsByClassName('fade-out', $('labels'));
			labels.push($('language'));
			labels.push($('links'));

			var label;
			for(var i = 0; i < labels.length; i++){
				label = labels[i];
				if(hasClass(label, 'fade-out')){
					removeClass(label, 'fade-out');
					addClass(label, 'fade-in');
					
					(function(elem){
						setTimeout(function(){
							if(hasClass(elem, 'fade-in')){
								removeClass(elem, 'fade-in');
								addClass(elem, 'fade-out');	
								return true;
							}
						}, label_timeout);
					}(label));	

				} else {
					clearTimeout(label);
				}

			}
		}
		

		function CloseModal(e){

			if (e == null) e = window.event;
			var target = e.target != null ? e.target : e.srcElement;

			if(hasClass(target, 'close')){
				
				target = $('info_right');
				fadeOut(target);
				sizeDown(target);

				target = $('info_left');
				fadeOut(target);
				sizeDown(target);

				target = $('main_modal');
				fadeOut(target);
				sizeDown(target);
				
				target = $('modal_content');
				fadeOut(target);
				sizeDown(target);

				
				setTimeout(function(){
					target.removeAttribute("style");
				}, 750);

				$('table_entry_info').removeAttribute("style");

				unhide(getElementsByClassName('hide', $('modal_labels') , 'div')[0]);
			};
		}

		function onMouseClick(e){
			if (e == null) e = window.event;
			var target = e.target != null ? e.target : e.srcElement;
			
			if(hasClass(target, 'click') && target.id !== "img_back"){

				if(target.getAttribute('filename') === "github"){
					window.open("https://github.com/amaurybrisou", "_blank", '', false);
					return;
				}
				if(target.getAttribute('filename') === "blog"){
					window.open("http://puzzledge.eu", "_blank", '', false);
					return;
				}
				
				if(hasClass(target, 'modal_label')){
					$('table_entry_info').removeAttribute("style");
					$('modal_content').removeAttribute("style");
					unhide(getElementsByClassName('hide', $('modal_labels') , 'div')[0]);
					var t = $('info_left');
					fadeOut(t);
					sizeDown(t);
				}

				hide($('modal_'+target.getAttribute("filename")));

				var info_left = $("info_left");

				(function(callback){
					var ret = getPage('views/'+target.getAttribute('filename')+'.html');
					callback(ret);
				}(function(data){
					info_left.innerHTML = data;
					
					exec_body_scripts(info_left);
					show($('main_modal'));

				}));


			}
		}

		function show(main_modal){
			fadeIn(main_modal);
			sizeIn(main_modal);
			var modal_content = $('modal_content');
			fadeIn(modal_content);
			sizeIn(modal_content);	
			var info_right = $('info_right');
			fadeIn(info_right);
			sizeIn(info_right);
		}

		
		function exportToPdf(){
			
 			$('export').innerHTML = getPage('views/export.html');
 			
 			exec_body_scripts($('export'));
		}
		
		onMouseMove;
		</script>
	
</body>
</html>