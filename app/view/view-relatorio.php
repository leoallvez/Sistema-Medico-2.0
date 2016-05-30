<!DOCTYPE html>

<html lang="pt">
    <?php include "app/view/includes/helpers.php"; ?>
    <head>
        <title>Health Info |  Relatório</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="shortcut icon" href="img/icont.ico" >
    </head>
    <body>
        <?php include "app/view/includes/view-head.php"; ?>
        <div class="cad-paciente">
            <h3>Relatório de Paciente Que <?php echo $situacao;?></h3>
            <form method="POST">
                <?php include "app/view/includes/view-status.php"; ?> 
                <?php include "app/view/includes/view-unidade-saude.php"; ?>
                <input type="submit" value="Buscar"></br>
            </form>
            <?php $total = calculaPorEstado($pacientes); ?>
            <?php if($mostrarTabela): ?>
                <table>
                    <tr>
                        <th>Estado</th>
                        <th>Sigla</th>
                        <th>Quantidade</th>
                        <th>%</th>
                    </tr>
                    <?php foreach ($pacientes as $p): ?>
                         <tr>
                            <td><?= traduzEstado($p->estado); ?></td>
                            <td><?= $p->estado; ?></td>
                            <td><?= $p->quantidade; ?></td>
                            <td><?= porcentagem($total, $p->quantidade);?>%</td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if(count($pacientes) == 0): ?>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    <?php endif; ?>
                    <?php if(count($pacientes) > 0): ?>
                        <td colspan="2">Total</td>
                        <td><?=$total; ?></td>
                        <td>100%</td>
                    <?php endif; ?>
                </table> 
            <?php endif; ?> 
        </div>
        <footer id="footer">
            <!--<p class="foot1">Copyright&copy; <?= date("Y"); ?></p>-->
        </footer>
    </body>
</html>