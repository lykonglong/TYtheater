<?php

function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}

function getCategory(){
    global $connection;
    $select_category="SELECT * FROM categories";
    $run_select_category = mysqli_query($connection,$select_category);
    while($row_member = mysqli_fetch_assoc($run_select_category)) {
        $cate_id = $row_member['cate_id'];
        $cate_name = $row_member['cate_name'];
        echo "<option value=\"$cate_id\">$cate_name</option>";
    }
}

function countCategory(){
    global $connection;
    $select_category="SELECT * FROM categories";
    $run_select_category = mysqli_query($connection,$select_category);
    return $rowCount = mysqli_num_rows($run_select_category);
}
function countMovie(){
    global $connection;
    $select_movie="SELECT * FROM movies WHERE status=1";
    $run_select_movie = mysqli_query($connection,$select_movie);
    return $rowCount = mysqli_num_rows($run_select_movie);
}
function countTrash(){
    global $connection;
    $select_trash_movie="SELECT * FROM movies WHERE status=0";
    $run_select_trash_movie = mysqli_query($connection,$select_trash_movie);
    return $rowCount = mysqli_num_rows($run_select_trash_movie);
}
function countSlide(){
    global $connection;
    $select_slide="SELECT * FROM slider";
    $run_select_slide = mysqli_query($connection,$select_slide);
    return $rowCount = mysqli_num_rows($run_select_slide);
}

?>

