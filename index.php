<html>

<head>
    <title>Merisa Labex4</title>
</head>

<body>
        <h2>Terminology</h2>
        <?php
        if (isset($_GET['add'])) {
        ?>
            <form action="save.php" method="post">
                <fieldset>
                    <legend>Add New Terms</legend>
                    <table>
                        <tr>
                            <th>Terms</th>
                            <td><input type="text" name="terms"></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><textarea id="description" name="description"></textarea></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="save" value="Save"></td>
                        </tr>
                    </table>
                </fieldset>
            </form>
        <?php
        }
        if (isset($_GET['edit'])) {
            $terms = $_GET['edit'];
            $myfile = 'terms/' . $terms . '.txt';
            $size = filesize($myfile);
            $file = fopen($myfile, 'r') or die('Cannot Open This File');
            $description = fread($file, $size);
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
                            <td>:<textarea name="description"><?php echo $description; ?></textarea></td>
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
        ?>
        <br>
        <table border="1">
            <tr>
                <th>Terms</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><a href="index.php?add=new">[Add New]</a>
                    <ul>
                        <?php
                        $scan = scandir('terms');
                        foreach ($scan as $file) {
                            if (substr($file, -4) == '.txt') {
                                $terms = substr($file, 0, -4);
                                echo "<li><a href='index.php?terms=$terms'>$terms</a></li>";
                            }
                        }
                        ?>
                    </ul>
                </td>

                <td>

                    <?php
                    if (isset($_GET['terms'])) {
                        $terms = $_GET['terms'];
                        echo "<p><b>$terms</b></p>";
                        $handle = fopen("terms/$terms.txt", "r");
                        $contents = fread($handle, filesize("terms/$terms.txt"));
                        fclose($handle);
                        print $contents;
                    ?>
                    <?php
                    }
                    ?>
                </td>

            </tr>
        </table>
</body>

</html>