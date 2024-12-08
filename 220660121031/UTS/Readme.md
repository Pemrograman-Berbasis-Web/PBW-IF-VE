# To-Do List Application Documentation
[![N|Solid](https://cldup.com/dTxpPi9lDf.thumb.png)](https://nodesource.com/products/nsolid)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)
## Project Overview
This is a web-based To-Do List application developed using PHP, JavaScript, and CSS. The app allows users to manage tasks by adding, marking as completed, and deleting tasks. It offers a smooth and interactive user experience using AJAX for real-time updates without refreshing the page.
## Features

- Add a Task:
Users can type a task description and add it to the list. The task is saved in the database and displayed immediately in the UI.
- Mark as Completed:
Tasks can be marked as completed, which updates the task status both visually (with a strikethrough) and in the database.
- Delete a Task:
Tasks can be removed from the list. This action also deletes the task from the database
- Dynamic User Interface:
Using JavaScript and AJAX, actions such as adding, marking as completed, or deleting tasks update the list in real-time without the need to reload the page.

## Tech
- The app uses several technologies to provide a seamless experience:

- PHP: Server-side scripting language used for back-end operations.
- JavaScript: Client-side scripting for dynamic interactivity, including AJAX for real-time updates.
= CSS: Styling for a clean, responsive, and visually appealing interface.
- MySQL: A relational database to store task data such as task text, completion status, and timestamps.
- AJAX: For asynchronous operations, ensuring tasks are updated without page reloads.

## Project Structure Overview
- 1. Front-End:
assets/
css/: Styles the To-Do List interface.
js/: Contains JavaScript files for handling task interactions (adding, deleting, marking as complete).


- 2. Back-End:
config/
Database.php: Manages the database connection to MySQL.
models/
TodoModel.php: Defines the data model and CRUD operations for tasks in the database.
controllers/
TodoController.php: Manages the logic of the application by interacting with the model and returning the result to the view.
views/
listTodos.php: The main view for rendering the To-Do list interface, displaying tasks, and handling user interactions.

## Database Configuration
1. create MySQL Database:
- Create a database named todolist_db.
- Example SQL to create the todos table :
```sh
bash
CREATE TABLE todos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task_text VARCHAR(255) NOT NULL,
    completed TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

2. configure Database Connection :
- Update config/Database.php with your MySQL credentials:
```sh
PHP
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'todolist_db');
```

## Installation Guide

1. Clone the Repository:
```sh
bash
git clone <repo-url>
cd <repo-folder>
```

2. Set Up the Database:
- Follow the steps above to create the database and import the schema.
3. Configure Database Connection:
- Update config/Database.php with your MySQL database credentials.
4. Run the Application:
- Use a local server (XAMPP, WAMP, etc.) to run PHP files.
Start the server and navigate to index.php in your browser to see the app in action.

## Adding More Features
1. You can enhance the application by adding additional features such as:

2. User Authentication:
Implement login/logout functionality to allow users to have their own task lists.

3. Task Deadlines:
Enable users to set deadlines or priorities for each task.

4. Task Categories:
Add the ability to categorize tasks (e.g., Work, Personal, etc.).

5. Search and Filter Tasks:
Provide a search feature to filter tasks by their completion status or other parameters.

6. Task Sharing:
Allow users to share tasks or their entire list with others via email or social media.
For production release:

## Technical Details
Database:
The tasks are stored in a MySQL database with the following columns:

- ID: Auto-increment primary key for each task.
- task_text: The text description of the task.
- completed: A boolean (0 or 1) indicating whether the task is completed.
- created_at: Timestamp for when the task was created.
- updated_at: Timestamp for when the task was last updated.

AJAX Requests:
AJAX calls are used to handle operations like adding, updating, or deleting tasks without refreshing the page, making the interface more responsive.

## MVC Architecture:
- Model handles database operations.
- View is responsible for rendering the user interface.
- Controller processes the logic and interacts with the model and view.

## Docker Deployment
Dillinger can easily be installed and deployed using Docker.
1. Build the Docker Image:
```sh
bash
cd dillinger
docker build -t <youruser>/dillinger:${package.json.version} .
```
2. Run the Docker Image:
```sh
bash
docker run -d -p 8000:8080 --restart=always --cap-add=SYS_ADMIN --name=dillinger <youruser>/dillinger:${package.json.version}
```
3. Verify the Deployment:
Navigate to 127.0.0.1:8000 in your browser to check the deployment.


## License
This project is open-source and licensed under the MIT License. You are free to use, modify, and distribute the code.

MIT License
Free Software, Hell Yeah!

## Conclusion
The To-Do List Application is a simple yet powerful task management tool. It follows the MVC architecture for clean code separation and allows users to manage tasks efficiently. By leveraging PHP, MySQL, and AJAX, the app provides a seamless user experience, with real-time updates and no page refreshes. Expand the app with additional features to suit your needs and enjoy the power of a fully functioning to-do list!
