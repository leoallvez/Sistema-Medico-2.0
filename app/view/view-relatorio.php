<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Health Info |  Relatório</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="_css/style.css"/>
    </head>
    <body>
        <?php include "_php/head.php"; ?>
        <div class="cad-paciente">
            <h3>Relatório de Paciente Que <?php echo $situacao; echo " até ".date("d/n/Y"); ?></h3>
            <form method="POST">
                <?php include "_php/status.php"; ?> 
                <?php include "_php/unidade-saude.php"; ?>
                <input type="submit" value="Buscar"></br>
            </form>
            <?php if($mostrarTabela): ?>
                <table>
                    <tr>
                        <th>Estado</th>
                        <th>Sigla</th>
                        <th>Quantidade</th>
                    </tr>
                    <?php foreach ($pacientes as $paciente): ?>
                        <tr>
                            <td><?= traduzEstado($paciente['estado']); ?></td>
                            <td><?= $paciente['estado']; ?></td>
                            <td><?= $paciente['quantidade']; ?></td>
                        </tr>  
                    <?php endforeach; ?>
                    <?php if(count($pacientes) == 0): ?>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    <?php endif; ?>
                </table> 
            <?php endif; ?> 
        </div>
        <footer id="footer">
            <!--<p class="foot1">Copyright&copy; <?= date("Y"); ?></p>-->
        </footer>
    </body>
</html>