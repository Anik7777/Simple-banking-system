<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style type="text/css">
            .table
            {

background: -moz-linear-gradient(top, #8470b2 10%, #cccccc 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, #8470b2 10%,#cccccc 100%); /* Chrome10-25,Safari5.1-6 */

            }
        </style>
    </head>
    <body><form action="index.php" >
       <table border="2" align="center" class="table">
       
        <tr align="center">
            <th>
            Registation Details
            </th>
        </tr>
        <table border="2" align="center">
        <tr>
            <td>
            Username:
            </td><td>
        <input type="text" name="uname" value="" /><br></td></tr>
        <tr>
        
                        <td> Password:
            
                 </td><td>   <input type="password" name="psw" value="" /><br></td></tr>
            <tr>
        
            <td>
            Amount:
          
                 </td><td>       <input type="text" name="amt" value="" /><br></td></tr>
           <td> <input type="submit" value="Acc Open" name="act" />
            </td><td><input type="button" value="Login" name="login" ONCLICK="window.location.href='login.php'"/><a href="../depositview.php">Admin Panel</a>
        </td> </form>
        <?php
     
        if(isset($_GET['act']))
        {

             $databaseHost = 'localhost';
$databaseName = 'bank';
$databaseUsername = 'root';
$databasePassword = '';
 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
                $Name=$_GET['uname'];
		$Password=$_GET['psw'];
                $Amt=$_GET['amt'];
                $check_email_query="SELECT * FROM user WHERE username='$Name'";
    $run_query=mysqli_query($mysqli,$check_email_query);

    if(mysqli_num_rows($run_query)>0)
    {
echo "<script>alert('Email $Name is already exist in our database, Please try another one!')</script>";
exit();
    }
	 mysqli_query($mysqli,"INSERT INTO `user`(`username`, `password`,intbalans) VALUES('$Name','$Password','$Amt')");
         header("location:Login.php");
         
        }
        
        // put your code here
        ?>
    </body>
</html>
