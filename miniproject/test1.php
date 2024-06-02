<html>
	<head>
		<title>Upload Multiple</title>
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
	</head>
	<body>
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
	  </ul>

</nav>

		<!--we have form like this--><br><br>
		<form action="test1.php"name="readfile" method="post" enctype="multipart/form-data" style=" max-width: 500px;margin:auto;">
		<table cellpadding="10"  rules="all" frame="box" style=" max-width: 500px; margin: auto;">
			<tr>
				<td colspan="2" >
					<h3 style="text-align:center;">
						Upload Your data
					</h3>
				</td>
			</tr>
			<tr>
				<td>
					<strong><label for="txt-file">Open File(*.txt):</label>
				</td>
				<td>
					<input type="file" name="file1">
					<!--file to read, we attribute name as blank array to store multiple file and multiple='multiple' to enable multiple select file-->
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<input type="submit" name="read" value="Insert">
					<!--button to submit the form to read data from the file-->
				</td>
			</tr>
		</table>
		</form>
		<?php
			//check if we have click submit form with button name read
			if(isset($_POST['read'])){
				//now we need to connect to database
				$con = mysqli_connect('localhost','root','','miniproject') ;//or die('could not connect to database'.mysql_error());//connection to database server
				//mysql_connect(servername,username,password)
				//mysql_select_db('web_learning');//select database
				//mysql_select_db(databasename);
				//now start test file upload
				//echo $total;
				//now i will use for loop to get file from selected 
				$file_type=$_FILES['file1']['type'];
				$allow_type='text/plain';
				if($file_type == $allow_type)
				{//check if selected file type is match to the allow file type we have defined
						//let read content of each file
						//before do this we need to move file from tmp dir to our dir by
						move_uploaded_file($_FILES['file1']['tmp_name'],'files/'.$_FILES['file1']['name']);
                        $read=fopen('files/'.$_FILES['file1']['name'],"r");
						while(!feof($read))
							{
								//echo "'".str_replace(",","','",fgets($read))."'";
							$values = "'".str_replace(",","','",fgets($read))."'";
							$sql="insert into upload_test(content) values($values)";
							//now i will insert data from my form
							mysqli_query($con, $sql);//execute sql string
							}
						
				}
                else
                {
                    echo 'Please insert a text file';
                }
				
			}
		?>
	</body>
</html>