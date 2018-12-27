<?php

namespace App\Controllers;

use App\QueryBilder;
use League\Plates\Engine;


class HomeController
{
  protected $qb;
  protected $tmp;
  /**

   */
  public function __construct()
  {
    $this->qb = new QueryBilder();
    $this->tmp = new Engine('../app/view');
  }

  public function base()
  {
    $posts = $this->qb->getAll('posts');
    echo $this->tmp->render('homeview', ['posts' => $posts]);
  }
  
  public function aboutPage()
  {
//    $posts = $this->qb->getAll('posts');
    echo $this->tmp->render('about', ['name' => 'Name']);
  }
  public function createPage()
  {

    echo $this->tmp->render('create.view', ['name' => 'Name']);
  }
}