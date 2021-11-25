<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['student_id']) && isset($_SESSION['admin'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="home.css">
    <script type="text/javascript">
        function rset(f){
        f.submit();
        f.reset();
        }
    </script>
    <script>
		// This is JavaScript function that validate HTML form data entry
		function checkform() {
            if(document.forms["module-form"]["module_cd"].value == "") {
                alert( "Please select module code!");
                return false;
            }
            if(document.forms["module-form"]["credit"].value == "") {
                alert( "Please enter credit!");
                return false;
            }
            if(document.forms["module-form"]["mark"].value == "") {
                alert( "Please enter mark!");
                return false;
            }
            return( true );
		}
	</script>
</head>

<body>
    <div class="container">
        <nav class="navbar" style="background:linear-gradient(#829ebc,#225588);">
            <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
            <?php
                if($_SESSION['admin']==1){
                    echo '<a href="admin.php"><button type="button" class="btn btn-danger" >Admin</button></a>'; 
                }
            ?>
            <a href="logout.php"><button type="button" class="btn btn-success" >Logout</button></a>
        </nav>
    </div>

    <!-- input form for module information -->
    <div class="wrapper">
        <form style="display:inline-flex" action="senddata.php" method="post" name="module-form" onsubmit="return checkform()">
            
            <!-- select module code -->
            <div class="col-auto"> 
                Module Code: <br>  
                <select name="module_cd">
                    <option></option>
                    <option>COMP7001</option>
                    <option>COMP7002</option>
                    <option>TECH7005</option>
                    <option>DALT7002</option>
                    <option>DALT7011</option>
                    <option>SOFT7003</option>
                    <option>TECH7004</option>
                    <option>TECH7009</option>
                </select>
            </div>

            <!-- input credit -->
            <div class="col-auto">
                Credit: <br> <input type="number" name="credit" >
            </div>

            <!-- input mark -->
            <div class="col-auto">
                Mark: <br> <input type="number" name="mark" >
            </div>

            <!-- submit button -->
            <div class="col-auto">
                <br>
                <input type="submit" name="submit" value="Submit" class="btn btn-success btn-sm" onclick="rset(this.form)">   
            </div>
        </form>

        <!-- tables -->
        <?php include('tables.php'); ?>
    </div>
</body>

<?php 
// close the connection
mysqli_close($conn);
?>

</html>

<?php 
}else{
    header("Location: index.php");
    exit();
}
?>