<?php

namespace App\Controllers;

use App\QueryBilder;
use League\Plates\Engine;
use Delight\Auth\Auth;


class HomeController
{
  protected $qb;
  protected $tmp;
  protected $auth;
  /**

   */
  public function __construct(QueryBilder $qb, Engine $tmp, Auth $auth)
  {
    $this->qb = $qb;
    $this->tmp = $tmp;
    $this->auth = $auth;
  }

  public function base()
  {
    if ($this->auth->isLoggedIn()) {
      echo 'User is signed in';
    }
    else {
      echo 'User is not signed in yet';
    }
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