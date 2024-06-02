<?php
$conn = new mysqli('localhost','root','','miniproject');

$file =fopen("test.txt","r");
while(!feof($file)){
$content=fgets($file);
$carray=explode(",", $content);
list($name,$age,$city)=$carray; 
$sql="INSERT INTO `students` (`name`, 
`age`, `city`) VALUES ('$name', '$age', '$city')";
$conn->query($sql); 
#echo "<pre>";
#var_dump($carray);
}
fclose($file);