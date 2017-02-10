# hep-lab-inventory
This repository includes PHP code for a public web interface displaying the UCSB HEP Lab inventory. Ubuntu16, Apache2, MySQL and PHP7 are used.

## Git Ignore

Git is ignoring a file called '/includes/config.php'. You will need to create your own with the following format. 
    Replace the angle bracketed values with constants from your MySQL database (e.g. localhost, johan, pswd, heplab)


```
<?php
  define('server', '<servername>');
  define('user', '<username>');
  define('password', '<password>');
  define('name', '<databasename>');
?>
```

Git is also ignoring the directory /public/images
  You must create this directory and populate it with contents from:
   http://strange.physics.ucsb.edu/webpages/public/images/
   
## Database Structure

Please see create_table.txt for list of tables and outputs of command
```
SHOW CREATE TABLE <tablename>;
```
