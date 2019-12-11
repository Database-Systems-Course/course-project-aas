<?php
session_start();

$con = mysqli_connect("localhost", "root", "");
if(!$con)
{
	echo "Unable to establish connection.".mysqli_error();
}
$db = mysqli_select_db($con, "test");
if(!$db)
{
	echo"Database not found! ".mysqli_error();
}

$email = $_SESSION['email'];
$password = $_SESSION['password'];

$query = "select * from instructors where email='$email' and password = '$password'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_array($result);
$id = $row['Instructorid'];

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Instructor Profile (Backup 1573717911002) (Backup 1573749201254)</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Profile-Picture-With-Badge-1.css">
    <link rel="stylesheet" href="assets/css/Profile-Picture-With-Badge.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Team-Boxed.css">
</head>

<body>
    <div class="team-boxed"></div>
    <div data-bs-parallax-bg="true" style="height:500px;background-image:url(https://habib.edu.pk/HU-news/wp-content/uploads/2014/09/HU-Panorama1.jpg);background-position:center;background-size:cover;"></div>
    <div class="container profile profile-view" id="profile">
        <div class="row">
            <div class="col-md-12 alert-col relative">
                <h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Instructor Profile</h1>
            </div>
        </div>
        <form>
            <div class="form-row profile-row">
                <div class="col-md-4 relative"><label class="col-form-label">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="assets/img/photo.jpg">&nbsp;<br><br>Dr. Saleem has been passionate about Computer Science since his undergraduate years. He is fascinated by the field of computer graphics, specifically geometric modeling and shape processing. Dr. Saleem focuses on the development of new processing and management tools that may potentially be useful in the context of digital shape repositories. Specifically, his research improves on learning-based surface reconstruction from scattered data, and he has developed several techniques for presenting a given 3D shape by a series of 2D views.This has led to a new approach for measuring shape complexity in terms of viewing similarity between different perspectives. Dr. Saleem’s research addresses the highly relevant topic of building and querying 3D shape repositories. The results of his research have led to several peer-reviewed publications in leading international journals.<br><br></label></div>
                <div
                    class="col-md-8">
                    <h1><?php echo$row['Name']?></h1>
					<hr>
					<?php 
						$query = "select distinct courses.Title from courses,instructors,section where section.Instructor_ID = instructors.Instructorid and courses.Courseid = section.Course_ID and Instructors.Instructorid = $id";
						$result = mysqli_query($con, $query) or die(mysqli_error($con));
					?>
                    <h1>Courses Offered</h1>
                    
                    <div class="form-row">
                        <ul>
						<?php while($row = mysqli_fetch_array($result))
						{ ?>
							<li> <?php echo$row['Title']; ?> </li>
						<?php }	?>
						</ul>
                    </div>
                    <div class="form-row">
                        <div class="col"><label class="col-form-label">Comments:</label></div>
                    </div>
                    <div class="card"></div>
                    <div class="form-row">
                        <!--Comment-->
                        <div class="col"><label></label><input class="form-control" type="text"><input class="form-control" type="text"></div>
                        <!--Comment-->
                    </div>
                    <div class="form-row">
                        <!--Comment-->
                        <div class="col"></div>
                    </div>
                    <!--Comment-->
                    <!--Comment--><label></label>
                    <h1>Assertiveness: 5<br><br></h1>
                    <h1>Interactivity: 4</h1>
            </div>
    </div>
    </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
</body>

</html>
