<?php
    
    require_once('connectsql.php');
    $task_title = trim($_POST['task_title']);
    $project_name = trim($_POST['project_name']);
    $task_status = trim($_POST['task_status']);

    if(isset($_POST['delete'])){
        $sql = "DELETE FROM tasks WHERE project_name ='" .$project_name ."' and task_title ='" .$task_title . "'";
        

        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost/kanbanboard/taskboard.php?project=' . $project_name );
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


        // $conn->close();
        
    }

    if(isset($_POST['move'])){
        $next_task_status = "";

        if( $task_status == "To-Do" ){
            $next_task_status = "Doing";
        }
        else if( $task_status == "Doing" ){
            $next_task_status = "Done";
        }

        $sql = "UPDATE tasks
            SET task_status = '". $next_task_status ."'
            WHERE task_title = '". $task_title ."' and project_name = '". $project_name ."'";
        

        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost/kanbanboard/taskboard.php?project=' . $project_name );
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


        $conn->close();
        
    }

?>