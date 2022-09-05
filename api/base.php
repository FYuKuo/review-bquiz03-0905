<?php
date_default_timezone_set('Asia/Taipei');
session_start();

class DB
{
    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db15-0905";
    protected $pdo;
}


function to($url)
{
    header("location:$url");
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

?>