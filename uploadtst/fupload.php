<?php
$file = $_FILES['uploadfile'];
$filename = $_FILES['uploadfile']['name'];
//print_r($file);
$path = 'uploads/';  // Get the path to upload
$prevpath = $path.'preview/'; // Get the path to the preview folder
$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
$prevfile = $prevpath.basename($filename,$ext).".jpg"; 

if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $path.$filename)){
    
    echo "original file uploaded to ".$path.$filename."<br />";
    echo $ext;
    if (exec("convert ".$path.$filename."[0] ".$prevfile)){
        echo "preview uploaded to ".$prevpath.$filename;
    }
}

