<?php

    function check(){
        //get user input
        $username = $_GET['username'];

        if($username == ""  ){//check if input or post isempty
          echo"You must input a username";
          exit();
        }

        // Create connection
        $mysqli = new mysqli("mysql.eecs.ku.edu", "b702t209", "Jiyuu4pi", "b702t209");

        /* check connection */
        if ($mysqli->connect_error) {
            printf("Connect failed");
            exit();
        }

        $query = "SELECT user_id FROM Users WHERE user_id = " . $username;

        //Checks if value is in database
        $result = @mysqli_query($mysqli, $query);

        //the value to be instered
        $sql = "INSERT INTO Users (user_id)
        VALUES (?)";
        //prep database
        $stmt = mysqli_prepare($mysqli , $sql);
        //puts data into correct formate
        mysqli_stmt_bind_param($stmt, "s", $username);
        //puts data into database
        mysqli_stmt_execute($stmt);
        //checks if was put in database
        $affected = mysqli_stmt_affected_rows($stmt);

        if($affected == 1){
          printf("\nGreat '" . $username . "' was entered as a user id");
        }else{
          echo"Username '" .$username . "' already exsit";
        }

        //end connection
        $mysqli->close();
    }

    check();
?>
