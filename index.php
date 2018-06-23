<!DOCTYPE html>
<html>
    <head>
        <title>KanbanBoard</title>
        <link rel="stylesheet" href="index.css">
    </head>

    <body>
    <b id="index-title" align="center">The<br>Kanban<br>Board</b>
        <div class="wrapper">
            <div class="inputproject">
                <form action="http://localhost/kanbanboard/addproject.php" method="post">
                    <b>Add a new Project</b>
                    <p>Project Name:</p>
                    <input type="text" name="project_name" size="30" value="" required/>
                    <p>Project Description:</p>
                    <input type="text" name="project_details" size="30" value="" />
                    <p>
                        <input type="submit" name="submit" value="Add" />
                    </p>
                </form>
            </div>

            <div class="displayprojects">
                <?php
                    require_once('connectsql.php');

                    
                    $sql = "SELECT project_name, project_details FROM projects";
                    $result = $conn->query($sql);
                    echo "<b>Your Projects</b>";
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<div class=\"project\" >
                                <div class=\"title-description\" onClick=\"location.href='taskboard.php?project=".$row["project_name"] . "'\"
                                <b>" . $row["project_name"]."</b>
                                <p>" . $row["project_details"]. "</p></div>
                                <form action=\"http://localhost/kanbanboard/deleteproject.php?project=" .$row["project_name"] ."\" method=\"post\">
                                        <input type=\"submit\" name=\"submit\" value=\"Delete\" />
                                </form></div>";
                        }
                    } else {
                        echo "<b>Create your first project!</b>";
                    }
                    $conn->close();
                ?>
            </div>
        </div>
    </body>

</html>
