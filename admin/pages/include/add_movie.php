<?php

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$user_role = $_SESSION['user_role'];
        if(isset($_POST['btninsert'])){
            $movie_title=mysqli_real_escape_string($connection,$_POST['movie_title']);
            $movie_cate_id=mysqli_real_escape_string($connection,$_POST['movie_cate_id']);

            $movie_date=mysqli_real_escape_string($connection,$_POST['movie_date']);
            $datesort= str_replace('/', '-',"$movie_date");
            $date_insert= date('Y-m-d', strtotime($datesort));

            $movie_tags=mysqli_real_escape_string($connection,$_POST['movie_tags']);
            $movie_resolution=mysqli_real_escape_string($connection,$_POST['movie_resolution']);
            $movie_description=mysqli_real_escape_string($connection,mb_convert_encoding($_POST['dsc'],"UTF-8","auto") );

            $movie_trailer=mysqli_real_escape_string($connection,$_POST['trailer_name']);
            $movie_full=mysqli_real_escape_string($connection,$_POST['full_name']);


            /*echo $movie_trailer=$_FILES['movie_trailer']['name'];
            echo $movie_trailer_temp=$_FILES['movie_trailer']['tmp_name'];

            echo $movie_full=$_FILES['movie_full']['name'];
            echo $movie_full_temp=$_FILES['movie_full']['tmp_name'];*/

            $movie_image=$_FILES['movie_image']['name'];
            $movie_image=uniqid().$movie_image;
            $movie_image_temp=$_FILES['movie_image']['tmp_name'];



            /*move_uploaded_file($movie_trailer_temp,"../dist/movie/trailer/".$movie_trailer);
            move_uploaded_file($movie_full_temp,"../dist/movie/full/".$movie_full);*/

            $insert_movie = "Insert into movies(user_id, movie_cate_id, movie_title, movie_image, movie_description, movie_date, movie_tags, movie_trailer, movie_full, movie_resolution, status, date_added)VALUE ($user_id,$movie_cate_id,'$movie_title','$movie_image','$movie_description','$date_insert','$movie_tags','$movie_trailer','$movie_full','$movie_resolution',1,now())";
            //$insert_movie = "Insert into movies(user_id, movie_cate_id, movie_title) VALUE ($user_id,$catie_cate_id,'$movie_title')";

           $run_insert_movie=mysqli_query($connection,$insert_movie);
            if($run_insert_movie){
                move_uploaded_file($movie_image_temp, "../../movie/cover/".$movie_image);
                echo "<script language=\"javascript\">window.location.href = \"movie.php\"</script>";
            }else
            {
                echo "Inserting failed!";
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
        _("up_full_b").style.display='block';
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
        ajax.open("POST","include/upload_trailer.php");
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
        ajax.open("POST","include/upload_full.php");
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
        <p style="text-align: center;font-size: 36px;">Form add new movie​</p>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <!--<div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>-->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="addMovieForm">
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
                                                <input type="text" class="form-control" value="" id="movie_title" name="movie_title" placeholder="Movie Title" required>
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
                                                    <option selected="selected" value="">Choose a category of movie</option>
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
                                                <input type="text" class="form-control" value="" id="datemask" name="movie_date" placeholder="Release Date" required>
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
                                                <input type="text" class="form-control" value="" id="movie_tags" name="movie_tags" placeholder="Movie Tags" required>
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
                                                    <option selected="selected" value="HD 1080p">HD 1080p</option>
                                                    <option value="HD 720p">HD 720p</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dsc" class="col-sm-3 control-label" style="font-size: 16px;">Description</label>

                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="4" id="dsc" name="dsc" placeholder="Description"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <!----------------------------------------------->
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label" style="font-size: 16px;">Movie Trailer</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="movie_trailer" name="movie_trailer" onchange="ValidateInputvideo(this),showButtonTrailer();" required>
                                        </div>
                                        <div class="col-sm-5">
                                            <p class="help-block col-sm-offset-2" align="right"> <span style="color: red;font-size: 16px;" >Trailer</span></p>
                                        </div>
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <progress id="progressBar" value="0" max="100" style="width: 100%;"></progress>
                                            <h3 id="status"></h3>
                                            <p id="loaded_n_total"></p>
                                            <input type="button" value="Upload" id="up_trailer_b" onclick="uploadTrailer()" style="display: none;"><br/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label" style="font-size: 16px;">Full Movie</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="movie_full" name="movie_full" onchange="ValidateInputvideo(this),showButtonFull();" required>

                                        </div>
                                        <div class="col-sm-5">
                                            <p class="help-block col-sm-offset-2" align="right"> <span style="color: red;font-size: 16px;">Full Movie</span></p>
                                        </div>
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <progress id="progressBarFull" value="0" max="100" style="width: 100%;"></progress>
                                            <h3 id="statusFull"></h3>
                                            <p id="loaded_n_totalFull"></p>
                                            <input type="button" value="Upload" id="up_full_b" onclick="uploadFull()" style="display: none;"><br/>
                                        </div>
                                    </div>
                                    <!----------------------------------------------->

                                    <div class="form-group">
                                        <label for="movie_image" class="col-sm-3 control-label" style="font-size: 16px;">Movie Cover</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="movie_image" name="movie_image" onchange="document.getElementById('cover').src = window.URL.createObjectURL(this.files[0]),ValidateInputImage(this);" required>

                                        </div>
                                        <div class="col-sm-5">
                                            <p class="help-block col-sm-offset-2" align="right"> <span style="color: red;font-size: 16px;" >Cover</span></p>
                                        </div>
                                        <div class="col-sm-4 col-sm-offset-5">
                                            <img id="cover" alt="Preview" width="150" height="200" align="center" />
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer" style="text-align: center;">
                                <a href="movie.php"> <button type="button" class="btn btn-danger"><i class="fa fa-close">&nbsp;</i>Cancel</button></a>
                                <button type="submit" name="btninsert" class="btn btn-success"><i class="fa fa-check-circle">&nbsp;</i>Insert</button>
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
