# Midterm Project - Point-of-Sale System

This project is a complete Point-of-Sale (POS) System developed using CodeIgniter 4 for IT0049 Web System Technologies.

## Features

- Product Management
  - View products
  - Add products
  - Edit products
  - Archive products
  - Product image upload and preparation
  - Stock quantity management

- Customer Management
  - View customers
  - Add customers
  - Edit customers
  - Delete customers

- Staff Management
  - View staff accounts
  - Add staff accounts
  - Edit staff accounts
  - Delete staff accounts
  - Avatar upload and preparation
  - Hashed passwords

- Authentication
  - Staff login
  - Password verification
  - Session-based authentication
  - Protected management pages
  - Logout

- Sales
  - Record a sale
  - Select a product
  - Optional customer selection
  - Enter quantity
  - Automatic total price calculation
  - Automatic stock reduction
  - Prevent sales that exceed available stock
  - Archived products cannot be sold

- Sales History
  - Product
  - Customer
  - Staff member
  - Quantity
  - Total price
  - Date and time

## Test Login

Username: admin  
Password: password123

## Database

The final database export is included as:

`pos_sys.sql`

The database contains the following main tables:

- products
- customers
- users
- sales

Products use an `is_archived` field so archived products remain available for historical sales records.

## Setup

1. Download or clone the repository.
2. Install the required dependencies using Composer.
3. Create a MySQL database named `pos_sys`.
4. Import `pos_sys.sql`.
5. Rename `env` to `.env` if necessary.
6. Configure the database connection in `.env`.
7. Make sure the required PHP extensions are enabled.
8. Open a terminal in the project directory.
9. Run:

   `php spark serve`

10. Open:

   `http://localhost:8080/login`

## Framework

CodeIgniter 4

MADE BY :

MARQI ENZO M. BONDOC
KIM ARIANNE COMMENDADOR
ETHAN BISA

COPYRIGHT TROLOLOLOLOOOLOOOLOO