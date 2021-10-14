<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<html>
    
<body>
<?php
        require 'db_connect.php';
        function fundepart($conn){
            $sqlselect = $conn->query("SELECT DISTINCT name_depart FROM table_depart")->fetchAll();
            $output = '';
            foreach($sqlselect as $row) {

                $name_depart = $row["name_depart"];
                $output .= '<option value="'.  $name_depart.'" name ="'.  $name_depart.'" >"'. $name_depart.'"</option>';
                
            }
            return $output;
            
        }

        echo  '<select id="select">';
        echo fundepart($conn);
        echo '</select>';
    
        if(isset($_POST['depart'])){
            $sqlselect = $conn->query("SELECT name FROM table_depart WHERE name_depart='".$_POST["depart"]."'")->fetchAll();
           
            foreach($sqlselect as $row) {

                $name = $row["name"];
               echo '<div>' .$name.'</div>';
                
            } 
            
        }
     

    ?>
     <script src="jquery-3.6.0.min.js"></script>
     <script>
        $(document).ready(function() {
            $('#select').change(function() {
                var depart = $(this).val();
                console.log(depart);
                $.ajax({
                    method: "POST",
                    url: 'index.php',
                    data: {depart: depart},
                    success: function(data){
                        console.log(data);
                    }
                });
            });
        });
    </script>
    
</body>

</html>