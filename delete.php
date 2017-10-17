<?php
    
    include "./functions.php";

    $conn = getConnection();

    $Id = $_GET['id'];

    deleteAnswer($Id);

    header('Location: '."insert.php");

?>
