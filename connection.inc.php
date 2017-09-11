<?php
$mysql_host = 'localhost';
$mysql_user = 'purvi';
$mysql_pass = 'admin123';
$mysql_db = 'project_dbms_2';

if(!@mysql_connect($mysql_host,$mysql_user,$mysql_pass) || !@mysql_select_db($mysql_db)){
    die(mysql_error());
}

        
?>