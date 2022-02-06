<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['student_id'])) {

 ?>

<?php
include "read_users.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
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
            if(document.forms["module-form"]["module_name"].value == "") {
                alert( "Please enter mark!");
                return false;
            }
            if(document.forms["module-form"]["credit"].value == "") {
                alert( "Please enter credit!");
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
            <a href="logout.php"><button type="button" class="btn btn-success" >Logout</button></a>
        </nav>
    </div>

    <!-- input form for module information -->
    <div class="wrapper">
        <form style="display:inline-flex" action="registermodule.php" method="post" name="module-form" onsubmit="return checkform()">
            
            <!-- input module code -->
            <div class="col-auto"> 
                Module Code: <br>  <input type="text" name="module_cd" >
            </div>

            <!-- input module name -->
            <div class="col-auto">
                Module Name: <br> <input type="text" name="module_name" >
            </div>

            <!-- input credit -->
            <div class="col-auto">
                Credit: <br> <input type="number" name="credit" >
            </div>

            <!-- submit button -->
            <div class="col-auto">
                <br>
                <input type="submit" name="submit" value="Submit" class="btn btn-success btn-sm" onclick="rset(this.form)">   
            </div>
        </form>

        <div class="active-user">
            <h3><?php echo count($all_user_names) ?> <?php echo "active user"  ?></h3>
            <ul class="user-list">
                <?php 
                    foreach($all_user_names as $user_name){
                        ?>
                        <li><a href="#"><?php echo $user_name ?></a></li>
                        <?php
                    }
                ?>  
            </ul>
        </div>
    </div>
</body>


</html>

<?php 
}else{
    header("Location: index.php");
    exit();
}
?>