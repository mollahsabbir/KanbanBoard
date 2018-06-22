<?php
    if(isset($_POST['submit'])){
        require_once('connectsql.php');

        $sql = "DELETE FROM projects WHERE project_name=\"" .$_GET['project'] ."\"";
        
        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost/kanbanboard/index.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();    
    }
?>