<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merisa Labex5</title>
</head>
<body>
        <h1>Terminology</h1>
        <?php
        if (isset($_GET['add'])) {
        ?>
            <form method="post" action="save.php">
            <fieldset>
            <legend>Add New Terms</legend>
                <table border=0>
                    <tr>
                        <td><b>Terms<b></td>
                        <td>:<input type="text" name="terms"></td>
                    </tr>
                    <tr>
                        <td><b>Description</b></td>
                        <td>:<textarea name="description" rows="4" cols="22"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="submit" value="SAVE" />
                        </td>
                    </tr>
                </table>
            </fieldset>
            </form><br>
        <?php
        }
        if (isset($_GET['edit'])) {
            $terms = $_GET['edit'];
            $namafile = 'terms/' . $terms . '.txt';
            $size = filesize($namafile);
            $file = fopen($namafile, 'r') or die('Fail gagal dibuka');
            $data = fread($file, $size);
            fclose($file);
        ?>
            <form method="post" action="save.php">
            <fieldset>
            <legend>Edit Description</legend>
            <input type="hidden" name="terms" value="<?php echo $terms; ?>" />
                <table border=0 border-collapse="collapse" border="1px solid black">
                    <tr>
                        <td><b>Terms</b></td>
                        <td>:<?php echo $terms; ?></td>
                    </tr>
                    <tr>
                        <td><b>Description</b></td>
                        <td>:<textarea name="description"><?php echo $data; ?></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="submit" value="SAVE" />
                        </td>
                    </tr>
                </table>
            </fieldset>
            </form>
            <br>
        <?php
        }
        if (isset($_GET['terms'])) {
            $terms = $_GET['terms'];
            $namafile = 'terms/' . $terms . '.txt';
            $size = filesize($namafile);
            $file = fopen($namafile, 'r') or die('Fail gagal dibuka');
            $data = fread($file, $size);
            fclose($file);
        }
        ?>
        <table border=1>
            <tr>
                <td>Terms</td>
                <td>Description</td>
            </tr>
            <tr>
                <td>
                    [ <a href="index.php?add=new">Add New</a> ]<br>
                    <ul>
                        <?php
                        $save = scandir('terms');
                        foreach ($save as $namafile) {
                            if ($namafile != '.' && $namafile != '..') {
                                #paparkan $namafile 
                        ?>
                                <li><a href="index.php?terms=<?php echo substr($namafile, 0, -4); ?>">
                                        <?php
                                        echo substr($namafile, 0, -4)
                                        ?>
                                    </a></li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </td>
                <td>
                    <?php
                    if (isset($_GET['terms'])) {
                        $terms = $_GET['terms'];
                        $namafile = 'terms/' . $terms . '.txt';
                        $size = filesize($namafile);
                        $file = fopen($namafile, 'r') or die('Fail gagal dibuka');
                        $data = fread($file, $size);
                        fclose($file);
                    ?>
                    
                    <?php
                    }
                    ?>
                </td>
            </tr>
        </table>
</body>
</html>