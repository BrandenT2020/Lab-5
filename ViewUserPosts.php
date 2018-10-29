<?php

  function showPost(){
    $selected_val = $_GET['user'];

    $mysqli = new mysqli("mysql.eecs.ku.edu", "b702t209", "Jiyuu4pi", "b702t209");

    /* check connection */
    if ($mysqli->connect_error) {
      printf("Connect failed");
      exit();
    }

    $query = "SELECT content, author_id FROM Posts";
    $result = @mysqli_query($mysqli, $query);

    echo "<table>";
    if($result){
      echo '<tr><td align="left"><b> User '. $selected_val .' Posts</b>';
      while ($rows = mysqli_fetch_array($result)) {
        if($selected_val == $rows['author_id']){
          echo "<tr><td>". $rows['content'] ."</td></tr>";
        }
      }
    }else{
      echo"something went wrong";
    }
    echo "</table>";
    //end connection
    $mysqli->close();
  }
  showPost();
?>
