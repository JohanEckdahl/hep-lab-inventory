# Overview
This repository includes PHP code for a public web interface displaying the UCSB HEP Lab inventory. Ubuntu16, Apache2, MySQL and PHP7 are used.

#Important Notes

## Git Ignore

Git is ignoring a file called '/includes/config.php'. You will need to create your own with the following format. 
    Replace the first four angle bracketed values with constants from your MySQL database (e.g. localhost, johan, pswd, heplab).
    Then replace <path/to/project/root> with the path to this repo (e.g. /var/www/html/user/clone).


```
<?php
  define('server', '<servername>');
  define('user', '<username>');
  define('password', '<password>');
  define('name', '<databasename>');
  
  define('SITE_ROOT', '<path/to/project/root>');
?>
```

Git is also ignoring the directory /public/images
  You must create this directory and populate it with contents from:
   http://strange.physics.ucsb.edu/webpages/public/images/
   
## Database Structure
mysqldump.sql will be updated anytime changes are made to the table structure.

To set up the database used in this project first login to MySQL then create a database
with the name specified in your config.php file (you must have permissions to do this). Next, load the mysqldump.sql file. This can be done with the following code (do these commands in the same directory as mysqldump.sql):

```
mysql -u <username> -p
CREATE DATABASE <database_name>;
exit
mysql -u <username> -p <database_name> < mysqldump.sql
```
