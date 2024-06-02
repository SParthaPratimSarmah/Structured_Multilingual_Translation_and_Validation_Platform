
<?php
session_start(); 
$connection=mysqli_connect("localhost","root","","miniproject");
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $usertype=$_POST['edit_usertype'];
    $query= "UPDATE users SET username='$username',user_type='$usertype',email_id='$email' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    if($query_run)
    {
        $_SESSION['success'] ="Your Data is Updated";
       // $_SESSION['success_code'] = "success";
        header('Location: Admin.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
       // $_SESSION['status_code'] = "error";
        header('Location: Admin.php'); 
    }
}

if(isset($_POST['delete_btn'])){
    $id=$_POST['delete_id'];
    $query="DELETE FROM users WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    if($query_run)
    {
        $_SESSION['success'] ="Your Data is Deleted";
       // $_SESSION['success_code'] = "success";
        header('Location: Admin.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is Not Deleted";
       // $_SESSION['status_code'] = "error";
        header('Location: Admin.php'); 
    }

}
?>