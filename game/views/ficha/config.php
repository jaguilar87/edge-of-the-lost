<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="consola">
				<tr>
					<td colspan="3"><b>Datos:</b></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>Nombre actual: </td>
					<td><?=$us->datos[nombre]?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>eMail:</td>
					<td><?=$us->datos['mail']?></td>
				</tr>
				<tr><td colspan="3"><br /></td></tr>
				<tr>
			</table>
			<form action="?a=ficha/config&accion=nombre" target="_self" method="post">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan="3"><b>Cambiar login:</b></td>
				</tr>
				<tr>
					<td width="12%">&nbsp;</td>
					<td width="38%">Nuevo login:</td>
					<td width="50%">
						<input name="nombre_nuevo" type="text" id="nombre_nuevo" size="25" maxlength="40" />
					</td>
				</tr>
				<tr align="center">
					<td colspan="3">
						<input name="ok_nombre" type="submit" id="ok_nombre" value="OK" />
					</td>
				</tr>
			</table>
      <b>Nota:</b> Esto cambiará tus datos de login, no el nombre de tu personaje.
			</form><hr />
			<form action="?a=ficha/config&accion=pass" target="_self" method="post">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan="3"><b>Cambiar password:</b></td>
				</tr>
				<tr>
					<td width="12%">&nbsp;</td>
					<td width="38%">Password viejo:</td>
					<td width="50%"><input name="viejo" type="password" size="25" maxlength="40" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>Nuevo pass:</td>
					<td><input name="nuevo" type="password" size="25" maxlength="40" /></td>
				</tr>
				<tr align="center">
					<td colspan="3">
						<input name="ok_pass" type="submit" id="ok_pass" value="OK" />
					</td>
				</tr>
			</table>
			</form><hr />
			<form action="?a=ficha/config&accion=mail" target="_self" method="post">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan="3"><b>Cambiar e-Mail:</b></td>
				</tr>
				<tr>
					<td width="12%">&nbsp;</td>
					<td width="38%">e-Mail nuevo: </td>
					<td width="50%"><input name="email_nuevo" type="text" id="email_nuevo" size="25" maxlength="40" /></td>
				</tr>
				<tr align="center">
					<td colspan="3">
						<input name="ok_mail" type="submit" id="ok_mail" value="OK" />
					</td>
				</tr>
			</table>
			</form><hr />
			<form action="?a=ficha/config&accion=borrar" target="_self" method="post">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan="3"><b>Borrar cuenta :</b></td>
				</tr>
				<tr>
					<td width="12%">&nbsp;</td>
					<td width="38%">Confirma password: </td>
					<td width="50%"><input name="borrar" type="text" id="borrar" size="25" maxlength="40" /></td>
				</tr>
				<tr align="center">
					<td colspan="3">
						<input name="ok_borrar" type="submit" id="ok_borrar" value="OK" />
					</td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
</table>