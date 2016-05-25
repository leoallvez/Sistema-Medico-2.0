<nav role="navigation" class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand" style="color: #00BFFF; text-shadow: 1px 1px 1px #000;">Health Info</a>
            </div>
            <!-- Collection of nav links, forms, and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">Início</a></li>
                    <li class="dropdown active" >
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Cadastro<b class="caret"></b></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="index.php">Paciente</a></li>
                            <li><a href="#">Médico</a></li>
                            <li><a href="#">Hospital</a></li>
                        </ul>
                    </li>
                    <li><a href="relatorio-pacientes.php">Relatório</a></li>
                </ul>
                <form role="search" class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" placeholder="Procurar" class="form-control">
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Log out</a></li>
                </ul>
            </div>
        </nav>