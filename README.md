# Synopsis

A basic kanban board for personal usage. Completely made in HTML,CSS, PHP
![Kanban Board](screenshot.jpg, "Kanban Board")

# Functionality

Add as many projects, each of them will have a different board with To-Do, Doing, and Done tasks.
User can add, remove or change status of any task.

# Build

(tested with XAMPP)

Create the following Database in sql:
```
CREATE DATABASE kanbanboard

CREATE TABLE Projects (
    project_name varchar(20) PRIMARY KEY,
    project_details varchar(255)
); 

CREATE TABLE Tasks (
    task_title varchar(20),
    project_name varchar(20),
    
    task_details varchar(255),
    task_status varchar(10),
    PRIMARY KEY(task_title, project_name)
); 
```
* Move the project to localhost/htdocs


# Bugs

Since this is meant to be used offline and for personal purposes, it has no security features.
No Regex checking implemented. So entering some characters in the database will cause an error.
Ex: the single quote ''.
