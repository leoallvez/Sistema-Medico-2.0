<label>Status</label></br>
<select id="selectbasic" name="situacao" id="sit">
	<option value="Passou pela Triagem" <?= ($p->situacao == "Passou pela Triagem")? "selected " : ""; ?>>Passou pela Triagem</option>
    <option value="Recebeu Alta" <?= ($p->situacao == "Recebeu Alta")? "selected " : ""; ?>>Recebeu Alta</option>
    <option value="Esta Internado" <?= ($p->situacao == "Esta Internado")? "selected " : ""; ?>>Internado</option>
    <option value="Foi Encaminhado para Exame" <?= ($p->situacao == "Foi Encaminhado para Exame")? "selected " : ""; ?>>Encaminhado para Exame</option>
    <option value="Foi Encaminhado para outra Especialidade" <?= ($p->situacao == "Foi Encaminhado para outra Especialidade")? "selected " : ""; ?>>Encaminhado para outra Especialidade</option>
</select>
