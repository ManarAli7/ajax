<?php
    require 'db_connect.php';
    $sqlselect = $conn->query("SELECT name FROM table_depart WHERE name_depart='".$_POST["depart"]."'")->fetchAll();
    foreach($sqlselect as $row) {

    $name = $row["name"];
    echo '<div style="background: #DDD; width:100px;margin:10px; padding:10px">'. $name . "</div></br>";
                
    } 
            

    ?>