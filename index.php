<?php
include 'action.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>retreave_data_from_table</title>
</head>
<body bgcolor="gray">
    <form action="action.php" method="post">
        <label for="fname">First name</label><br>
        <input type="text" placeholder="your first name" name="fname"><br>

        <label for="sname">Second name</label><br>
        <input type="text" placeholder="your second name" name="sname"><br>

        <label for="fname">Email</label><br>
        <input type="email" placeholder="enter your email" name="email"><br>

        <p>Gender</p>
        <label>Male</label>
        <input type="radio" name="gender" value="male">

        <label>female</label>
        <input type="radio" name="gender" value="female"><br><br>

        <button type="submit" name="submit">Submit</button>
        <button type="reset" name="reset">Reset</button>
    </form>
</body>
</html>