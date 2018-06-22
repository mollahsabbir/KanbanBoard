<!DOCTYPE HTML>

<html>

    <head>
        <title>
            <?php
                echo $_GET['project']
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
                <div>
                    <p>Hello</p>
                </div>

            </div>
            <div class="second-column">
                <h3>Doing</h3>
                <div>
                    <p>Hello</p>
                </div>
                
            </div>
            <div class="third-column">
                <h3>Done</h3>
                <div>
                    <p>Hello</p>
                </div>
            </div>
        </div>
    </body>


</html>