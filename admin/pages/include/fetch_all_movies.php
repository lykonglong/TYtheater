<?php
/* Database connection start */
include '../../../_config_inc.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tytheater";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());


// storing  request (ie, get/post) global array to a variable
$requestData= $_REQUEST;


$columns = array(
// datatable column index  => database column name
	0 =>'movie_id',
	1 => 'movie_title',
	2=> 'movie_cate_id',
	3=> 'movie_resolution',
	4=> 'movie_resolution',
	5=> 'action'
);

// getting total number records without any search
$sql = "SELECT *";
	$sql.=" FROM movies WHERE status=1";
$query=mysqli_query($conn, $sql) or die("fetch_all_movies.php: get movie");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT * ";
$sql.=" FROM movies WHERE status=1 and 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( movie_id LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR movie_cate_id LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR movie_title LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR movie_resolution LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR movie_image LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR movie_tags LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("fetch_all_movies.php: get movies");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
$query=mysqli_query($conn, $sql) or die("fetch_all_movies.php: get movie");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array



	$nestedData=array();

	$nestedData[] = $row["movie_id"];
	$nestedData[] = $row["movie_title"];
    $cate_query="select * from categories where cate_id=".$row['movie_cate_id'];
    $select_category=mysqli_query($conn,$cate_query);
    while($row1=mysqli_fetch_assoc($select_category)){
        $nestedData[] =$row1['cate_name'];
    }

	$nestedData[] = $row["movie_resolution"];
	$nestedData[] = '<img src="'.BASE_URL.'/movie/cover/'.$row["movie_image"].'" class="img-responsive" alt="'.$row["movie_image"].'" style="height: 30px;">';
	$nestedData[]= '<a href="movie.php?action=view_movie&view='.$row["movie_id"].'" class="btn btn-info btn-flat btn-sm"><i class="fa fa-eye"></i> View</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="movie.php?action=edit_movie&edit='.$row["movie_id"].'" class="btn btn-success btn-flat btn-sm"><i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="movie.php?trash='.$row["movie_id"].'" onclick="return confirm(\'Are your sure?\')"  class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash-o"></i> Trash</a>';
	$data[] = $nestedData;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
