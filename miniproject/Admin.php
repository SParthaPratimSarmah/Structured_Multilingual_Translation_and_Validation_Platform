<?php
session_start();
$connection=mysqli_connect("localhost","root","","miniproject");
if(!isset($_SESSION['username'])||$_SESSION['role']!="Admin"){
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
   
    <title>Admin system!</title>
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
    
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <li class="nav-item active">
      <a href="test1.php
        " >INSERT DATABASE</a></li>
        <li class="nav-item active">
      <a href="datacollection.php" >SHOW DATA COLLECTION</a></li>

      
     
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
    <?php
if(isset($_SESSION['success']) && $_SESSION['success']!='')
{
    echo '<h2 class="bg-primary">'.$_SESSION['success'].'</h2>';
    unset($_SESSION['success']);
}
if(isset($_SESSION['status']) && $_SESSION['status']!='')
{
    echo '<h2 class="bg-danger">'.$_SESSION['status'].'</h2>';
    unset($_SESSION['status']);
}
?>

        <div class="table-responsive">
        <?php
           
            $query="SELECT * FROM users WHERE user_type='translator' OR user_type='validator'";
            $query_run=mysqli_query($connection, $query);
        ?>
    
        <table class="table table-bordered" id="dataTable" width="100%" cellspaccing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>User Type</th>
                <th>Email Id</th>
                <th>Number of translation/validation</th>
               <!-- <th>Edit</th>
                <th>Delete</th>-->
            </tr>
        </thead>
        <tbody>

        <?php 
        if(mysqli_num_rows($query_run)>0)
        {
            while($row = mysqli_fetch_assoc($query_run))
            {
             ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['user_type']; ?></td>
                <td><?php echo $row['email_id']?></td>
                <td><?php echo $row['itemCount'];?> </td>
               <!-- <td>
                    <form action="edit.php" method="post">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class="btn btn-success">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="code.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php //echo $row['id']; ?>">
                    <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                    </form>
                </td> -->
            </tr>
            
            <?php
            }
        }
        else
        {
            echo "No Record Found";
        }
        ?>
        </tbody>
    </table>
    </div>
     

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
