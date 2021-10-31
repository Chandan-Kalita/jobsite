<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        nav{
            display: flex;
            width: 100%;
            justify-content: space-around;
        }
        nav > a{
            font-size: 25px;
            text-decoration: none;
            color: #fff;
            background-color: #000;
            padding: 10px;
        }
        a{
            text-decoration: none;
            color: #000;
            background-color: #fff;
            padding: 4px;
        }
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        td{
            height: 40px;
            padding: 5px;
        }
        .container{
        width: 100%;
        background-color: #000;
        color: #fff;
        margin-top: 10px;
        padding: 10px;
        }
        table{
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Post</a>
            <a href="">Applications</a>
            <a href="logout.php">Hey <?php echo $_SESSION['name'] ?> > Logout</a>
        </nav>
    </header>
</body>
</html>