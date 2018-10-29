<?php
  function maketable(){
      $mysqli = new mysqli("mysql.eecs.ku.edu", "b702t209", "Jiyuu4pi", "b702t209");

      /* check connection */
      if ($mysqli->connect_error) {
        printf("Connect failed");
        exit();
      }

      //check if username is there
      $query = "SELECT user_id FROM Users";
      $result = @mysqli_query($mysqli, $query);

      if($result){
        echo '<tr><td align="left"><b> User ID</b></td></tr>';
        while ($users = mysqli_fetch_array($result)) {
            echo "<tr><td>". $users['user_id'] ."</td></tr>";
        }
      }else{
        echo"something went wrong";
      }
      //end connection
      $mysqli->close();
  }

  makeTable();
?>
