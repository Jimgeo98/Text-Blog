<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Connect</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">
        <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <style>

            body{
                background-color: lightcyan;
                font-family: 'Kanit', sans-serif;
            }

            .btn{
                display: flex;
                justify-content: center;
                margin-top: 20px;
            }

            .btn .btn-danger a{
                text-decoration: none;
                color: white;
            }
        </style>

    </head>
    <body>

    <?php

        //Create variables

        $username = filter_input(INPUT_POST,'name');
        $password = filter_input(INPUT_POST,'password');


        //Create variables

        $host = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $dbname = "conn";


        //Create Connection

        $conn = new mysqli( $host, $dbuser , $dbpassword , $dbname );


        if (mysqli_connect_error()) {
            die('Connect Error ('.mysqli_connect_errno() .') '. mysqli_connect_error());
        }
        else {
            $sql = "INSERT INTO visitors (Name,Password)
            values ('$username' , '$password')";

            if ($conn->query($sql)) {
                echo "<h1 style='color: green; display: flex; justify-content: center; margin-top: 100px;'>
                    Successfully insert new record !
                    </h1>";

            }else {
                echo "<h1>Error: </h1>". $sql . "<br>" . $conn->error. " <h1>record cannot be inserted</h1>";
            }

            $conn->close();
        }

    ?>

        <div class="btn">
            <button type="submit" class="btn btn-danger"><a href="index.html">Return</a></button>
        </div>
        
 
    </body>
</html>


