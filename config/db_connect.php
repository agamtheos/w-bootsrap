<?php

    // connect to db
    $conn = mysqli_connect('localhost', 'agam', 'agam1234', 'dbjobs');

    // check connection
    if(!$conn){
        die ('connection error: ' . mysqli_connect_error());
    }


?>