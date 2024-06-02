<?php
session_start();
if(!isset($_SESSION['username'])||$_SESSION['role']!="translator"){
    header("Location:login.php");

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
   
    <title>Translator system!</title>
  </head>
  <body class="stars" style="background-color:black" >
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">
                    <img src="logo.png" alt="logo">
                </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav m-auto">
    
      <li class="nav-item active">
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
    <div class="mb-3">
      <form action="" method="post">
  <label for="formGroupExampleInput" class="form-label" style="color:white" >Assamese text are shown below</label>
<?php
 $conn=new mysqli("localhost","root","","miniproject");


?>
 <?php 

   $conn=new mysqli("localhost","root","","miniproject");
   $userId = $_SESSION['id'];
   $userName=$_SESSION['username']; 
   $date=date("Y-m-d");
   $itemCount=1;
   $userSql = "SELECT MAX(itemCount) as itemCount from users where user_type = 'translator'";
   $userQuery = mysqli_query($conn,$userSql);
   if(!$userQuery){
     echo "user id t problem ase !";
   }
  
  while($row = mysqli_fetch_assoc($userQuery)){
  $itemCount = $row['itemCount'];

}


   if(isset($_POST['edit_btn'])){
     
    $english = $_POST['english'];
   
    echo $english;
    $update_english = "UPDATE `upload_test` set translated_data='$english',Translated_by='$userName',Translated_date='$date' where id=$itemCount";
    $query = mysqli_query($conn,$update_english);
    if(!$query){
      echo "partha query t bhul korisa";
    }

    $updateItem = "UPDATE `users` set itemCount=$itemCount+1 where id = $userId";
    $query5 = mysqli_query($conn,$updateItem);
    if(!$query5){
      echo "errors in query 5";
    }
    header("Location:translator.php");
  }
    $sql = "SELECT * FROM `upload_test` WHERE id=$itemCount;" ;
     $query = mysqli_query($conn,$sql);
      if($query){
       while($row = mysqli_fetch_assoc($query)){
    
      $assamese = $row['content'];
        $id = $row['id'];
      
        echo "<input type='text' class='form-control' id='formGroupExampleInput' value='$id :$assamese' readonly>";
}
        echo $itemCount;
} 

    

   

   
   ?>
 <?php 

$conn=new mysqli("localhost","root","","miniproject");
$userId = $_SESSION['id']; 
 $itemCount = 1;
$userSql = "SELECT MAX(itemCount) as itemCount from users where user_type = 'translator'";
$userQuery = mysqli_query($conn,$userSql);
if(!$userQuery){
  echo "user id t problem ase !";
}
while($row = mysqli_fetch_assoc($userQuery)){
$itemCount = $row['itemCount'];

}

if(isset($_POST['edit_btn2'])){
  $countValue = $itemCount -1;
  if($countValue<1){
    $countValue = 1;
  }
 $updateItem = "UPDATE `users` set itemCount=$countValue where id = $userId";
 $query5 = mysqli_query($conn,$updateItem);
 if(!$query5){
   echo "errors in query 5";
 }
 header("Location:translator.php");
}
 $sql = "SELECT * FROM `upload_test` WHERE id=$itemCount;" ;
  $query = mysqli_query($conn,$sql);
   if($query){
    while($row = mysqli_fetch_assoc($query)){
 
   $assamese = $row['content'];
     $id = $row['id'];
}
} 

 




?>


 
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label" style="color:white">Translate the above line</label>
  

  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="english" required>

  <div class="form-group" style="text-align:center;"><br>
  <button type="submit" name="edit_btn2" class="btn btn-success">Back</button>
  <button type="submit" name="edit_btn" class="btn btn-success"> Save and Next</button>
  




                    </div>
</div>
  
</form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
