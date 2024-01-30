# Social Media App

## Overview
This project is a social media platform focused on PHP, SQL, Object-Oriented Programming (OOP), and integrating with web services.
It demonstrates basic CRUD operations, database management, API integration, and more, all implemented without using any external libraries or frameworks.

## Screenshots
- **User Feed Page**
  ![User Feed](https://i.ibb.co/fq8FwPB/Screenshot-2024-01-30-at-15-06-37.png)

- **Dashboard Page**
  ![Dashboard](https://i.ibb.co/qjhwKLW/Screenshot-2024-01-30-at-15-06-41.png)

- **Birthday Posts Page**
  ![Birthday Posts](https://i.ibb.co/pRp42bj/Screenshot-2024-01-30-at-15-06-44.png)

## Database Design
![Database Design](https://i.ibb.co/DWPpf3r/database-design.png)

## Features
- Custom Database class for basic CRUD operations
- Integration with JSONPlaceholder API for fetching data
- Database schema with tables for Users and Posts
- Profile image retrieval and storage
- SQL queries for specific data retrieval tasks
- Basic web page layouts and styles

## Requirements
- PHP
- MySQL

## Project Structure
- `db-design`: Contains the database schema diagram.
- `sql`: SQL scripts for creating tables and performing queries.
- `src`: Source code directory.
  - `databases`: Database-related files.
  - `images`: Directory for storing profile images.
  - `includes`: Reusable HTML components.
  - `pages`: Individual page scripts.
  - `styles`: CSS stylesheets.
  - Other PHP scripts for handling various tasks.
- `.gitignore`: Specifies intentionally untracked files to ignore.
- `README.md`: This file providing project information.
- `screenshots`: Directory for storing screenshots of the pages.

### Setup Instructions
1. Clone the repository.
2. Create a configuration file at `src/databases/config.php` with the following format:
    ```php
    <?php
    $dbConfig = array(
        'host' => 'your_host',
        'username' => 'your_username',
        'password' => 'your_password',
        'database' => 'your_database'
    );
    ?>
    ```
   **Note:** Replace `'your_host'`, `'your_username'`, `'your_password'`, and `'your_database'` with your actual database credentials.

3. Open a Terminal.

4. Navigate to the directory where your Social Media App project is located.

5. Start the PHP built-in web server by running the following command:
    ```
    php -S localhost:8000
    ```

6. Open a web browser and navigate to `http://localhost:8000`. You should see the Social Media App running locally.

7. Enjoy the app :)
