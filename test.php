<?php 
    if(isset($S_POST['submit']))
    {
        $fname = $S_POST['fname'];
        echo $fname."<br>";
        // echo $S_POST['lname']."<br>";
        // echo $S_POST['pass']."<br>";
        // echo $S_POST['email']."<br>";
        // if($S_POST['fname'] != "merlin")
        // {
        //     echo "wrong first name";
        // }
        // if($S_POST['lname'] != 'arthur')
        // {
        //     echo "wrong first name";
        // }
        // if($S_POST['pass'] != 'password')
        // {
        //     echo "wrong first name";
        // }
        // if($S_POST['cpass'] != 'password')
        // {
        //     echo "wrong first name";
        // }
        // if($S_POST['email'] != 'merlinarthur@example.com')
        // {
        //     echo "wrong first name";
        // }
        // else{
        //     echo "success";
        // }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="fname"><br>
        <!-- last name <input type="text" name="lname"><br>
        password <input type="password" name="pass"><br>
        confirm password <input type="password" name="cpass"><br>
        email <input type="email" name="email"><br> -->
        <input type="submit" name="submit"><br>
    </form>
</body>
</html>