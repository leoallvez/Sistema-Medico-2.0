<select name="tipo_unidade">
	<option value="Todos" <?php echo ($tipo_unidade  == "Todos")? "selected" : ""; ?>>Todas unidades</option>
	<option value="Posto de saude" <?php echo ($tipo_unidade == "Posto de saude")? "selected " : ""; ?>>Posto de saúde</option>
	<option value="Centro de saude" <?php echo ($tipo_unidade == "Centro de saude")? "selected " : ""; ?>>Centro de saúde</option>
	<option value="Policlinca" <?php echo ($tipo_unidade == "Policlinca")? "selected " : ""; ?>>Policlinica</option>
	<option value="Hospital Geral" <?php echo ($tipo_unidade== "Hospital Geral")? "selected " : ""; ?>>Hospital Geral</option>
	<option value="Hospital Especializado" <?php echo ($tipo_unidade  == "Hospital Especializado")? "selected " : ""; ?>>Hospital Especializado</option>
	<option value="Unidade Mista" <?php echo ($tipo_unidade  == "Unidade Mista")? "selected" : ""; ?>>Unidade Mista</option>
</select>