<?php
$uploadDir = '/srv/http/GentooPage/img/img/';
if(isset($_POST['upload']))
{$fileName = $_FILES['userfile']['name'];
$tmpName = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$filePath = $uploadDir . $fileName;
$result = move_uploaded_file($tmpName, $filePath);
echo $tmpName.$fileSize.$fileName;
if (!$result) {echo "Error uploading file";
    exit;}
}
?>
