<?php
$terms = $_POST['terms'];
$description = $_POST['description'];

//echo $terms;
//echo $description;

$namafile = 'terms/'. $terms . '.txt';
$file = fopen($namafile, 'w') or die('Fail gagal dibuka');
fwrite($file, $description);
fclose($file);
header("location: index.php?terms=$terms");