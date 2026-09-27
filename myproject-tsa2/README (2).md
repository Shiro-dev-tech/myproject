\# TFA2 - From Arrays to a Real Database



This project is for Technical Formative Assessment 2 in IT0049 Web System Technologies.



The project extends the POS system from TFA1 by replacing the static PHP arrays with a MySQL database.



\## Features



\- Customer Accounts page

\- User Accounts page

\- MySQL database connection

\- CustomerModel and UserModel

\- Database records retrieved using CodeIgniter Models

\- Five sample records for each table



\## Database



The database export is included in:



`pos\_db.sql`



The database contains two tables:



\- customers

\- users



\## How to Run



1\. Download or clone the project.

2\. Install the required dependencies using Composer.

3\. Import `pos\_db.sql` into MySQL.

4\. Configure the database connection in the `.env` file.

5\. Open the project folder in a terminal.

6\. Run:



&#x20;  `php spark serve`



7\. Open `http://localhost:8080` in a browser.



\## Framework



CodeIgniter 4

