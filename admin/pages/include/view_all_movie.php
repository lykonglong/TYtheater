<style>
    th{
        text-align: center;

    }
    td,th{
        max-width: 130px;
        overflow:hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
    .no-break-out {
        overflow:hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>
<section class="content-header">
    <h1>
        Movies Management Page
        <a href="?action=add_movie"><i style="font-size: large;" class="fa fa-plus">&nbsp;Add Movie</i></a>
        <!--<small>Preview page</small>-->

        <!-- Modal -->

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Form Upload</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post" action="">
                                <div class="box-body">
                                    <!-- form start -->
                                    <form class="form-horizontal">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="post_title" class="col-sm-3 control-label" style="font-size: 16px;">Post Title</label>

                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Post Title" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="post_link" class="col-sm-3 control-label" style="font-size: 16px;">Link</label>

                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="post_link" name="post_link" placeholder="Link" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="post_link_type" class="col-sm-3 control-label" style="font-size: 16px;">Link Type</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="post_link_type" name="post_link_type" style="width: 100%;" required>
                                                        <option selected="selected" value="Local">Local</option>
                                                        <option value="Youtube">Youtube</option>
                                                        <option value="Google Drive">Google Drive</option>
                                                        <option value="Daily Motion">Daily Motion</option>
                                                    </select>
                                                </div>
                                             </div>
                                            <div class="form-group">
                                                <label for="post_tags" class="col-sm-3 control-label" style="font-size: 16px;">Post Tags</label>

                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="post_tags" name="post_tags" placeholder="Post Tags" required>
                                                </div>
                                            </div>
                                            <!--<div class="form-group">
                                                <label for="post_status" class="col-sm-3 control-label" style="font-size: 16px;">Status</label>

                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="post_status" name="post_status" placeholder="Status" required>
                                                </div>
                                            </div>-->
                                            <div class="form-group">
                                                <label for="post_category" class="col-sm-3 control-label" style="font-size: 16px;">Category</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="post_category" name="post_category" style="width: 100%;" required>
                                                        <option value="" selected>--Please Choose a Category--</option>
                                                        <?php
                                                        $query="select * from category_detail";
                                                        $select_category=mysqli_query($connection,$query);
                                                        while($row=mysqli_fetch_assoc($select_category)){
                                                            $cat_id = $row['cat_detail_id'];
                                                            $cat_title=$row['cat_detail_name'];
                                                            echo "<option value='$cat_id'>$cat_title</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="post_image" class="col-sm-3 control-label" style="font-size: 16px;">Image</label>
                                                <div class="col-sm-9">
                                                    <input type="file" id="post_image" name="post_image" required>
                                                    <p class="help-block col-sm-offset-2"> <span style="color: red;font-size: 14px;" >សូម Upload រូបថតដែលមានរាងជាការេ </span></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="post_content" class="col-sm-3 control-label" style="font-size: 16px;">Post Content</label>

                                                <div class="col-sm-9">
                                                    <textarea type="text" class="form-control" id="post_content" name="post_content" placeholder="Post Content" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="btninsert" class="btn btn-success">Insert</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /End of Modal -->

    </h1>
    <ol class="breadcrumb">
        <li><a href="../dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Movie</li>
    </ol>
</section>

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
                    <table id="movie_ser" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Resolution</th>
                            <th>Poster</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Resolution</th>
                            <th>Poster</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
					
					<script type="text/javascript" language="javascript" >
						$(document).ready(function() {
							var dataTable = $('#movie_ser').DataTable( {
								"processing": true,
								"serverSide": true,
								"ajax":{
									url :"include/fetch_all_movies.php", // json datasource
									type: "post",  // method  , by default get
									error: function(){  // error handling
										$(".employee-grid-error").html("");
										$("#movie_ser").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
										$("#employee-grid_processing").css("display","none");

									}
								}
							} );
						} );
					</script>
					
                    <!--delete video from table video_post by id-->
                    <?php
                    if(isset($_GET['trash'])) {
                        $trash_id=$_GET['trash'];
                        $trash ="UPDATE movies SET status='0' WHERE movie_id=$trash_id";
                        $run_trash=mysqli_query($connection,$trash);
                        if($run_trash){
                            echo "<script language=\"javascript\">window.location.href = \"movie.php\"</script>";
                        }
                    }
                    ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
