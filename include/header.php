<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Estonia?</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
    </ul>
  </div>
</nav>
<h1>Estonia?</h1>
<?php if(isset($username)) : ?>
     <p>Hello <?php echo $username; ?>!</p>
     <a href="/">Home</a>
     <a href="/games">Games</a>
     <a href="/users.php">User List</a>
     <a href="/auth/logout.php">Logout</a>
<?php else : ?>
    <p>Not signed up? <a href="/auth/register.php">Sign up!</a> Not logged in? <a href="auth/login.php">Log in now!</a></p>
    <a href="/">Home</a>
<?php endif; ?>
