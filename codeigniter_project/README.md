# KIT Madrasah CodeIgniter Project

This is the backend project for Klub Informatika dan Teknologi (KIT) Madrasah website using CodeIgniter framework.

## Features
- User authentication (Admin and Member)
- Admin can manage sliders, posts, YouTube thumbnails
- Members can create posts with featured pictures
- Database integration with MySQL or MariaDB

## Setup Instructions

1. Install PHP, MySQL/MariaDB, and Composer.
2. Clone this project.
3. Import the database schema from `database/schema.sql`.
4. Configure database settings in `application/config/database.php`.
5. Run the project on a local server (e.g., using PHP built-in server or Apache).
6. Access the site via browser.

## Database

The database schema is in `database/schema.sql`.

## Project Structure

- `application/controllers` - Controllers for handling requests
- `application/models` - Models for database interaction
- `application/views` - Views for frontend pages
- `public` - Public assets and entry point

## Notes

- File uploads are stored in `uploads/` directory.
- Passwords are hashed for security.
