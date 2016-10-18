<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
//$targetFolder = '/Public/Upload/uploadify'; // Relative to the root

$targetFolder = $_POST['upload_path'];

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	
	$fileTypes = array(
            'rar',
            'zip',
    		'jpg',
    		'png',
    		'jpeg',
    		'gif',
    		'swf',
    		'mp3',
	        'mp4',
    		'pdf',
			'doc',
			'docx',
			'xls',
	    
    	    'RAR',
    	    'ZIP',
    	    'JPG',
    	    'PNG',
    	    'JPEG',
    	    'GIF',
    	    'SWF',
    	    'MP3',
	        'MP4',
    	    'PDF',
			'DOC',
			'DOCX',
			'XLSX',
	       
    );
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	$name = date('mdHis') . rand(100, 999) . '.' . $fileParts['extension'];
	$targetFile = rtrim($targetPath, '/') . '/' . $name;
	
    if (in_array($fileParts['extension'], $fileTypes)) {
        move_uploaded_file($tempFile, $targetFile);
        echo $name; // 上传成功
    } else {
        echo 2;     // 上传失败
    }
}
?>