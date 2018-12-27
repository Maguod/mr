<?php
namespace App\Controllers;

use App\QueryBilder;
use \Tamtamchik\SimpleFlash\Flash;

class CreateController
{
  
  protected $qb;
  
  public function __construct()
  {
    $this->qb = new QueryBilder();

  }
  
  /**
   * @return QueryBilder
   */
  public function test()
  {
    d($this->qb);
  }
}