<?php  
 $connect = mysqli_connect("localhost", "root", "", "intership");  
 
 error_reporting(0);
 session_start();
 if(!isset($_SESSION['user'])){
     header('location:../index.php');
 } 
 if(isset($_POST["register"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = password_hash($password, PASSWORD_DEFAULT);  
           $role =     mysqli_real_escape_string($connect, $_POST["role"]);  
           $query = "INSERT INTO login_users (name, password ,role) VALUES('$username', '$password','$role')";  
           if(mysqli_query($connect, $query))  
           {  
                echo '<script>alert("Registration Done")</script>';  
           }  
      }  

 }  



  ?>  

           
           
            <div class="container card border-primary py-5" style="width:500px;">  
            
                
                <h3 class="text-center">add member</h3>  
                <br />  
                <form method="post" action="">  
                     <label>Enter Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="text" name="password" class="form-control" />  
                     <br />  
                     <label>user type :</label>  
                    <select name="role" class="form-control">
                     <option value="member"> member</option>
                     <option value="admin"> admin</option>
                    </select>
                     <br />  
                 

                     <input type="submit" name="register" value="Register" class="btn btn-info" />  
                     <br />  
                    
                </form>  
               
            
        </div>