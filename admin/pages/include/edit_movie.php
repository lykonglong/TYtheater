<?php

if(isset($_GET['edit'])){
    $movie_edit_id=$_GET['edit'];
    $query="select * from movies WHERE movie_id = $movie_edit_id";
    $select_movie=mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_movie)) {
        $movie_id = $row['movie_id'];
        $user_id_db = $row['user_id'];
        $movie_cate_id = $row['movie_cate_id'];
        $movie_title = $row['movie_title'];
        $movie_image = $row['movie_image'];
        $movie_description = $row['movie_description'];
        $movie_date_db = $row['movie_date'];
        $movie_date = date("d-m-Y", strtotime($movie_date_db));

        $movie_tags = $row['movie_tags'];
        $movie_trailer = $row['movie_trailer'];
        $movie_full = $row['movie_full'];
        $movie_resolution = $row['movie_resolution'];
        $status = $row['status'];
        $date_added = $row['date_added'];

        $cate_query = "select * from categories where cate_id=$movie_cate_id";
        $select_category = mysqli_query($connection, $cate_query);
        while ($row = mysqli_fetch_assoc($select_category)) {
            $cate_name = $row['cate_name'];
        }
    }
}

if(isset($_POST['btnupdate'])){
    $new_movie_cate_id=mysqli_real_escape_string($connection,$_POST['movie_cate_id']);
    $new_movie_title=mysqli_real_escape_string($connection,$_POST['movie_title']);

    $new_movie_image=$_FILES['movie_image']['name'];
    $new_movie_image_temp=$_FILES['movie_image']['tmp_name'];
    move_uploaded_file($new_movie_image_temp,"../../movie/cover/".$new_movie_image);
    if($new_movie_image==""){
        $new_movie_image = $movie_image;
    }

    $new_movie_description=mysqli_real_escape_string($connection,mb_convert_encoding($_POST['dsc'],"UTF-8","auto") );

    $new_movie_date=mysqli_real_escape_string($connection,$_POST['movie_date']);
    $datesort= str_replace('/', '-', "$new_movie_date");
    $new_movie_date_insert= date('Y-m-d',strtotime($datesort));

    $new_movie_tags=mysqli_real_escape_string($connection,$_POST['movie_tags']);

    if(isset($_POST['trailer_name']))
    {
        unlink( "../../movie/trailer/$movie_trailer");
         $new_movie_trailer=mysqli_real_escape_string($connection,$_POST['trailer_name']);

    }else{

         $new_movie_trailer=mysqli_real_escape_string($connection,$_POST['trailer_old_name']);
    }

    if(isset($_POST['full_name']))
    {
        unlink( "../../movie/full/$movie_full");
         $new_movie_full=mysqli_real_escape_string($connection,$_POST['full_name']);
    }else{

         $new_movie_full=mysqli_real_escape_string($connection,$_POST['full_old_name']);
    }
    /*$new_movie_trailer=mysqli_real_escape_string($connection,$_POST['trailer_name']);
    $new_movie_full=mysqli_real_escape_string($connection,$_POST['full_name']);*/


    $new_movie_resolution=mysqli_real_escape_string($connection,$_POST['movie_resolution']);

    $update_query="UPDATE movies SET movie_cate_id=$new_movie_cate_id, movie_title='$new_movie_title',movie_image='$new_movie_image',movie_description='$new_movie_description',movie_date='$new_movie_date_insert',movie_tags='$new_movie_tags',movie_trailer='$new_movie_trailer',movie_full='$new_movie_full',movie_resolution='$new_movie_resolution' WHERE movie_id=$movie_edit_id";
    $update_movie=mysqli_query($connection,$update_query);
    if($update_movie){
        echo "<script language=\"javascript\">window.location.href = \"movie.php\"</script>";
    }else{
        echo "failed";
    }
}
?>

<script>
    function ValidateInputImage(oInput) {
        var _validFileExtensions = [".jpg", ".jpeg", ".png"];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    oInput.value = "";
                    return false;
                }
            }
        }
        return true;
    }
    function ValidateInputvideo(oInput) {
        var _validFileExtensions = [".avi", ".flv", ".wmv", ".mov", ".mp4", ".mkv"];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        //document.getElementById("up_trailer_b").style.display='block';
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    oInput.value = "";
                    return false;
                }
            }
        }
        return true;
    }

    function _(el) {
        return document.getElementById(el);
    }
    function showButtonTrailer(){
        _("up_trailer_b").style.display='block';
    }
    function showButtonFull(){
        _("up_full_button").style.display='block';
    }


    function uploadTrailer() {
        //alert("aksdflasd");
        var file = _("movie_trailer").files[0];
        //alert(file.name+" | "+file.size+" | "+file.type);
        var formdata = new FormData();
        formdata.append("movie_trailer", file);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load",completeHandler,false);
        ajax.addEventListener("error",errorHandler,false);
        ajax.addEventListener("abort",abortHandler,false);
        ajax.open("POST","include/upload_edit_trailer.php");
        ajax.send(formdata);
    }
    function progressHandler(event) {
        _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar").value = Math.round(percent);
        _("status").innerHTML = Math.round(percent)+"% uploaded.... please wait";
    }
    function completeHandler(event) {
        _("status").innerHTML = event.target.responseText;
        _("progressBar").value = 0;
    }
    function errorHandler(event) {
        _("status").innerHTML = "Upload Failed";
    }
    function abortHandler(event) {
        _("status").innerHTML = "Upload Aborted";
    }

    function uploadFull() {
        //alert("aksdflasd");
        var file = _("movie_full").files[0];
        //alert(file.name+" | "+file.size+" | "+file.type);
        var formdata = new FormData();
        formdata.append("movie_full", file);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandlerFull, false);
        ajax.addEventListener("load",completeHandlerFull,false);
        ajax.addEventListener("error",errorHandlerFull,false);
        ajax.addEventListener("abort",abortHandlerFull,false);
        ajax.open("POST","include/upload_edit_full.php");
        ajax.send(formdata);
    }
    function progressHandlerFull(event) {
        _("loaded_n_totalFull").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBarFull").value = Math.round(percent);
        _("statusFull").innerHTML = Math.round(percent)+"% uploaded.... please wait";
    }
    function completeHandlerFull(event) {
        _("statusFull").innerHTML = event.target.responseText;
        _("progressBarFull").value = 0;
    }
    function errorHandlerFull(event) {
        _("statusFull").innerHTML = "Upload Failed";
    }
    function abortHandlerFull(event) {
        _("statusFull").innerHTML = "Upload Aborted";
    }
</script>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <!--<div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>-->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                            <div class="box-body">
                                <!-- form start -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="movie_title" class="col-sm-3 control-label" style="font-size: 16px;">Movie Title</label>

                                        <div class="col-sm-9">

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-file-video-o"></i>
                                                </div>
                                                <input type="text" class="form-control" value="<?php echo $movie_title ;?>" id="movie_title" name="movie_title" placeholder="Movie Title" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="movie_cate_id" class="col-sm-3 control-label" style="font-size: 16px;">Category</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                                <select class="form-control" id="movie_cate_id" name="movie_cate_id" style="width: 100%;" required>
                                                    <option selected="selected" value="<?php echo $movie_cate_id;?>"><?php echo $cate_name;?></option>
                                                    <?php
                                                    getCategory();
                                                    ?>
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="movie_date" class="col-sm-3 control-label" style="font-size: 16px;">Release Date</label>

                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" value="<?php echo $movie_date;?>" id="datemask" name="movie_date" placeholder="Release Date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="movie_tags" class="col-sm-3 control-label" style="font-size: 16px;">Movie Tags</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-tags"></i>
                                                </div>
                                                <input type="text" class="form-control" value="<?php echo $movie_tags;?>" id="movie_tags" name="movie_tags" placeholder="Movie Tags" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="movie_resolution" class="col-sm-3 control-label" style="font-size: 16px;">Resolution</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-magic"></i>
                                                </div>
                                                <select class="form-control" id="movie_resolution" name="movie_resolution" style="width: 100%;" required>
                                                    <option selected="selected" value="<?php echo $movie_resolution; ?>"><?php echo $movie_resolution; ?></option>
                                                    <?php
                                                        if($movie_resolution=="HD 1080p"){
                                                            echo "<option value=\"HD 720p\">HD 720p</option>";
                                                        }else
                                                        {
                                                            echo "<option selected=\"selected\" value=\"HD 1080p\">HD 1080p</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dsc" class="col-sm-3 control-label" style="font-size: 16px;">Description</label>

                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="4" id="dsc" name="dsc" placeholder="Description"><?php echo $movie_description; ?></textarea>
                                        </div>
                                    </div>
                                    <!--<div class="form-group">
                                        <label for="movie_trailer" class="col-sm-3 control-label" style="font-size: 16px;">Movie Trailer</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <input type="text" class="form-control" value="<?php /*echo $movie_trailer; */?>" id="movie_trailer" name="movie_trailer" placeholder="Movie Trailer">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="movie_full" class="col-sm-3 control-label" style="font-size: 16px;">Movie Full</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <input type="text" class="form-control" value="<?php /*echo $movie_full; */?>" id="movie_full" name="movie_full" placeholder="Movie Full">
                                            </div>
                                        </div>
                                    </div>-->

                                    <!----------------------------------------------->
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label" style="font-size: 16px;">Movie Trailer</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="movie_trailer" name="movie_trailer" onchange="ValidateInputvideo(this),showButtonTrailer();">
                                        </div>
                                        <div class="col-sm-5">
                                            <p class="help-block col-sm-offset-2" align="right"> <span style="color: red;font-size: 16px;" >Trailer</span></p>
                                        </div>
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <progress id="progressBar" value="0" max="100" style="width: 100%;"></progress>
                                            <h3 id="status"></h3>
                                            <input type="text"  value="<?php echo $movie_trailer;?>" id="trailer_old_name" name="trailer_old_name" hidden>
                                            <p id="loaded_n_total"></p>
                                            <input type="button" value="Upload" id="up_trailer_b" onclick="uploadTrailer()" style="display: none;"><br/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label" style="font-size: 16px;">Full Movie</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="movie_full" name="movie_full" onchange="ValidateInputvideo(this),showButtonFull();">

                                        </div>
                                        <div class="col-sm-5">
                                            <p class="help-block col-sm-offset-2" align="right"> <span style="color: red;font-size: 16px;">Full Movie</span></p>
                                        </div>
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <progress id="progressBarFull" value="0" max="100" style="width: 100%;"></progress>
                                            <h3 id="statusFull"></h3>
                                            <input type="text"  value="<?php echo $movie_full;?>" id="full_old_name" name="full_old_name" hidden>
                                            <p id="loaded_n_totalFull"></p>
                                            <input type="button" value="Upload" id="up_full_button" onclick="uploadFull()" style="display: none;"><br/>
                                        </div>
                                    </div>
                                    <!----------------------------------------------->

                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="old_cover" class="col-sm-3 control-label" style="font-size: 16px;">Old Cover</label>
                                        <div class="col-sm-4 ">
                                            <img width=250 src="<?php echo BASE_URL; ?>/movie/cover/<?php echo $movie_image; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="movie_image" class="col-sm-3 control-label" style="font-size: 16px;">New Movie Cover</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="movie_image" name="movie_image" onchange="document.getElementById('cover').src = window.URL.createObjectURL(this.files[0]),ValidateInputImage(this);">

                                        </div>
                                        <div class="col-sm-5">
                                            <p class="help-block col-sm-offset-2" align="right"> <span style="color: red;font-size: 16px;" >Cover</span></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <img id="cover" alt="Preview" width="250" height="" align="center" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer" style="text-align: center;">
                                <a href="movie.php"> <button type="button" class="btn btn-danger"><i class="fa fa-close">&nbsp;</i>Cancel</button></a>
                                <button type="submit" name="btnupdate" class="btn btn-success"><i class="fa fa-check-circle">&nbsp;</i>Save</button>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
