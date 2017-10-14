<?php
$fileName = $_FILES["movie_full"]["name"];
$fileTmpLoc = $_FILES["movie_full"]["tmp_name"];
$fileType = $_FILES["movie_full"]["type"];
$fileSize = $_FILES["movie_full"]["size"];
$fileErrorMsg = $_FILES["movie_full"]["error"];
$fileName = uniqid().$fileName;
if(!$fileTmpLoc){
    echo "ERROR: Please choose a file before clicking the upload button";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "../../../movie/full/$fileName")){
    echo "<span style='color: green;'>Upload is completed</span>";
    echo "<input type=\"text\"  value=\"$fileName \" id=\"full_name\" name=\"full_name\" hidden>";

}else{
    echo "move failed";
}
?>