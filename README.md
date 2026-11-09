JOB APPLICATION FORM - PHP AND MYSQL
=====================================

FILES
-----
index.php      Form, PHP validation and database insertion
db.php         MySQL connection settings
database.sql   Database and applicants table creation script
style.css      Simple CSS styling

REQUIREMENTS
------------
- PHP 7.4+ (PHP 8+ recommended)
- MySQL or MariaDB
- Apache/local server such as XAMPP, WAMP or LAMP
- PHP PDO MySQL extension enabled

HOW TO RUN USING XAMPP
---------------------
1. Extract the folder "php_assignment_1" into:
   C:\xampp\htdocs\

2. Start Apache and MySQL from the XAMPP Control Panel.

3. Open phpMyAdmin:
   http://localhost/phpmyadmin

4. Select the Import tab, choose database.sql from this folder,
   and click Import/Go. This creates the database and table.

5. Open db.php and change the MySQL username/password if your
   local MySQL setup uses different credentials.
   The default XAMPP settings are often username "root" and
   an empty password.

6. Open this page in your browser:
   http://localhost/php_assignment_1/

VALIDATION INCLUDED
-------------------
- Name: regular expression allows letters, spaces, apostrophes
  and hyphens (2 to 50 characters).
- Email: PHP FILTER_VALIDATE_EMAIL.
- Mobile: regular expression checks a 10-digit Indian mobile
  number beginning with 6, 7, 8 or 9.
- Username: 4 to 20 letters, numbers or underscores.
- Password: at least 8 characters, one number, one uppercase
  letter and one lowercase letter.

DATABASE AND SECURITY
---------------------
- Uses PDO prepared statements to insert data safely.
- Passwords are stored as secure password hashes using
  password_hash(), never as plain text.
- Email and username must be unique.

NOTE
----
This is a simple educational assignment. The mobile number
regular expression is set for the common Indian 10-digit format.
You can change it in index.php if your assignment expects a
different country's mobile number format.


VIEWING APPLICANT RECORDS
------------------------
After setting up the database and running the project, open:

http://localhost/php_assignment_1/view_applicants.php

This page fetches all saved applicant records from the applicants
table and displays Name, Email, Mobile Number and Username in a
table. It does not display password hashes.

For a real website, protect this records page with administrator
login/authentication because applicant details are private.
