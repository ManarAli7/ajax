<?php
include "db_connect.php";
$arrayname = array();
$sqlselect = $conn->query("SELECT name FROM table_depart WHERE name_depart='".$_POST["depart"]."'")->fetchAll();
            
            foreach($sqlselect as $row) {

                $name = $row["name"];
                $arrayname[] = $name;
                
            }
            foreach($arrayname  as $arr) {
               echo $arr . "<br>";
                
            }

?>