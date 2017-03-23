# Overview
This repository includes PHP code for a public web interface displaying the UCSB HEP Lab inventory. Ubuntu16, Apache2, MySQL and PHP7 are used.

# Important Notes

## Git Ignore

Git is ignoring a file called '/includes/config.php'. You will need to create your own with the following format. 
    Replace the first four angle bracketed values with constants from your MySQL database (e.g. localhost, johan, pswd, heplab).
    Then replace '/path/to/project/root/' with the path to this repo on your machine (e.g. /var/www/html/user/clone).


```
<?php
  define('server', '<servername>');
  define('user', '<username>');
  define('password', '<password>');
  define('name', '<databasename>');
  
  define('SITE_ROOT', '</path/to/project/root/>');
?>
```

Git is also ignoring the directory /public/images
  You must create this directory and populate it with contents from:
   http://strange.physics.ucsb.edu/webpages/public/images/
   

/public/index.html is ignored allowing for personal creation.
   
## Database Structure
Nightly the inventory database is dumped into the file

```
http://strange.physics.ucsb.edu/webpages/inventory.sql
```

To set up the database used in this project first login to MySQL then create a database and user with the names specified in your config.php file. Next, load the inventory.sql file. This can be done with the following code (do these commands in the same directory as inventory.sql):

```
mysql -u root -p
CREATE DATABASE <databasename>;
CREATE USER '<username>'@'localhost' IDENTIFIED BY '<password>';
GRANT ALL PRIVILEGES ON <databasename>.* to '<username>'@'localhost';
exit
mysql -u <username> -p <database_name> < inventory.sql
```

Once the initial database and user are set up you may want to create a script similar to this one:

```
# This script can only be read and executed by its owner 
# in order to protect the database password
wget http://strange.physics.ucsb.edu/webpages/inventory.sql
mysql -u <username> -p<password> <database_name> < inventory.sql
```
which can be put in crontab or ran manually.

#Security

All url modifiers are checked against attributes of a given class and never put directly into SQL. All actions besides SELECT are performed directly on the local machine and not through apache. As stated above, configuration data specific to the database is filed in .gitignore and can only be viewed locally or over SSH. If sensitive data is to be put into MySQL it will be discluded from the public mysqldump and dumped and backed up only over a secure connection.
