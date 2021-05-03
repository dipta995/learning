<!DOCTYPE html>    
<html>    
<head>    
    <style type="text/css">
        body  
{  
    margin: 0;  
    padding: 0;  
    background-color:#6abadeba;  
    font-family: 'Arial';  
}  
.login{  
        width: 382px;  
        overflow: hidden;  
        margin: auto;  
        margin: 20 0 0 450px;  
        padding: 80px;  
        background: #23463f;  
        border-radius: 15px ;  
          
}  
h2{  
    text-align: center;  
    color: #277582;  
    padding: 20px;  
}  
label{  
    color: #08ffd1;  
    font-size: 17px;  
}  
#Uname{  
    width: 300px;  
    height: 30px;  
    border: none;  
    border-radius: 3px;  
    padding-left: 8px;  
}  
#Pass{  
    width: 300px;  
    height: 30px;  
    border: none;  
    border-radius: 3px;  
    padding-left: 8px;  
      
}  
#log{  
    width: 300px;  
    height: 30px;  
    border: none;  
    border-radius: 17px;  
    padding-left: 7px;  
    color: blue;  
  
  
}  
span{  
    color: white;  
    font-size: 17px;  
}  
a{  
    float: right;  
    background-color: grey;  
}  
    </style>
    <title>Login Form</title>    
      
</head>    
<body>    
    <h2>Login Page</h2><br>   
     <?php
     include_once '../include/ViewClass.php';
        session_start();
  $viewcls = new ViewClass();
  if (isset($_SESSION['true'])==true) {
    session_unset(); 
  }
  

      if ($_SERVER['REQUEST_METHOD']=='POST') {
    $username = $_POST['username'];
    $password = $_POST['pass'];
 
    $get = $viewcls->adminlogin($username,$password);

    
} ?>
    <div class="login">    
    <form id="login" method="post" action="login.php">    
        <label><b>User Name     
        </b>    
        </label>    
        <input type="text" name="username" id="Uname" placeholder="Username">    
        <br><br>    
        <label><b>Password     
        </b>    
        </label>    
        <input type="Password" name="pass" id="Pass" placeholder="Password">    
        <br><br>    
        <input type="submit" name="log" id="log" value="Log In Here">       
        <br><br>    
          
        <br><br>    
          
    </form>     
</div>    
</body>    
</html>    