<?php
$terms = $_GET['terms'];
$myfile = 'terms/' . $terms . '.txt';
unlink($myfile);
header("location: index.php");