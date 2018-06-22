<!DOCTYPE html>
<html>
    <head>
        <title>KanBanMap</title>
    </head>

    <body>
        
        <div class="inputproject">
            <form action="http://localhost/kanbanboard/addproject.php" method="post">
                <b>Add a new Project</b>
                <p>Project Name: 
                    <input type="text" name="project_name" size="30" value="" required/>
                </p>
                <p>Project Description: 
                    <input type="text" name="project_details" size="30" value="" />
                </p>
                
    
                <p>
                    <input type="submit" name="submit" value="add" />
                </p>
            </form>
        </div>

        <div class="displayprojects">
            <?php
                require_once('connectsql.php');

                
                $sql = "SELECT project_name, project_details FROM projects";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<a href=\"taskboard.php?project=".$row["project_name"] . "\">". $row["project_name"]. " - Description: " . $row["project_details"] ."</a>" ."<br>";
                        echo "
                            <form action=\"http://localhost/kanbanboard/deleteproject.php?project=" .$row["project_name"] ."\" method=\"post\">
                                    <input type=\"submit\" name=\"submit\" value=\"Delete\" />
                            </form>
                        ";
                    }
                } else {
                    echo "Create your first project!";
                }
                $conn->close();
            ?>
        </div>
    </body>

</html>
