<?php
  $con = mysqli_connect("localhost", "root", "", "bookstor");
  mysqli_autocommit($con, True);
  mysqli_set_charset($con, 'utf8');

  if(isset($_POST["key"]) && isset($_POST["value"])){
      if( $_POST["key"] == "province" ) {

        $sql = "SELECT provinceid from province where name = '".$_POST["value"]."';";
        $query = mysqli_query($con,$sql);
        $row1 = mysqli_fetch_assoc($query);
        $id = $row1['provinceid'];

        $sql1 = "SELECT * from district where districtid = 0";
        $result = $con->query($sql1);
        $rowr = $result->fetch_assoc();
        echo("<option value=\"".$rowr['name'] ."\">".$rowr['name'] ."</option>");

        $sql_add = "SELECT * FROM district where provinceid = '".$id ."';";
        $query_add = mysqli_query($con,$sql_add);
        if (mysqli_num_rows($query_add) > 0){
          while($row = mysqli_fetch_assoc($query_add)){
            echo("<option value=\"".$row['name'] ."\">".$row['name'] ."</option>");
          }
        }

      } else if ( $_POST["key"] == "district" ) {

        $sql = "SELECT districtid from district where name = '".$_POST["value"]."';";
        $query = mysqli_query($con,$sql);
        $row1 = mysqli_fetch_assoc($query);
        $id = $row1['districtid'];
        
        $sql1 = "SELECT * from ward where wardid = 0";
        $result = $con->query($sql1);
        $rowr = $result->fetch_assoc();
        echo("<option value=\"".$rowr['name'] ."\">".$rowr['name'] ."</option>");

        $sql_add = "SELECT * FROM ward where districtid = '".$id ."';";
        $query_add = mysqli_query($con,$sql_add);
        if (mysqli_num_rows($query_add) > 0){
          while($row = mysqli_fetch_assoc($query_add)){
            echo("<option value=\"".$row['name'] ."\">".$row['name'] ."</option>");
          }
        }

      } 
  }
  
?>