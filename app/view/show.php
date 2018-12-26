
  <h1>
  <?php
    if(!empty($auth)) {
      echo 'Здравствуйте  ' . '<b> ' .$auth . '</b>';
    }
    else {
      echo 'Здравствуйте ' .  $this->e($name);
    }
  ?>

  </h1>
  
  <div class="wrapper">
    <?php
    if(!$auth) {
      ?>
    <form action="/reg.php" method="post">
      <h3>Зарегистрироваться</h3>
      <label for="name">Ваш логин</label>
      <input type="text" name="name" id="name">
      <label for="pass">Ваш пароль</label>
      <input type="text" name="pass" id="pass">
      <label for="email">Ваша почта</label>
      <input type="text" name="email" id="email">
      <button type="sumbmit">Зарегистрироваться</button>
    </form>
    <?php } ?>
    <?php if(!$auth) { ?>
    <form action="/auth.php" method="post">
      <h3>Войти в акк</h3>
      <label for="name">Ваш логин</label>
      <input type="text" name="name" id="name">
      <label for="pass">Ваш пароль</label>
      <input type="text" name="pass" id="pass">
      <button type="sumbmit">Войти</button>
    </form>
    <?php } ?>
    <?php if($auth) {
      echo '<a href="/view.php" class="btn btn-info"> Добавить посты</a>';
      echo '<a href="/quit.php" class="btn btn-outline-danger"> Выйти</a>';
      
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
//      foreach ($posts as $post) { ?>
<!--      <div class="align col-12 ">-->
<!--        <div class="item border border-info">-->
<!--         <h5 class="card-title">--><?php //echo $post['title'] ?><!--</h5>-->
<!--          <p class="card-text">--><?php //echo $post['text'] ?><!--</p>-->
<!--<!--          <img src="/model/Filesloader/upload/-->--><?php ////echo $post['image'] ?><!--<!--" alt="">-->-->
<!--<!--          <div class="date">-->--><?php ////echo $post['date'] ?><!--<!--</div>-->-->
<!--          <div class="links-block">-->
<!--<!--            -->--><?php ////if($auth) : ?>
<!--<!--            <a href="#" class="btn btn-primary">Go sigle edit</a>-->-->
<!--<!--            <a href="#" class="btn btn-danger">Удалить пост</a>-->-->
<!--<!--            -->--><?php ////else: ?>
<!--              <button href="#" class="btn btn-primary disabled">Можете не кликать</button>-->
<!--<!--            -->--><?php ////endif; ?>
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--  -->
<!--     --><?php //} ?>
    </div>
  </div>

