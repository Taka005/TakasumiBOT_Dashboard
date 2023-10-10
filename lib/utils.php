<?php
function animate($image){
	$ext = substr($image,0,2);
	if($ext == "a_"){
		return ".gif";
	}else{
		return ".png";
	}
}
?>