# Project Name

## Description

This project is a PHP and HTML application that interacts with a MySQL database. It allows users to execute SQL queries on the database and retrieve the results in CSV format. The PHP backend handles the database connection, query execution, and CSV generation, while the HTML frontend provides a simple form for users to input their database credentials and SQL queries.

## Usage

1. Clone the repository to your local machine.
2. Open the project in a web server environment that supports PHP.
3. Configure your database connection parameters in the HTML form.
4. Enter your SQL query in the provided text area.
5. Click the "Execute" button to run the query.
6. If the SQL query contains Data Definition Language (DDL) statements, an error will be displayed, and the query won't be executed.
7. If the query is successful, the results will be displayed in CSV format.

## Project Structure

- **index.html**: Contains the HTML form for entering database credentials and SQL queries.
- **DB.php**: Defines the `Database` class, responsible for handling database connections, executing queries, and fetching results.
- **executeQuery.php**: Processes the form submission, executes the SQL query, and generates CSV output.

## PHP Code

### DB.php

This file contains the `Database` class, which is responsible for managing database connections.

### executeQuery.php

This file processes the form submission, checks for DDL statements in the SQL query, executes the query, fetches and displays the results in CSV format.

## HTML Code

### index.html

This file provides a simple form for users to input their database credentials and SQL queries.

## Dependencies

- This project relies on PHP and a web server environment with MySQL support.

## Notes

- Ensure that your PHP environment is configured correctly and has the necessary permissions to connect to the MySQL database.

## Disclaimer

This project is intended for educational purposes and may require additional security measures before deployment in a production environment. Always validate and sanitize user inputs to prevent SQL injection and other security vulnerabilities.
