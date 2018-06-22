<?php
    if(isset($_POST['submit'])){
        require_once('connectsql.php');

        $project_name = trim($_POST['project_name']);
        $project_details = trim($_POST['project_details']);

        $sql = "INSERT INTO projects( project_name, project_details) VALUES ('" .$project_name ."','". $project_details."')";
        

        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost/kanbanboard/index.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


        $conn->close();
        
    }
?>