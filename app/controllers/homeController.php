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
    $this->qb = new QueryBilder();
  }

  public function base()
  {

    $posts = $this->qb->getAll('posts');
    var_dump($posts);
  }
}