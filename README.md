# Setup 
Open `DB.php` and change the following:
`DATABASE.NAME` to the name of your database you are connecting to
`DATABASE.USER` to the MySQL user that can access the database 
`DATABASE.PASSWORD` to the password for your MySQL user

To use this with AWS RDS, uncomment the line that has `AWS.RDS.URI.HERE` and change:
`AWS.RDS.URI.HERE` to the URL that Amazon gives you to access your database. 
**Note:** When connecting to RDS, make sure your security groups allow your VPC and/or your development environments to connect to your RDS instance

## Usage
Download and `require_once "DB.php";` to include the file. 

To instantiate the database connection, follow the example below. 

````php
<?php
	$con = DB::getConnection();
?>
````
You can then use `$con` to connect to your database and make appropriate MySQL calls. 

This is a singleton design pattern so PHP will only ever create one connection per page request at a time. 

If a connection to your database could not be established, the message (reason) will appear and kill the script.
