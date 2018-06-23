<?php
    if(isset($_POST['submit'])){

        //Removing from both Tables every entry that belong to a project
        require_once('connectsql.php');

        $sql = "DELETE FROM projects WHERE project_name=\"" .$_GET['project'] ."\"";
        
        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost/kanbanboard/index.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $sql = "DELETE FROM tasks WHERE project_name=\"" .$_GET['project'] ."\"";
        
        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost/kanbanboard/index.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();    
    }
?>