<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=Content-Type content="text/html; charset=utf-8">
        <title>Spoon Management</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse" style="background-color: orange;">
    <a class="navbar-brand pull-middle" href="#"><strong>Manage Khun Spoon Data</strong></a>
</nav>

<?php 

    include "./functions.php";

    if ($result = getReplyMessages()) {

        echo '<table class="table-bordered">';
        echo '<thead>';
        echo '<tr> <th>Delete</th> <th>Keywords</th> <th>Answers</th> </tr>';
        echo '</thead><tbody>';
            while ($obj = $result->fetch_object()) {
                echo '<tr>';
                    echo '<td><a href="delete.php?id='.$obj->Id.'" role="button" class="btn btn-danger">del</a></td>';
                    echo '<td>'.$obj->key.'</td><td>'.$obj->ans."</td>";
                echo '</tr>';
            }
        echo '</tbody></table>';

        $result->close();

    }

?>
</body>
</html>
