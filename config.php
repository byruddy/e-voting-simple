<?php 
date_default_timezone_set('Asia/Bangkok');
session_start();

$host 	= "localhost";
$user	= "root";
$pass	= "";
$db		= "pemilihan";

$link	= mysqli_connect($host,$user,$pass, $db);