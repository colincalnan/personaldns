<?php 
$file = file_get_contents('https://dl.dropboxusercontent.com/u/1234567/yourmachine.txt');
header('Location: http://' . $file . ':9091');
?>