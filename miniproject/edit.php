<?php
session_start();
$connection=mysqli_connect("localhost","root","","miniproject");
?>
<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
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
   
    <title>PHP login system!</title>
  </head>
  <body class="stars">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.html">
                    <img src="logo.png" alt="logo">
                </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav m-auto">
    
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

      
     
    </ul>

  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <ul class="nav-item active">
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/office/16/000000/user.png"/> <?php echo "Welcome ". $_SESSION['username']?></a>
</ul>
  </ul>
  </div>


  </div>
</nav>
  <marquee direction = "left" onmouseover="this.stop();" onmouseout="this.start();">
            <a target="_blank" style="color: blue"><?php echo "You are a ". $_SESSION['role']?>! ,now you can start your job</a>&nbsp;| &nbsp;
       </marquee>
  
    </div></section>
    </head> <body class="bg-dark">
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary" style="color:blue">Edit Admin Profile</h4>

        </div>
        <div class="card-body">
        <?php
       
        if(isset($_POST['edit_btn']))
        {
            $id=$_POST['edit_id'];
            //echo $id;
            $query="SELECT * FROM users WHERE id='$id' ";
            $query_run=mysqli_query($connection, $query);
            foreach($query_run as $row){
                ?>


        
     <form action="code.php" method="POST">
         <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
   
                <h3 class="text-center text-light bg-danger p-3">Multi user Role Register System</h3>
              
                    <div class="form-group">
                        <input type="text" name="edit_username" value="<?php echo $row['username']?>"
                        class="form-control form-control-lg" 
                        placeholder="Username" required>
                    </div><br>
                    
                    <div class="form-group">
                        <input type="text" name="edit_email"  value="<?php echo $row['email_id']?>"
                        class="form-control form-control-lg" 
                        placeholder="E-mail" required>
                    </div><br>
                    <div class="form-group lead">
                        <label for="usertype">Select your Designation : </label>
                        <input type="radio" name="edit_usertype" <?=$row['user_type']=="translator" ? "checked" : ""?> value="translator" 
                        class="custom-radio" required>&nbsp;translator |
                        <input type="radio" name="edit_usertype"  <?=$row['user_type']=="validator" ? "checked" : ""?> value="validator" 
                        class="custom-radio" required>&nbsp;validator     
                    </div><br>
                    <div class="form-group">
                      
                        <button type="submit" name="deletebtn" class="btn btn-dange">Delete</button>
                        <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                        
                    </div>
                    
                
      
    </form>  
    <?php
            }
        }
        ?>
        </div>
    </div>
</div>