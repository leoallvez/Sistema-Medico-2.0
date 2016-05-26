<label>Status</label></br>
<select id="selectbasic" name="situacao" id="sit">
	<option value="Passou pela Triagem" <?= ($situacao == "Passou pela Triagem")? "selected " : ""; ?>>Passou pela Triagem</option>
    <option value="Recebeu Alta" <?= ($situacao == "Recebeu Alta")? "selected " : ""; ?>>Recebeu Alta</option>
    <option value="Esta Internado" <?= ($situacao == "Esta Internado")? "selected " : ""; ?>>Internado</option>
    <option value="Foi Encaminhado para Exame" <?= ($situacao == "Foi Encaminhado para Exame")? "selected " : ""; ?>>Encaminhado para Exame</option>
    <option value="Foi Encaminhado para outra Especialidade" <?= ($situacao == "Foi Encaminhado para outra Especialidade")? "selected " : ""; ?>>Encaminhado para outra Especialidade</option>
</select>
