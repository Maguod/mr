<?php

namespace Database;
use PDO;

class Connection
{
  public static function make()
  {
    $db = new PDO('mysql:dbname=test_bd;host=localhost', 'root', '');
    return $db;
  }
}