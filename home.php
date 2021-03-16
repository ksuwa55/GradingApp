<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['student_id'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
     <div class="container">
          <nav class="navbar" style="background:linear-gradient(#829ebc,#225588);">
               <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
               <a href="logout.php"><button type="button" class="btn btn-success" >Logout</button></a>
          </nav>
     </div>
    <div class="wrapper">

    <form style="display:inline-flex" action="senddata.php" method="post">
        <div class="col-auto">       
            <input type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="module_cd" placeholder="Module Code">   
        </div>
        <div class="col-auto">
            <input type="number" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="credit" placeholder="Credit">   
        </div>
        <div class="col-auto">
            <input type="number" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="mark" placeholder="Mark">   
        </div>
        <div class="col-auto">
            <input type="submit" name="submit" value="Submit" class="btn btn-success">   
        </div>
    </form>

        <?php include('module_tables.php'); ?>

    </div>

</body>
<?php       
// close the connection
mysqli_close($conn);?>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>