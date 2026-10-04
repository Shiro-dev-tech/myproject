# TFA3 - Forms, Validation, and File Upload

This project is for Technical Formative Assessment 3 in IT0049 Web System Technologies.

It extends the POS application from TFA2 by adding forms, validation, editing, and avatar uploads.

## Features

- Add new customer accounts
- Add new user accounts
- Form validation
- Edit customer accounts
- Edit user accounts
- Upload user avatars
- JPG and PNG image validation
- 2MB maximum upload size
- Avatar image preparation
- Placeholder image for users without an avatar

## Database

The database export is included in:

`pos_tfa3_db.sql`

The database contains:

- customers
- users

The users table also contains an avatar field that stores the uploaded image filename.

## How to Run

1. Download or clone the project.
2. Install the required dependencies using Composer.
3. Import `pos_tfa3_db.sql` into MySQL.
4. Configure the database connection in the `.env` file.
5. Make sure the PHP GD extension is enabled for image processing.
6. Open the project folder in a terminal.
7. Run:

   `php spark serve`

8. Open `http://localhost:8080` in a browser.

## Framework

CodeIgniter 4 (THIS TOOK MY SOUL INTO THE DEPTHS OF PHP AND CODEIGNITER)