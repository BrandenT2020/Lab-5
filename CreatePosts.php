<?php

     function post(){
        //get user input
        $username = $_GET['username'];
        $post = $_GET['post'];

        if($username == "" || $post == "" ){//check if input or post isempty
          //echo"You must input a username and post";
          exit();
        }

        $mysqli = new mysqli("mysql.eecs.ku.edu", "b702t209", "Jiyuu4pi", "b702t209");

        /* check connection */
        if ($mysqli->connect_error) {
            printf("Connect failed");
            exit();
        }

        //$query = "SELECT user_id FROM Users WHERE user_id = " . $username;
        //check if username is there
        $result = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '". $username ."'");
        if($result->num_rows == 0) {
             echo"Username '" .$username . "' was not found";
             $mysqli->close();
             exit();
        }

        //the value to be instered
        $sql = "INSERT INTO Posts (content, author_id)
        VALUES (?, ?)";
        //prep database
        $stmt = mysqli_prepare($mysqli , $sql);
        //puts data into correct formate
        mysqli_stmt_bind_param($stmt, "ss",$post, $username);
        //puts data into database
        mysqli_stmt_execute($stmt);
        //checks if was put in database
        $affected = mysqli_stmt_affected_rows($stmt);

        if($affected == 1){
          printf("\nGreat Your Post was added");
        }elseif($affected == 0){
          printf("\n   Post already exsit");
        }elseif($affected >= 2){
          printf("\n   more than 1 affected");
        }else{
          printf("\n   Post already exsit");
        }

        //end connection
        $mysqli->close();
    }

    post();
?>
