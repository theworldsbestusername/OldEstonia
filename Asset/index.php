<?php
error_reporting(0);
$assetid = (int)$_GET["id"];
$extensions = [".txt", ".png", ".jpg", ".xml", ".mesh", ".wav", ".mp3", ".lua", ".mod", ".umx", ".it"];
foreach ($extensions as $extension) {
	$file = "files/" . $assetid . $extension;
	if (file_exists($file)) {
		header("Content-Type: application/octet-stream");
		readfile($file);
	}
}
?>