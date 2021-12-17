
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>Chat EPF</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email</label>
          <input type="text" name="email" placeholder="coloque o seu email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="coloque a sua password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="continuar">
        </div>
      </form>
      <div class="link">Ainda não estás inscrito? <a href="mindex.php">increve-te agora</a></div>
      <div class="link">Versão desktop disponivel <a href="login.php">aqui</a></div>
    </section>
    
  </div>
  
  </div>

</body>

<script src="javascript/pass-show-hide.js"></script>
<script src="javascript/login.js"></script>


</body>
</html>
