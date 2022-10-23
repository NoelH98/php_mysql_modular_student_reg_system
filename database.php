<?php
$connect = new mysqli("localhost", "root", "") or die ("check your server connection.");

mysqli_query($connect,"DROP DATABASE mdsystem");

mysqli_query($connect,"CREATE DATABASE mdsystem");

mysqli_select_db($connect,"mdsystem");

$students="CREATE TABLE students (
id int(4) NOT NULL auto_increment,
username varchar(65) NOT NULL default '',
password varchar(65) NOT NULL default '',
course varchar(65) NOT NULL default '',
year int(10) NOT NULL default '1',
PRIMARY KEY (id)
)Engine=MySQL AUTO_INCREMENT=1 ";

$course="CREATE TABLE course (
id int(4) NOT NULL auto_increment,
name varchar(65) NOT NULL default '',
credit int NOT NULL ,
instructor varchar(65) NOT NULL default '',
CHECK (credit BETWEEN 2 AND 7),
PRIMARY KEY (id)
)Engine=MySQL AUTO_INCREMENT=1 ";

$regis="CREATE TABLE regis (
id int(4) NOT NULL auto_increment,
studentname varchar(65) NOT NULL default '',
unitname varchar(65) NOT NULL default '',
coursename varchar(65) NOT NULL default '',
query_status varchar(65) NOT NULL default '',
PRIMARY KEY (id)
)Engine=MySQL AUTO_INCREMENT=1 ";

$units="CREATE TABLE units (
id int(4) NOT NULL auto_increment,
compulsory varchar(65) NOT NULL default '',
unitname varchar(65) NOT NULL default '',
coursename varchar(65) NOT NULL default '',
year int(4) NOT NULL default '1',
PRIMARY KEY (id)
)Engine=MySQL AUTO_INCREMENT=1 ";


$admins="CREATE TABLE admins (
id int(4) NOT NULL auto_increment,
username varchar(65) NOT NULL default '',
password varchar(65) NOT NULL default '',
PRIMARY KEY (id)
)Engine=MySQL AUTO_INCREMENT=1";

$results = mysqli_query($connect,$students) or die (mysqli_error($connect));
$results = mysqli_query($connect,$course) or die (mysqli_error($connect));
$results = mysqli_query($connect,$regis) or die (mysqli_error($connect));
$results = mysqli_query($connect,$units) or die (mysqli_error($connect));
$results = mysqli_query($connect,$admins) or die(mysqli_error($connect));

echo "Database successfully created!";


?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="csss/style.css" /> 
</head>
<body>
<div id="div1"></div>
</body>
</html>	