<?php
    if(isset($_POST['addtask'])){
        require_once('connectsql.php');

        $task_title = trim($_POST['task_title']);
        $task_details = trim($_POST['task_details']);
        $project_name = trim($_POST['project_name']);
        $task_status = trim($_POST['task_status']);
        
        //echo  $task_title . " " . $task_details . " " . $project_name . " " . $task_status . " " ;

        $sql = "INSERT INTO tasks( task_title, project_name, task_details , task_status) VALUES ('" .$task_title ."','". $project_name ."','".$task_details ."','".$task_status."')";
        

        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost/kanbanboard/taskboard.php?project=' . $project_name );
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


        $conn->close();
        
    }
?>