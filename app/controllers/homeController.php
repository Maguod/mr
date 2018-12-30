<?php

namespace App\Controllers;

use App\QueryBilder;
use League\Plates\Engine;
use Delight\Auth\Auth;
use \Tamtamchik\SimpleFlash\Flash;


class HomeController
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

    $posts = $this->qb->getAll('posts');
    $user = $this->auth->isLoggedIn();
    $userName= $this->auth->getUsername();
    echo $this->flash->display();
     echo $this->tmp->render('homeview', ['posts' => $posts, 'user' => $user, 'name' => $userName ]);
  }
  
  public function aboutPage()
  {
    echo $this->tmp->render('about', ['name' => 'Name']);
  }
  
  public function createPage()
  {
    echo $this->tmp->render('create.view', ['name' => 'Name']);
  }
  
  public function regUser()
  {
    try {
      $userId = $this->auth->registerWithUniqueUsername($_POST['email'], $_POST['password'], $_POST['username'], function ($selector) {
        echo 'Send ' . $selector ;
        $posts = $this->qb->getAll('posts');
        echo $this->tmp->render('homeview', ['posts' => $posts, 'auth' => $this->auth]);

      });
  
      $this->flash->message(['We have signed up a new user with the ID ' . $userId]) ;
    }
    catch (\Delight\Auth\InvalidEmailException $e) {
      $this->flash->error(['Invalid email address']);

    }
    catch (\Delight\Auth\DuplicateUsernameException $e) {
      $this->flash->error(['username already exists']);


    }
    catch (\Delight\Auth\InvalidPasswordException $e) {
      $this->flash->error(['Invalid password']);

    }
    catch (\Delight\Auth\UserAlreadyExistsException $e) {
      $this->flash->error(['User already exists']);

    }
    catch (\Delight\Auth\TooManyRequestsException $e) {
      $this->flash->error(['Too many requests']);

    }
  
    $this->base();
  }
  
  public function loginUser()
  {
    try {
      $this->auth->login($_POST['email'], $_POST['password']);
  
      $this->flash->info(['User is logged in']);
    }
    catch (\Delight\Auth\InvalidEmailException $e) {
      $this->flash->error(['Wrong email address']);
    }
    catch (\Delight\Auth\InvalidPasswordException $e) {
      $this->flash->error(['Wrong password']);
    }
    catch (\Delight\Auth\EmailNotVerifiedException $e) {
     $this->flash->error(['Email not verified']);
    }
    catch (\Delight\Auth\TooManyRequestsException $e) {
      $this->flash->error(['Too many requests']);
    }
    $this->base();
  }
  
  public function Logout()
  {
    $this->auth->logOut();
    $this->base();
  }
}