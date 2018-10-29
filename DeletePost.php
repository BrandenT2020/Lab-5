<?php

  function deletePosts(){
    $mysqli = new mysqli("mysql.eecs.ku.edu", "b702t209", "Jiyuu4pi", "b702t209");

    /* check connection */
    if ($mysqli->connect_error) {
      printf("Connect failed");
      exit();
    }

    $query = "SELECT content FROM Posts";
    $result = @mysqli_query($mysqli, $query);
    echo "Deleted post are: ";
    if($result){
      $num = 0;
      while ($rows = mysqli_fetch_array($result)) {//loop through table
          $value = $rows['content'];//get value of checkbox
          if($_post = $_GET["$num"]){//if SELECT delete
            $sql = "DELETE FROM Posts WHERE content= '$value'";
            if ($mysqli->query($sql)){
              echo "works";
            }
            echo $value;
            echo ", ";
          }
          $num ++;
      }
    }else{
      echo"something went wrong";
    }

    //end connection
    $mysqli->close();
  }

  deletePosts();
?>
