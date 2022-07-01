<?php 
    define("host","localhost");
    define("user","root");
    define("password","");
    define("dbName","crudapp");

    $connection = mysqli_connect(host,user,password,dbName);

    if(!$connection)
    {
        echo "Connection Failed";
    }

?>