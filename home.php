<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <style>  body {
    background-color: #d0e4fe;
}
u
{
    color: purple;
}
h2 {
    
    text-align: center;
} </style>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    
<form action="home.php">
    
    <input type="submit" value="Transection" name="trn" />
   <input type="button" value="Transfer Amount" name="home"ONCLICK="window.location.href='transfer.php' ""/>
   
   <input type="submit" value="All Transection" name="trs" />
   <input type="submit" value="All Transfer" name="tf" />
  
   
   
   <input type="button" value="Log-Out" name="home"ONCLICK="window.location.href='index.php' ""/>
   
   <h2>
    
</form>
        <?php
        session_start();
         
$databaseHost = 'localhost';
$databaseName = 'bank';
$databaseUsername = 'root';
$databasePassword = '';
 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
        $id=$_SESSION['user1']; 
        //echo '<br>',$id;
        
       $bb= mysqli_query($mysqli,"SELECT  `intbalans` FROM `user` where id='$id'");
       while($row=  mysqli_fetch_array($bb))
           {
               echo 'Your Initial Balance : ';
          echo $row['intbalans'];
           }
	        //echo '<br>Your Initial balance is=',$row['intbalans'];
                $z=mysqli_query($mysqli,"SELECT ((((SELECT intbalans FROM user WHERE id ='$id') + 
(SELECT COALESCE(SUM(amt),0) FROM  `totaltra` WHERE tratype =  'deposit' AND id ='$id') - 
(SELECT COALESCE( SUM( amt ),0) FROM  `totaltra` WHERE tratype =  'withdraw' AND id ='$id' ))+(SELECT COALESCE(SUM(amt),0)ttransfer FROM  `transfer` 
WHERE 
Toid ='$id'))-(SELECT COALESCE(SUM(amt),0)ttransfer FROM  `transfer` 
WHERE 
Fromid ='$id')) AS tbalance");
          
                $row = mysqli_fetch_array($z);
      $tbalance=$row["tbalance"]; 
		$_SESSION['z']=$row["tbalance"];
                echo '<table border="2" align="center">';
                echo "<td>Your Last balance is=".$tbalance;
                
                //$_SESSION['intamt']=$_SESSION['user'];
          
            
            if(isset($_GET["trn"]))
        {
            header("location:transection.php");
        }
        if(isset($_GET["demo"]))
        {
            header("location:Realbalance.php");
        }
        if(isset($_GET["tf"]))
        {
            header("location:totaltransfer.php");
        }
           if(isset($_GET["trs"]))
        {
            header("location:totaltra.php");
        }
        
           // session_destroy();
       
// put your code here
        ?>
    </body>
</html>
