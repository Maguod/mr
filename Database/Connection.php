<?php

namespace Database;
use PDO;

class Connection
{
  public static function make()
  {
    $config = include 'InfoDatabase.php';
    $pdo = new PDO(
      "{$config['connection']};
        dbname={$config['bdName']};
        charset={$config['charset']};",
      $config['user'],
      $config['password']
    );
    return $pdo;
  }
}