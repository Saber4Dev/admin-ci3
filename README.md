# CodeIgniter-3.1.4

CodeIgniter-3.1.4 Basic Set Up

CodeIgniter Framework
Overview
This is a basic CodeIgniter Framework set up for web development. The framework is organized with a Model-View-Controller (MVC) architecture. It includes the following components:

Controllers for managing the application logic and controlling the flow of data between the Model and View.
Models for handling database interactions.
Views for rendering user interfaces.
The framework also includes a set of pre-built views and models for users and clients.

Installation
Download the project and place it in your web server's htdocs folder.
Rename the project folder as _admin-ci3_.
Import the database admin-ci3.sql into your MySQL server.
Update the application/config/database.php file with your MySQL database details.
Usage
To access the application, navigate to the following URL:

arduino
Copy code
http://localhost/_admin-ci3_/
Login
To access the admin panel, login using the following credentials:

makefile
Copy code
Username: john.doe@example.com
Password: password123
Controllers
Admin.php: handles admin-specific functionalities, such as managing clients and user profiles.
Auth.php: handles user authentication.
Home.php: handles the home page.
User.php: handles user-specific functionalities, such as updating their profile.
Models
Client_model.php: handles client-related database operations.
Users_model.php: handles user-related database operations.
Views
admin/dashboard.php: admin dashboard view.
admin/profile.php: admin profile view.
admin/user/clients.php: admin view for managing clients.
auth/login.php: login page view.
auth/logout.php: logout page view.
auth/register.php: registration page view.
errors/page404.php: 404 page not found view.
home.php: home page view.
welcome_message.php: welcome message view.
Helpers
common_helper.php: contains helper functions used throughout the application.
Templates
templates/footer.php: footer template.
templates/header.php: header template.
templates/sidebar.php: sidebar template.
Credits
This framework was developed by Saber and is licensed under the MIT License. If you have any questions or feedback, please contact Saber.adraoui@gmail.com.
