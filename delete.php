<?php
$terms = $_GET['terms'];
$namafile = 'terms/'. $terms . '.txt';
//echo $namafile;
unlink($namafile);
header("location: index.php");