<?php $this->layout('template'); ?>
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