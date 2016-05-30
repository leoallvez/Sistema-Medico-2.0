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
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <!--<li><a href="#">Início</a></li>-->
            <li class="dropdown active" >
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Cadastro<b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="index.php">Paciente</a></li>
                    <li><a href="#">Médico</a></li>
                    <li><a href="#">Hospital</a></li>
                </ul>
            </li>
            <li><a href="relatorio.php">Relatório</a></li>
        </ul>
        <form role="search" class="navbar-form navbar-left" method="POST" action="buscar-paciente.php">
            <div class="form-group">
                <input type="text" name="valor" placeholder="Procurar por nome ou CPF" class="form-control">
            </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Dr(a) <?=$_SESSION['acesso']->nome; ?><b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="logoff.php">Sair</a></li>
                    

                </ul>
            </li>
        </ul>
    </div>
</nav>