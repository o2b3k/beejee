<div class="container mt-5 offset-3">
  <div class="row my-3">
    <div class="col-md-6">
      <form action="/auth/login" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Имя пользовател</label>
          <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="userHelp" placeholder="Имя пользовател" required>
          <?php if (isset($this->message)): ?>
            <span id="userHelp" class="form-text text-muted text-danger">Неправильно указан логин и/или пароль</span>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Пароль</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Войти</button>
      </form>
    </div>
  </div>
</div>