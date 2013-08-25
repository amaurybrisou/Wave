<?php
	$dir = "../views/artwork";
	$dh  = opendir($dir);
	
	while (false !== ($filename = readdir($dh))) {
		if($filename[0] == ".") continue;
	    $files[] =  file_get_contents('../views/artwork/'.$filename);
	}
	header('Content-type: application/json');
	echo json_encode($files);
	
?>