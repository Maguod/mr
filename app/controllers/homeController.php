<?php

namespace App\Controllers;

use App\QueryBilder;



class HomeController
{
  protected $qb;
//  protected $tmp;
  /**

   */
  public function __construct()
  {
    $info = include '../Database/InfoDatabase.php';
    $connectDb = new \Database\Connection();
    $this->qb = new QueryBilder($connectDb->make($info['Database']));
  }

  public function base()
  {

    $posts = $this->qb->getAll('posts');
    var_dump($posts);
  }
}