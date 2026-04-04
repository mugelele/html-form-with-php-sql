This is a simple web-pae that allows users to register student information through an HTML form. The project is designed to be self-configuring, meaning the PHP script handles the creation of the database and tables automatically upon the first submission.

🚀 How to Run on Localhost
To run this project on your computer, follow these steps:

1. Requirements
Install a local server environment like XAMPP, WAMP, or Laragon.

Ensure Apache and MySQL services are running.

2. File Setup
Navigate to your local server's root directory (usually C:/xampp/htdocs/).

Create a new folder named student-registration.

Place both index.php and action.php into that folder.

3. Database Configuration
The script is configured to connect to localhost using the username root with no password.

Note: You do not need to manually create the database in phpMyAdmin. The code will automatically create a database named students_db and a table named student_info the first time you interact with the form.

4. Running the App
Open your web browser.

Type localhost/student-registration/index.php in the address bar.

Fill out the form and click Submit.

You should see a message saying: "new student registered successfully".

🛠️ Features
Auto-Configuration: Automatically creates students_db and the student_info table if they don't exist.

Prepared Statements: Uses MySQLi prepared statements to protect against SQL injection.

if you find any bug feel free to fix it

Responsive Form: Includes fields for First Name, Second Name, Email, and Gender selection.
