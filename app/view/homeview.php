<?php $this->layout('template');
$auth = $user;

?>

<h1>
  <?php
  if($auth) {
    echo 'Здравствуйте  ' . '<b> ' .$this->e($name); '</b>';
  }
  else {
    echo 'Здравствуйте гость';
  }
  ?>

</h1>

<div class="wrapper">
  <?php
  if (!$auth) {
    ?>
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
  <?php } ?>
  <?php if(!$auth) { ?>
    <form action="/auth" method="post">
      <h3>Войти в акк</h3>
      <label for="email">Ваш email</label>
      <input type="text" name="email" id="email">
      <label for="password">Ваш пароль</label>
      <input type="text" name="password" id="password">
      <button type="sumbmit">Войти</button>
    </form>
  <?php } ?>
  <?php if($auth) {
    echo '<a href="/view.php" class="btn btn-info"> Добавить посты</a>';
    echo '<a href="/logout" class="btn btn-outline-danger"> Выйти</a>';
    
  } ?>

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
            <?php if($auth) : ?>
              <a href="#" class="btn btn-primary">Go sigle edit</a>
              <a href="#" class="btn btn-danger">Удалить пост</a>
            <?php else: ?>
              <button href="#" class="btn btn-primary disabled">Можете не кликать</button>
            <?php endif; ?>
          </div>
        </div>
      </div>

    <?php } ?>
    <?php } ?>

  </div>
</div>




