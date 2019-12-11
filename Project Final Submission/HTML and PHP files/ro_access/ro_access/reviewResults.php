<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>evaluate.hu</title>
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
<style>
    .my-row{
        height: 130px;
        padding-bottom: 35px;
        padding-right: 0px;
        padding-left: 0px ;
    }
    .my-col{
        padding-top: 50px;
        padding-left: 700px;
    }
    .my-card1{
        width:fit-content;
        height:310px;
    }

</style>

<body>
    <div class="card">
    <nav class="navbar navbar-expand-md navbar-light bg-light my-row">
        <a class="navbar-brand" href="#">
        <img src="https://donate.habib.edu.pk/Content/hu_logo.png" alt="">
        </a>
        <span class="navbar-text">
        <div class="collapse navbar-collapse my-col" id="navbarMenu">
            <ul class="navbar-nav">
                <li class="nav-item active">
                <a href="" class="nav-link">Profile</a>
                </li>
                <li class="nav-item active">
                <a href="#" class="nav-link">Course Search</a>
                </li>
                <li class="nav-item active">
                <a href="#" class="nav-link">Instructor Search</a>
                </li>
            </ul>
        </div>
        </span>

    </nav>
    </div>
    <br>
<div class="container">

<div class="row my-row0">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Students Reviews</h5>
                <div class="card-body">
                <?php
                session_start();
                $con = mysqli_connect("localhost", "root", "");
                            if(!$con)
                            {
                                echo "Unable to establish connection.".mysqli_error();
                            }
                            $db = mysqli_select_db($con, "test");
                            
                            
                            $ins = $_SESSION['instructor'];
                            $year = $_SESSION['year'];
                            $season = $_SESSION['season'];
                            $query = "select Semesterid from semester where Year = $year and Type LIKE '%$season%'";
                            $result = mysqli_query($con, $query) or die(mysqli_error($con));
                            $row = mysqli_fetch_array($result);
                            $semester = $row['Semesterid'];
                            $query = "select distinct coursereviews.Rating_Q1, coursereviews.Rating_Q2, coursereviews.Rating_Q3, coursereviews.Rating_Q4, coursereviews.comment, coursereviews.Course_ID from coursereviews, section where coursereviews.comment <> '' and coursereviews.Course_ID in (select section.Course_ID from section where Review_Student_ID = $ins and Semester_ID = $semester) ";
                            $result = mysqli_query($con, $query) or die(mysqli_error($con));
                            ?>

                            <?php
                            while($row = mysqli_fetch_array($result))
                            {
                                ?><ol><?php
                                $co_id = $row['Course_ID'];
                                $query = "select Title from courses where courseid = $co_id";
                                $result1 = mysqli_query($con, $query) or die(mysqli_error($con));
                                $row1 = mysqli_fetch_array($result1);
                                ?>
                                <li><?php echo $row1['Title'];?></li><br/>
                                <li><?php echo $row['comment'];?></li><br/>
                                <ul>
                                <li><?php echo $row['Rating_Q1'];?></li><br/>
                                <li><?php echo $row['Rating_Q2'];?></li><br/>
                                <li><?php echo $row['Rating_Q3'];?></li><br/>
                                <li><?php echo $row['Rating_Q4'];?></li><br/>
                            </ul>
                            </ol>
                                <?php
                            }
                            ?>
                            
                </div>
            </div>
        </div>
</div>
</div>
<br>

<footer class="page-footer font-small bg-light">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2019 Copyright: Team AAS 
        </div>
        <!-- Copyright -->
      
</footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
</body>

</html>