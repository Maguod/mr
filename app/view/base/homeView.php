<?php $this->layout('template');
$auth = $user;

?>

<h1><?php
  if($name) {
    echo 'Здравствуйте ' . $name;
  } else{
    echo 'Здравствуйте гость';
  } ?></h1>

<div class="wrapper">

    <form action="/reg" method="post">
      <h3>Зарегистрироваться</h3>
      <label for="username">Ваш логин</label>
      <input type="text" name="username" id="username">
      <label for="password">Ваш пароль</label>
      <input type="text" name="password" id="password">
      <label for="email">Ваша почта</label>
      <input type="text" name="email" id="email">
      <button type="sumbmit">Зарегистрироваться</button>
    </form>

    <form action="/auth" method="post">
      <h3>Войти в акк</h3>
      <label for="email">Ваш email</label>
      <input type="text" name="email" id="email">
      <label for="password">Ваш пароль</label>
      <input type="text" name="password" id="password">
      <button type="sumbmit">Войти</button>
    </form>


</div>
<?php if(!empty($err)) { ?>
  <div class="warring text-center text-danger">
    <h4><?php echo $err; ?></h4>
  </div>
<?php } ?>


<div class="container">
  <h2>POSTS ITEMS</h2>
  <div class="row justify-content-around">
    <?php
    if($posts) {
    foreach ($posts as $post) { ?>
      <div class="align col-12 ">
        <div class="item border border-info">
          <h5 class="card-title"><?php echo $post['title'] ?></h5>
          <p class="card-text"><?php echo $post['text'] ?></p>
          <img src="/model/Filesloader/upload/<?php echo $post['image'] ?>" alt="">
          <div class="date"><?php echo $post['date'] ?></div>
          <div class="links-block">

              <button href="#" class="btn btn-primary disabled">Можете не кликать</button>

          </div>
        </div>
      </div>

    <?php } ?>
    <?php } ?>

  </div>
</div>




