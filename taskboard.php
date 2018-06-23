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
            
        </div>

        <div class="wrapper">
            <div class="first-column">
                <h3>To-Do</h3>
                <?php
                    include('connectsql.php');
                    
                    $sql = "SELECT task_title, task_details, task_status FROM tasks WHERE project_name='" . $_GET['project'] ."' and task_status='To-Do'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<div><p><b>".$row["task_title"] . "</b></br>";
                            echo $row["task_details"] . "</p>";
                            echo "
                            <form action=\"http://localhost/kanbanboard/modifytask.php\" method=\"post\">
                                <input name=\"project_name\" value=\"". $_GET['project'] ."\"hidden/>
                                <input name=\"task_title\" value=\"". $row['task_title'] ."\"hidden/>
                                <input name=\"task_status\" value=\"". $row['task_status'] ."\"hidden/>
                                <input type=\"submit\" name=\"move\" value=\"->\" />
                                <input type=\"submit\" name=\"delete\" value=\"X\" />
                            </form></div>";
                        }
                    }
                    $conn->close();
                ?>

            </div>
            <div class="second-column">
                <h3>Doing</h3>
                <?php
                    include('connectsql.php');
                    
                    $sql = "SELECT task_title, task_details, task_status FROM tasks WHERE project_name='" . $_GET['project'] ."' and task_status='Doing'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<div><p><b>".$row["task_title"] . "</b></br>";
                            echo $row["task_details"] . "</p>";
                            echo "
                            <form action=\"http://localhost/kanbanboard/modifytask.php\" method=\"post\">
                                <input name=\"project_name\" value=\"". $_GET['project'] ."\"hidden/>
                                <input name=\"task_title\" value=\"". $row['task_title'] ."\"hidden/>
                                <input name=\"task_status\" value=\"". $row['task_status'] ."\"hidden/>
                                <input type=\"submit\" name=\"move\" value=\"->\" />
                                <input type=\"submit\" name=\"delete\" value=\"X\" />
                            </form></div>";
                        }
                    }
                    $conn->close();
                ?>
                
            </div>
            <div class="third-column">
                <h3>Done</h3>
                <?php
                    include('connectsql.php');
                    
                    $sql = "SELECT task_title, task_details, task_status FROM tasks WHERE project_name='" . $_GET['project'] ."' and task_status='Done'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<div><p><b>".$row["task_title"] . "</b></br>";
                            echo $row["task_details"] . "</p>";
                            echo "
                            <form action=\"http://localhost/kanbanboard/modifytask.php\" method=\"post\">
                                <input name=\"project_name\" value=\"". $_GET['project'] ."\"hidden/>
                                <input name=\"task_title\" value=\"". $row['task_title'] ."\"hidden/>
                                <input name=\"task_status\" value=\"". $row['task_status'] ."\"hidden/>
                                <input type=\"submit\" name=\"delete\" value=\"X\" />
                            </form></div>";
                        }
                    }
                    $conn->close();
                ?>
            </div>

            <div class="addtask">
                <form action="http://localhost/kanbanboard/addtask.php" method="post">
                    <b>Add a new Task</b>
                    <p>Title<br>
                    <input type="text" name="task_title" size="30" value="" required/></p>
                    <p>Description
                    <input type="text" name="task_details" size="30" value="" /></p>
                    <p>
                        <?php
                            echo "<input name=\"project_name\" size=\"30\" value=\"".$_GET['project'] ."\" hidden/>";  
                        ?>
                        <input name="task_status" size="30" value="To-Do" hidden/>
                        <input type="submit" name="addtask" value="add" />
                    </p>
                </form>
                <a align="center" href="index.php">Main Page</a>
            </div>

        </div>
    </body>


</html>