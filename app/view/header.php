<?php //$this->layout('header') ?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>View auth</title>
  <!--  <link rel="stylesheet" href="../view/css/styles.css">-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<style>
  .wrapper {
    display: flex;
    justify-content: space-around;
    padding: 30px 0;
  }
  form {
    display: flex;
    flex-direction: column;
  }
  button {
    max-width: 200px;
    width: 100%;
    margin-top: auto;
    padding: 5px 15px;
    text-align: center;
    align-self: center;
  }
</style>
<body>

<header class="header">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Homepage <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    
    </div>
  </nav>
</header>