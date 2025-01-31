Women's Consortium Staff Portal Repository:

Main navigation page for staff member of Women's Consortium.

Key:
1 = Complete
2 = Not complete

Fixes to be implemented:
1. Use database "WC-database.SQL" in WCContactDB repository:
    - staff_user is the staff login with database 2
    - let me know what you want your login to be so it can be added through hash on the SQL 2
    - ensure calls to the database are included to get sql data 2
    - ensure sql injection doesn't take place 2
2. index.html: 
    - if it is meant to be login.php then remove 2
3. dashboard.html:
    - if it is meant to be dashboard.php then remove 2
4. login.php:
    - when connecting to database, change username input to email 1
    - ensure password check is for password hashed ONLY for security 2 
    - CSS wrong filename called. In code mentions css folder but no folder is present 1
    - sanitise inputs 1
    - "Invalid username or password" can indicate valid usernames to attackers, use generic error message 1
    - missing CSRF, include CSRF token in the form and verify it on submission 1
    - ensure code doesn't include any mention of login details, keep it encrypted and not prone to attackers 1
5. dashboard.php:
    - CSS wrong filename called. In code mentions css folder but no folder is present 2
    - minor correction-remove "!" from "Welcome, /username/!" for professionalism 2
6. dashboard.js:
    - it is included but only in dashboard.html not dashboard.php 2
7. Script.js:
    - should be lowercase 1
    - it is included but only in index.html not login.php 2 in <head>
8. Organise your files into directories where relevent 2
9. Divide CSS into smaller CSS files with different names (since login.php will never use any section) and change CSS calls where relevent 2
10. Avoid html files when dealing with php. Remove all html files

Next steps after fixes:
1. login.php:
    - make the error message popout so it doesnt disrupt the main body 2
    - add a message saying you have successfully logged out (and in logout.php) 1
2. add an account/settings section for users if they choose to personalise their experience (eg. light/dark mode): 2
    - should you want extra columns/new table added to the database ask me



