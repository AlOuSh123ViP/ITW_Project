
    
<?php
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "login";  
  
$con = mysqli_connect($host, $user, $password, $db_name);  
if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}  
   $email='';
   $password='';
   if(isset($_POST['email']))
   {  
      
    
     $email = $_POST['email'];}


   if(isset($_POST['password']))
   {
       $password = $_POST['password'];
   }

   

   if(isset($_POST['submit']))
   {    
     
    

       $sqls ="insert into infoclient (email,password) values ('$email','$password')";
       mysqli_query($con,$sqls);
       
      
   }      
   include('PHP.php');  
   $username = $_POST['user'];  
   $password = $_POST['pass'];  
     
       //to prevent from mysqli injection  
       $username = stripcslashes($username);  
       $password = stripcslashes($password);  
       $username = mysqli_real_escape_string($con, $username);  
       $password = mysqli_real_escape_string($con, $password);  
     
       $sql = "select *from login where username = '$username' and password = '$password'";  
       $result = mysqli_query($con, $sql);  
       $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
       $count = mysqli_num_rows($result);  
         
       if($count == 1){  
           echo "<h1><center> Login successful </center></h1>";  
       }  
       else{  
           echo "<h1> Login failed. Invalid username or password.</h1>";  
       }     

?>







