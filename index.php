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
    $sqlselect = $conn->query("SELECT DISTINCT name_depart FROM table_depart")->fetchAll();
    echo  '<select id="select">';
    foreach($sqlselect as $row) {
        $name_depart = $row["name_depart"];
        echo '<option value="'.  $name_depart.'" name ="'.  $name_depart.'" >"'. $name_depart.'"</option>';
        
    }
    echo '</select>';
    ?>

    <div id="show"></div>
    <script src="jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#select').change(function() {
                var depart = $(this).val();
                console.log(depart);
                $.ajax({
                    method: "POST",
                    url: 'connection.php',
                    data: {depart: depart},
                    success: function(data){
                        $("#show").html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>