INSTRUCTIONS FOR XAMPP DEPLOYMENT
=================================

This folder contains your complete PHP, HTML, and CSS project.
Ignore all other files in the Replit project (like client/, server/, node_modules/).
Those are just for the online editor.

HOW TO INSTALL:

1. Copy this entire 'php_version' folder to your XAMPP 'htdocs' directory.
   Example path: C:\xampp\htdocs\medicare_plus

2. Start Apache and MySQL in XAMPP Control Panel.

3. Go to http://localhost/phpmyadmin/
   - Click "New" to create a database.
   - Name it: medicare_plus
   - Click "Import" tab.
   - Choose the file: 'database_schema.sql' from this folder.
   - Click "Go".

4. Configure Database Connection (if needed):
   - Open 'db_connect.php'.
   - Default XAMPP settings are usually:
     $servername = "localhost";
     $username = "root";
     $password = ""; (empty)
   - If you have a password for MySQL, update it in this file.

5. Open your browser and go to:
   http://localhost/medicare_plus/

FILES INCLUDED:
- index.php (Home Page)
- login.php & register.php (User Accounts)
- dashboard.php, admin_dashboard.php, doctor_dashboard.php (User Portals)
- doctors.php, services.php (Public Pages)
- book_appointment.php (Booking System)
- assets/ (Images and CSS)
- database_schema.sql (Database File)

NO TSX or JS FRAMEWORKS were used in this folder.
It uses standard HTML, CSS (via style.css and Tailwind CDN), and PHP.
