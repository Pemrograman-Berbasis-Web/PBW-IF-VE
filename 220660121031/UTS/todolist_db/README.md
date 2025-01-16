To-Do List Application

This is a web-based To-Do List application developed with PHP, JavaScript, and CSS. The application allows users to add, complete, and delete tasks in a user-friendly interface. The project is structured with separate assets for front-end styling and scripting, a PHP-based back-end for handling requests, and database models to support CRUD operations.

Project Structure
Folder Organization
assets/: Contains JavaScript and CSS files to enhance the front-end experience.

css/: Holds the CSS styles used to design the application interface, making it clean, responsive, and visually appealing.
js/: Contains JavaScript files that enable task interactivity, including marking tasks as completed, deleting tasks, and adding new ones.
config/: Manages the database configuration and establishes a connection between the application and the database.

models/: Consists of PHP classes representing the data model and handling database operations (CRUD) for the To-Do items.

controllers/: Manages the business logic of the application, handling requests from the front-end and updating the model accordingly.

views/: Holds the view templates written in HTML/PHP, which render the interface for users to interact with the application.

Front-End Overview
The assets folder includes:

CSS Styling:

The CSS file resets default styling and provides custom styles for the task list interface.
Buttons are styled to have a consistent look, with colors and hover effects to improve user interaction.
Each task is presented in a card-like format with spacing, background color, and subtle shadowing for visual hierarchy.
JavaScript for Task Interactivity:

JavaScript handles button clicks, allowing tasks to be marked as completed or deleted without reloading the page.
AJAX requests are used to communicate with the server asynchronously, enhancing the user experience by updating the list in real time.
Back-End Overview
Database Configuration:

config/Database.php: This file contains the credentials and connection settings for the MySQL database, which stores the to-do tasks.
The database uses a table called todos with columns for task details, completion status, creation date, and update date.
Data Model:

models/TodoModel.php: This class is the primary data model, containing functions to create, read, update, and delete tasks. Each task includes an ID, task text, and status.
Controller:

controllers/TodoController.php: This controller handles user actions, such as adding, updating, and deleting tasks. It receives requests from the front-end, interacts with the TodoModel to perform the desired operations, and returns the result to the front-end.
Views:

views/listTodos.php: The main view template renders the To-Do list and includes buttons for adding, completing, and deleting tasks. It also displays any messages or updates for the user.
How to Set Up and Run the Application
Clone the repository to your local machine.
Set up a MySQL database named todolist_db.
Import the database schema, if available, to create the necessary tables for storing tasks.
Open config/Database.php and configure the database connection settings with your database host, username, password, and database name.
Start a local server (e.g., with XAMPP or WAMP), and navigate to index.php in your browser to start using the application.
Key Features
Add a Task: Users can type in a task description and add it to the list. The new task is saved in the database and appears in the UI immediately.
Mark as Completed: Users can mark tasks as completed by clicking a button. Completed tasks have a strikethrough style to indicate their status.
Delete a Task: Users can remove tasks from the list. This action also removes the task from the database.
Dynamic Interface: The use of JavaScript and AJAX enables real-time updates without refreshing the page, creating a seamless experience.
Technical Details
Database: MySQL is used to store task information, including the task description, its completion status, and timestamps for creation and updates.
AJAX Requests: JavaScript AJAX calls allow for asynchronous updates, so the page does not need to reload after each task action (add, complete, delete).
Object-Oriented PHP: The application is structured in an MVC pattern, with clear separation between the data model, controller logic, and front-end view