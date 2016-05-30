<!DOCTYPE html>
<html lang="pt">
<head>
  <title>Health Info | Atualizar Paciente</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
  <script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>
  <?php include "app/view/includes/helpers.php"; ?>
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="img/icont.ico" >
</head>
    <body>
        <?php include "app/view/includes/view-head.php"; ?>
        <form method="POST">
            <div class="cad-paciente">
                <h3>Paciente: <?=$p->nome; ?></h3>
                <h4>CPF: <?=$p->cpf;?></h2>
                <fieldset>
                    <legend>Dados do Último Atendimento</legend>
                    <label>Data: <?= traduzDataParaExibir($p->data_atendimento); ?></label></br>
                    <label>Médico: <?= $medico->nome; ?></label>
                    <label>CRM: <?= $medico->CRM; ?></label></br>
                    <label>Especialidade: <?=$medico->especialidade; ?></label><br>
                    <label>Unidade de saúde: <?=$unidade->nome; ?></label>
                    <label>Tipo: <?=$unidade->tipo; ?></label><br>
                </fieldset>
                <h3>Dados do Paciente</h3>
                <?php include "app/view/includes/view-status-atualizar.php"; ?><br>
                <input type="hidden" name="cpf" value="<?=$p->cpf;?>"/>
                <label for="nome">Nome</label></br>
                <input type="text" name="nome" id="nome"placeholder="Nome Completo do Paciente" class="input-large" value="<?=$p->nome;?>"required><br>
                <label for="nasc">Data de nascimento</label></br>
                <input type="date" name="nascimento" id="nasc" placeholder="Nascimento" value="<?=$p->nascimento; ?>"required/>
                <label for="mas">Masculino</label>
                <input type="radio" name="sexo" value="M" id="mas" <?=($p->sexo == "M")? "checked" : "";?>/>
                <label for="fem">Feminino</label>
                <input type="radio" name="sexo" value="F" id="fem" <?=($p->sexo == "F")? "checked" : "";?>/><br>
                <label for="ender">Endereço</label></br>
                <input type="text" name="endereco" id="ender" placeholder="Endereço e Número de Residencia" class="input-large" value="<?=$p->endereco;?>"required/><br>
                <label for="cep">CEP</label></br>
                <input type="text" name="cep" id="cep" placeholder="CEP" max="15" value="<?=$p->cep;?>"required><br>
                <label for="bairro">Bairro</label></br>
                <input type="text" name="bairro" id="bairro" placeholder="Bairro" class="input-large" value="<?=$p->bairro;?>"required/><br>
                <label for="cid">Cidade</label></br>
                <input type="text" name="cidade" placeholder="Cidade" class="input-large" id="cid" value="<?=$p->cidade;?>"required/><br>
                <label>Estado</label></br>
                <?php include "app/view/includes/view-estados-atualizar.php"; ?>
                <fieldset>
                    <legend>Principais Sintomas</legend>
                    <input type="checkbox" value="true" name="febre" id="febre" <?=($p->febre == 1)? "checked" : "";?>/>
                    <label for="febre">Febre alta com início súbito</label><br>
                    <input type="checkbox" value="true" name="dor_cabeca" id="dor_cabeca" <?=($p->dor_cabeca == 1)? "checked" : "";?>/>
                    <label for="dor_cabeca">Forte dor de cabeça.</label><br>
                    <input type="checkbox" value="true" name="dor_olhos" id="dor_olhos" <?=($p->dor_olhos == 1)? "checked" : "";?>/>
                    <label for="dor_olhos">Dor atrás dos olhos.</label><br>
                    <input type="checkbox" value="true" name="perda_apetite" id="perda_apetite" <?=($p->perda_apetite == 1)? "checked" : "";?>/>
                    <label for="perda_apetite">Perda do paladar e apetite.</label><br>
                    <input type="checkbox" value="true" name="mancha_pele" id="mancha_pele" <?=($p->mancha_pele == 1)? "checked" : "";?>/>
                    <label for="mancha_pele">Manchas ou erupções na pele.</label><br>
                    <input type="checkbox" value="true" name="vomito" id="vomito" <?=($p->vomito == 1)? "checked" : "";?>/>
                    <label for="vomito">Náuseas e vômito.</label><br>
                    <input type="checkbox" value="true" name="tontura" id="tontura" <?=($p->tontura== 1)? "checked" : "";?>/>
                    <label for="tontura">Tonturas.</label><br>
                    <input type="checkbox" value="true" name="cansaco" id="cansaco" <?=($p->cansaco == 1)? "checked" : "";?>/>
                    <label for="cansaco">Extremo cansaço.</label><br>
                    <input type="checkbox" value="true" name="moleza" id="moleza" <?=($p->moleza== 1)? "checked" : "";?>/>
                    <label for="moleza"> Moleza e dor no corpo.</label><br>
                    <input type="checkbox" value="true" name="dor_ossos" id="dor_ossos" <?=($p->dor_ossos == 1)? "checked" : "";?>/>
                    <label for="dor_ossos">Muitas dores nos ossos e articulações.</label><br>
                </fieldset>
                <fieldset>
                    <legend>Parecer Médico</legend>
                    <textarea class="input-large" id="textarea" rows="15" placeholder="exames, medicamentos..."name="parecer_medico" ><?=$p->parecer_medico; ?></textarea>
                </fieldset>
                <input type="submit" value="Atualizar">
            </div>
        </form>
    </body>
</html>