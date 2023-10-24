@ CodeIgniter-3.1.4
# Basic Set Up

## CodeIgniter Framework Overview
This is a basic CodeIgniter Framework setup for web development. The framework is organized using the Model-View-Controller (MVC) architecture and includes the following components:

### Controllers
- Responsible for managing application logic and controlling data flow between the Model and View.

### Models
- Handle database interactions.

### Views
- Render user interfaces.

The framework also includes pre-built views and models for users and clients.

## Installation
1. Download the project and place it in your web server's `htdocs` folder.
2. Rename the project folder as `DASHBOARD_CI3`.
3. Import the database `admin-ci3.sql` into your MySQL server.
4. Update the `application/config/database.php` file with your MySQL database details.

## Usage
To access the application, navigate to the following URL:

```bash
http://localhost/DASHBOARD_CI3/
```

## Directories

**application/**
- Main code for the application.

**config/**
- Configuration files for the application.
  - `config.php`: Configuration options for the application.
  - `database.php`: Configuration options for the database connection.
  - `routes.php`: Routing configuration for the application.

**controllers/**
- Controller classes for the application.
  - `Admin.php`: Logic for the admin section.
  - `Auth.php`: Logic for authentication (login and registration).
  - `Home.php`: Logic for the home page.
  - `User.php`: Logic for the user section.

**helpers/**
- Helper functions for the application.
  - `common_helper.php`: Common functions used across the application.

**models/**
- Model classes for the application.
  - `Client_model.php`: Methods for accessing and manipulating client-related data.
  - `Users_model.php`: Methods for accessing and manipulating user-related data.

**views/**
- View files for the application.
  - `admin/`: View files for the admin section.
    - `dashboard.php`: Admin dashboard view.
    - `profile.php`: Admin profile view.
    - `user/clients.php`: Admin view for managing clients.
  - `auth/`: View files for the authentication section.
    - `login.php`: Login page view.
    - `logout.php`: Logout page view.
    - `register.php`: Registration page view.
  - `errors/`: View files for error pages (e.g., 404 page).
    - `page404.php`: 404 page not found view.
  - `templates/`: Template files for the application.
    - `footer.php`: Footer template.
    - `header.php`: Header template.
    - `sidebar.php`: Sidebar template.
  - `home.php`: Home page view.
  - `welcome_message.php`: Welcome page view.

**public/**
- Publicly accessible files for the application.

**assets/**
- Static assets (CSS, JS, images) for the application.

## Database

The application uses a MySQL database named `pixecbiw_saberea.sql`, which contains the following tables:

- `clients`: Data related to clients.
- `users`: Data related to users.

## Login

The application comes with an admin account with the following credentials:

- Email: `john.doe@example.com`
- Password: `password123`


## Helpers
- `common_helper.php`: Contains helper functions used throughout the application.

## Templates
- `templates/footer.php`: Footer template.
- `templates/header.php`: Header template.
- `templates/sidebar.php`: Sidebar template.

## Credits
This framework was developed by Saber and is licensed under the MIT License. For questions or feedback, please contact Saber.adraoui@gmail.com.
