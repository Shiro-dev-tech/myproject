# TSA2 - Tasks for Today Management System

This project is for Technical Summative Assessment 2 in IT0049 Web System Technologies.

It extends the Tasks for Today Management System from TSA1 by adding full CRUD and authentication.

## Features

- Welcome page showing today's tasks
- Full Task List
- Add new tasks
- Edit and update tasks
- Archive tasks using soft deletion
- Task validation
- User login
- Hashed password verification
- Session authentication
- Protected task management actions
- Public Welcome, Task List, Profile, and About pages

## Test Login

Username: demo_user
Password: password123

## Database

The database export is included as:

`tasks_tsa2_db.sql`

The database contains:

- tasks
- users

Archived tasks use the `is_archived` field instead of being permanently deleted.

## How to Run

1. Download or clone the project.
2. Install the required dependencies using Composer.
3. Import `tasks_tsa2_db.sql` into MySQL.
4. Configure the database connection in `.env`.
5. Open the project folder in a terminal.
6. Run:

   `php spark serve`

7. Open `http://localhost:8080`.

## Framework

CodeIgniter 4 (yesYES)