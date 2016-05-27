<!DOCTYPE html>
<html lang="en">
<head>
  <title>Health Info | Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
  <script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>
  <script type="text/javascript">
   //$(document).ready(function(){ $("#crm").mask("99999");});
</script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="img/icont.ico" >
</head>
<body>
    <nav role="navigation" class="navbar navbar-inverse">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php" class="navbar-brand" style="color: #00BFFF; text-shadow: 1px 1px 1px #000;">Health Info</a>
        <img src="img/icone.png" alt="Smiley face" height="42" width="42">
    </div>
    <!-- Collection of nav links, forms, and other content for toggling -->
</nav>
    <div class="login">
        <form method="POST">
            <label>Login:</label><br>
            <input type="text" name="login" id="crm" placeholder="CRM"><br>
            <input type="password" name="senha" placeholder="Senha"><br>
            <input type="submit" value="Entrar">
        </form>
    </div>
    <footer id="footer">
        <!--<p class="foot1">Copyright&copy; 2016</p>-->
    </footer>
</body>
</html>