<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merisa Labex4</title>
</head>

<body>
    <h1>Terminology</h1>

    <?php
    if (isset($_GET['add'])) {
    ?>
        <form action="" method="post">
            <fieldset>
                <legend>Add New Terms</legend>
                <table border="0">
                    <tr>
                        <th>Terms </th>
                        <td><input type="text" name="terms"></td>
                    </tr>
                    <tr>
                        <th>Description </th>
                        <td><textarea id="description" name="description"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="Save"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
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
            <td>[<a href="index.php?add=new">Add New</a>]</td>
            <td></td>
        </tr>
    </table>
</body>

</html>