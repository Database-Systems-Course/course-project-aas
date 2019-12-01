<?php
// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>
<?php
//creating variables
$server="localhost";
$user="root";
$pass="";
$db="database";

//declaring connection
$conn = new mysqli($server,$user,$pass,$db);
//$link=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

//Checking connection
if($conn->connect_error){
    die('Could not connect: '. $conn->connect_error);
}

//creating data variables
$season = mysqli_real_escape_string($conn, $_POST['season']);
$year = mysqli_real_escape_string($conn, $_POST['year']);
$comment = mysqli_real_escape_string($conn, $_POST['comment']);
$q1 = mysqli_real_escape_string($conn, $_POST['q1']);
$q2 = mysqli_real_escape_string($conn, $_POST['q2']);
$q3 = mysqli_real_escape_string($conn, $_POST['q3']);
$q4 = mysqli_real_escape_string($conn, $_POST['q4']);


$sql = "INSERT INTO course_review (season, year, comment, q1, q2, q3, q4) VALUES ('$season','$year','$comment','$q1','$q2','$q3','$q4')";
$url="user/profile";
if($conn->query($sql) === TRUE){
  header("Location: $url ");
}

$conn->close();
?>