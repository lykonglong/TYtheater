<?php
$fileName = $_FILES["movie_trailer"]["name"];
$fileTmpLoc = $_FILES["movie_trailer"]["tmp_name"];
$fileType = $_FILES["movie_trailer"]["type"];
$fileSize = $_FILES["movie_trailer"]["size"];
$fileErrorMsg = $_FILES["movie_trailer"]["error"];
$fileName = uniqid().$fileName;
if(!$fileTmpLoc){
    echo "ERROR: Please choose a file before clicking the upload button";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "../../../movie/trailer/$fileName")){
echo "<span style='color: green;'>Upload is completed</span>";
echo "<input type=\"text\"  value=\"$fileName \" id=\"trailer_name\" name=\"trailer_name\" hidden>";

}else{
    echo "move failed";
}
?>