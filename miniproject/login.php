<?php 
 session_start();
  error_reporting(0);
 $conn=new mysqli("localhost","root","","miniproject");

 $msg="";
 if(isset($_POST['login'])){
     $username=$_POST['username'];
     $password=$_POST['password'];
     $password=sha1($password);
     $usertype=$_POST['usertype'];
     $useremail=$_POST['email'];

     $sql="SELECT * FROM USERS WHERE username=? AND password=? AND user_type=? AND email_id=?";
     $stmt=$conn->prepare($sql);
     $stmt->bind_param('ssss',$username,$password,$usertype,$useremail);
     $stmt->execute();
     $result=$stmt->get_result();
     $row=$result->fetch_assoc();
     session_regenerate_id();
     $_SESSION['username']=$row['username'];
     $_SESSION['role']=$row['user_type'];
     $_SESSION['id']=$row['id'];
     session_write_close();

     if($result->num_rows==1 && $_SESSION['role']=='translator'){
        header("location:translator.php");
     }
     else if($result->num_rows==1 && $_SESSION['role']=='validator') {
        header("location:validator.php");
     }
     else if($result->num_rows==1 && $_SESSION['role']=='Admin'){
        header("location:Admin.php");
     }
     else{
         $msg="Username/Password/email_id is Incorrect!";
     }
 }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://www.gauhati.ac.in/assets/css/slick.css">
    <!--====== Style css ======-->
    <link rel="stylesheet" href="https://www.gauhati.ac.in/assets/css/style.css">
    <title>login system!</title>
  </head>
  <body class="bg-dark">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">
                    <img src="logo.png" alt="logo">
                </a>
                
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav m-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="login.php">Login</a>
      </li>
     

      
     
    </ul>
  </div>
  
</nav>
<div class="alert alert-danger alert-dismissible">
         <marquee direction = "left" onmouseover="this.stop();" onmouseout="this.start();">
            <ul class="list-group list-group-horizontal">
                         <li>
        <a href="register.php"
            target="_blank" style="color: blue">If you are not registered yet then first registered yourself</a>&nbsp;| &nbsp;
        </li>
        </ul>
         </marquee>
  
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 bg-light mt-5 px-0">
                <h3 class="text-center text-light bg-danger p-3">Please Login Here:</h3>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="p-4">
                    <div class="form-group">
                        <input type="text" name="username" 
                        class="form-control form-control-lg" 
                        placeholder="Username" required>
                    </div><br>
                    <div class="form-group">
                        <input type="text" name="email" 
                        class="form-control form-control-lg" 
                        placeholder="E-mail" required>
                    </div><br>
                    <div class="form-group">
                        <input type="password" name="password" 
                        class="form-control form-control-lg" 
                        placeholder="Password" required>
                    </div>
                    <div class="form-group lead">
                        <label for="usertype">I am a : </label>
                        <input type="radio" name="usertype" value="translator" 
                        class="custom-radio" required>&nbsp;translator |
                        <input type="radio" name="usertype" value="validator" 
                        class="custom-radio" required>&nbsp;validator |
                        <input type="radio" name="usertype" value="Admin" 
                        class="custom-radio" required>&nbsp;Admin
                        
                    </div><br>
                    <div class="form-group">
                        <input type="submit" name="login" class="btn btn-danger btn-block">
                    </div>
                    <h5 class="text-danger text-center"><?= $msg; ?></h5>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
