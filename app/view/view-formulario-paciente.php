<!DOCTYPE html>
<html lang="pt">
<head>
  <title>Health Info |  Paciente</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
  <script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>
  <script type="text/javascript">
    $(document).ready(function(){ $("#cpf").mask("99999999999");});
    $(document).ready(function(){ $("#cep").mask("99999-999");});
    </script>
  <link rel="stylesheet" href="css/style.css">
</head>
    <body>
        <?php include "app/view/includes/view-head.php"; ?>
        <form method="POST">
            <div class="cad-paciente">
                <h3>Cadastro de Paciente</h3>
                <label>Data: <?= date("d/m/Y"); ?></label></br>
                <?php include "app/view/includes/view-status.php"; ?><br>
                <label for="cpf">CPF</label></br>
                <input type="text" name="cpf" id="cpf" placeholder="11 digitos" min="15"size="15" required><br>
                <label for="nome">Nome</label></br>
                <input type="text" name="nome" id="nome"placeholder="Nome Completo do Paciente" class="input-large"required><br>
                <label for="nasc">Data de nascimento</label></br>
                <input type="date" name="nascimento" id="nasc" placeholder="Nascimento" required/>
                <label for="mas">Masculino</label>
                <input type="radio" name="sexo" value="M" id="mas"checked/>
                <label for="fem">Feminino</label>
                <input type="radio" name="sexo" value="F" id="fem"/><br>
                <label for="ender">Endereço</label></br>
                <input type="text" name="endereco" id="ender" placeholder="Endereço e Número de Residencia" class="input-large" required/><br>
                <label for="cep">CEP</label></br>
                <input type="text" name="cep" id="cep" placeholder="CEP" min="15" required><br>
                <label for="bairro">Bairro</label></br>
                <input type="text" name="bairro" id="bairro" placeholder="Bairro" class="input-large" required/><br>
                <label for="cid">Cidade</label></br>
                <input type="text" name="cidade" placeholder="Cidade" class="input-large" id="cid"required/><br>
                <label>Estado</label></br>
                <?php include "app/view/includes/view-estados.php"; ?>
                <label for="uni">Tipo de únidade de saúde</label><br>
                <?php include "app/view/includes/view-unidade-saude.php"; ?><br>
                <label for="uni">Nome da únidade de saúde</label><br>
                <input type="text" name="nome_unidade" placeholder="Unidade" id="uni" class="input-large" required></br>
                <fieldset>
                    <legend>Principais Sintomas</legend>
                    <input type="checkbox" value="true" name="febre" id="febre"/>
                    <label for="febre">Febre alta com início súbito</label><br>
                    <input type="checkbox" value="true" name="dor_cabeca" id="dor_cabeca"/>
                    <label for="dor_cabeca">Forte dor de cabeça.</label><br>
                    <input type="checkbox" value="true" name="dor_olhos" id="dor_olhos"/>
                    <label for="dor_olhos">Dor atrás dos olhos.</label><br>
                    <input type="checkbox" value="true" name="perda_apetite" id="perda_apetite"/>
                    <label for="perda_apetite">Perda do paladar e apetite.</label><br>
                    <input type="checkbox" value="true" name="mancha_pele" id="mancha_pele"/>
                    <label for="mancha_pele">Manchas ou erupções na pele.</label><br>
                    <input type="checkbox" value="true" name="vomito" id="vomito"/>
                    <label for="vomito">Náuseas e vômito.</label><br>
                    <input type="checkbox" value="true" name="tontura" id="tontura"/>
                    <label for="tontura">Tonturas.</label><br>
                    <input type="checkbox" value="true" name="cansaco" id="cansaco"/>
                    <label for="cansaco">Extremo cansaço.</label><br>
                    <input type="checkbox" value="true" name="moleza" id="moleza"/>
                    <label for="moleza"> Moleza e dor no corpo.</label><br>
                    <input type="checkbox" value="true" name="dor_ossos" id="dor_ossos"/>
                    <label for="dor_ossos">Muitas dores nos ossos e articulações.</label><br>
                </fieldset>
                <fieldset>
                    <legend>Parecer Médico</legend>
                    <textarea class="input-large" id="textarea" rows="15" placeholder="exames, medicamentos..."name="parecer_medico" ></textarea>
                </fieldset>
                <input type="submit" value="Cadastrar">
                <input type="reset" value="Limpar">
            </div>
        </form>
    </body>
</html>