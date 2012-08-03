<?php 
session_start();
$max_filesize = 2097152; // Maximum filesize in BYTES.
$allowed_filetypes = array('.pdf', '.txt', '.ps', '.rtf', '.epub', '.odt', '.odp', '.ods', '.odg', '.odf', '.sxw', '.sxc', '.sxi', '.sxd', '.doc', '.ppt', '.pps', '.xls', '.docx', '.pptx', '.ppsx', '.xlsx', '.tif', '.tiff'); // These will be the types of file that will pass the validation.
$filename = $_FILES['userfile']['name']; // Get the name of the file (including file extension).


$_SESSION['filename'] = $filename;
$GLOBALS['filename'] = $filename;

$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
$file_strip = str_replace(" ","_",$filename); //Strip out spaces in filename
$upload_path = '../../uploads/docs/'; //Set upload path

//preview image setup
$prevpath = $upload_path.'preview/'; 
//$coverImage = basename($filename,$ext).".jpg";
$coverImage = addslashes(time()."_".basename($filename,$ext).".jpg");
$coverImage = str_replace(" ","_",$coverImage);

// Check if the filetype is allowed, if not DIE and inform the user.
if(!in_array($ext,$allowed_filetypes)) {
	die('<div class="error">The file you attempted to upload is not allowed.</div>');
}
// Now check the filesize, if it is too large then DIE and inform the user.
if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize) {
	die('<div class="error">The file you attempted to upload is too large.</div>');
}
// Check if we can upload to the specified path, if not DIE and inform the user.
if(!is_writable($upload_path)) {
	die('<div class="error">You cannot upload to the /uploads/ folder. The permissions must be changed.</div>');
}
// Move the file if eveything checks out.
if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $file_strip)) {
	echo '<div class="success"><input type="text" name="doc" id="doc" value="'.$file_strip.'" readonly></div>'; // It worked.
	
	//create cover image for supported file types
	
	exec("convert ".$upload_path.$file_strip."[0] ".$prevpath.$coverImage);
	echo '<div class="success"><input type="hidden" name="coverimage" id="coverimage" value="'.$coverImage.'" readonly></div>'; // It worked.
	
	
} else {
	echo '<div class="error">'. $file_strip .' was not uploaded.  Please try again.</div>'; // It failed :(.
}
?>
