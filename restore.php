<?php
	if(isset($_REQUEST['path'])==true){
		$path=$_REQUEST['path'];
		$modPath = str_replace("/","_",$path);
		$fsrc=fopen("restorehub/$modPath","r");
		$fdest=fopen($path,"w");
		$str = fread($fsrc,filesize("restorehub/$modPath"));
		fwrite($fdest,$str);
		fclose($fsrc);
		fclose($fdest);
	}
?>
