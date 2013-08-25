<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	echo var_dump($_POST);
	if ( isset($_POST['content']) && isset($_POST['filename']) ){

	   //This is what you want - HTML content from tinyMCE
	   //just treat this a string
	   if ( save_html_to_file($_POST['content'], 'save/'.$_POST['filename'].'.html') ){
	     //Print 1 and exit script
	     die(1);
	   } else {
	      die('Couldnt write to stream');
	   }
	}
	/**
	 * 
	 * @param string $content HTML content from TinyMCE editor
	 * @param string $path File you want to write into
	 * @return boolean TRUE on success
	 */
	function save_html_to_file($content, $path){
		return (bool) file_put_contents($path, $content);
	}


	
?>
</body>
</html>
		