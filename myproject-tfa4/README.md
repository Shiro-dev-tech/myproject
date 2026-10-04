# TFA4 - Sessions and Authentication

This project is for Technical Formative Assessment 4 in IT0049 Web System Technologies.

It extends the POS application from TFA3 by adding login authentication, sessions, protected routes, and logout.

## Features

- Staff login page
- Hashed passwords
- Password verification
- Login sessions
- Authentication filter
- Protected Customer Accounts pages
- Protected User Accounts pages
- Logout functionality
- Customer management
- User management
- Avatar upload and display

## Test Login

Username: admin01
Password: password123

## Database

The database export is included in:

`pos_tfa4_db.sql`

## How to Run

1. Download or clone the project.
2. Install the required dependencies using Composer.
3. Import `pos_tfa4_db.sql` into MySQL.
4. Configure the database connection in `.env`.
5. Make sure the PHP GD extension is enabled.
6. Run:

   `php spark serve`

7. Open `http://localhost:8080/login`.

## Framework

CodeIgniter 4 (this also took everything from me)