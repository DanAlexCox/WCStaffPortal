Women's Consortium Staff Portal Repository:

Main navigation page for staff member of Women's Consortium.

Fixes to be implemented:
1. Use database "WC-database.SQL" in WCContactDB repository:
    - staff_user is the staff login with database
    - let me know what you want your login to be so it can be added through hash on the SQL
    - ensure calls to the database are included to get sql data
    - ensure sql injection doesn't take place
2. index.html: 
    - if it is meant to be login.php then remove
3. dashboard.html:
    - if it is meant to be dashboard.php then remove
4. login.php:
    - when connecting to database, change username input to email
    - ensure password check is for password hashed ONLY for security
    - CSS wrong filename called. In code mentions css folder but no folder is present
    - sanitise inputs
    - "Invalid username or password" can indicate valid usernames to attackers, use generic error message
    - missing CSRF, include CSRF token in the form and verify it on submission
    - ensure code doesn't include any mention of login details, keep it encrypted and not prone to attackers
    - minor correction-remove "!" from "Welcome, /username/!" for professionalism

5. dashboard.php:
    - CSS wrong filename called. In code mentions css folder but no folder is present
6. dashboard.js:
    - it is included but only in dashboard.html not dashboard.php
7. Script.js:
    - should be lowercase
    - it is included but only in index.html not login.php
8. Organise your files into directories where relevent
9. Divide CSS into smaller CSS files with different names (since login.php will never use any section) and change CSS calls where relevent

Next steps after fixes:
1. login.php:
    - make the error message popout so it doesnt disrupt the main body
    - add a message saying you have successfully logged out (and in logout.php)
1. add an account/settings section for users if they choose to personalise their experience (eg. light/dark mode):
    - should you want extra columns/new table added to the database ask me



