<!DOCTYPE HTML>

<html>

    <head>
        <title>
            <?php
                echo $_GET['project'];
            ?>
        </title>
        <link rel="stylesheet" href="taskboard.css">
    </head>

    <body>

        <div>
            <h3 align="center">The Kanban Board</h3>
            <h2 align="center"><?php
                    echo $_GET['project']
                ?>
            </h2>
            <a align="center" href="index.php">Main Page</a>
        </div>

        <div class="wrapper">
            <div class="first-column">
                <h3>To-Do</h3>
                <?php
                    include('connectsql.php');
                    
                    $sql = "SELECT task_title, task_details FROM tasks WHERE project_name='" . $_GET['project'] ."' and task_status='To-Do'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<div><p>".$row["task_title"] . "</br>";
                            echo $row["task_details"] . "</p></div>";
                        }
                    } 
                    $conn->close();
                ?>

            </div>
            <div class="second-column">
                <h3>Doing</h3>
                <?php
                    include('connectsql.php');
                    
                    $sql = "SELECT task_title, task_details FROM tasks WHERE project_name='" . $_GET['project'] ."' and task_status='Doing'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<div><p>".$row["task_title"] . "</br>";
                            echo $row["task_details"] . "</p></div>";
                        }
                    } 
                    $conn->close();
                ?>
                
            </div>
            <div class="third-column">
                <h3>Done</h3>
                <?php
                    include('connectsql.php');
                    
                    $sql = "SELECT task_title, task_details FROM tasks WHERE project_name='" . $_GET['project'] ."' and task_status='Done'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<div><p>".$row["task_title"] . "</br>";
                            echo $row["task_details"] . "</p></div>";
                        }
                    } 
                    $conn->close();
                ?>
            </div>
        </div>
    </body>


</html>