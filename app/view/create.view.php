<?php //error_reporting(-1);
//
//$user_name=$_COOKIE['log'] ?? NULL;
//
//?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>View auth</title>
  <link rel="stylesheet" href="view/css/styles.css">
  <link rel="stylesheet" href="view/css/main.css">
</head>
<style>
  h1 {
    padding: 20px 0;
    font-size: 16px;
    text-align: center;
    text-transform: uppercase;
    font-family: "Helvetica Neue", Helvetica, sans-serif;
  }
  .wrapper {
    display: flex;
    justify-content: space-around;
    padding: 30px 0;
  }
  form {
    display: flex;
    flex-direction: column;
    /*justify-content: space-around;*/
    margin: 10px;
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
          <a class="nav-link" href="#">Homepage <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    
    </div>
  </nav>
</header>

<div class="container">
  <div class="row">
   <div class="col-md-8 offset-md-3">
     <form action="../control/create.php" class="auth_form" method="post" enctype="multipart/form-data">
       <div class="form-group">
         <label for="title">Title</label>
         <input type="text" name="title" id="title" placeholder="title" class="form-control">
       </div>
       <div class="form-group">
         <label for="text">Content</label>
        <textarea name="text" id="text" placeholder="text" class="form-control"></textarea>
       </div>
       <div class="form-group">
        <input type="file" name="image" id="image">
       </div>
       <button type="submit">Send</button>
     </form>
   </div>
  </div>
</div>
</body>
</html>
