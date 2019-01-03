<?php

namespace App\Controllers;

use App\QueryBilder;
use League\Plates\Engine;
use Delight\Auth\Auth;
use \Tamtamchik\SimpleFlash\Flash;


class AuthController
{
  protected $qb;
  protected $tmp;
  protected $auth;
  protected $flash;
  /**
   
   */
  public function __construct(QueryBilder $qb, Engine $tmp, Auth $auth, Flash $flash)
  {
    $this->qb = $qb;
    $this->tmp = $tmp;
    $this->auth = $auth;
    $this->flash = $flash;
  }
  
  public function base()
  {
    
  }
}