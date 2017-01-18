	<script language="JavaScript" type="text/javascript">
	<!--
	function validar(f) {
		if (f.mail.value.indexOf("@") != -1 && f.mail.value.indexOf(".") != -1 && f.pass.value!="" && f.rec.value!=""){
			return true;
		}else{
			alert('Debe escribir una dirección mail válida y rellenar todos los huecos');
			return false;
		}
	}
	//-->
	</script>
	
	<center>
   Registro de un nuevo <strong>Jugador</strong><br><br>
  	<a href="../ayuda/normas.htm" target=_BLANK>Normativa</a><br>

	<form onSubmit="javascript:return validar(this)" action="?a=reg" method="post" name="miFormulario">
	<table summary="" cellpadding=5>
		<tr>
			<td align=right><b>Login:</b></td>
			<td><input size=40 name="name" type="text" value="Introduce el nombre de login" onFocus="javascript:document.miFormulario.elements['name'].value='';"></td>
		</tr>
		<tr>
			<td align=right><b>Mail:</b></td>
			<td><input size=40 name="mail" type="text" value="Introduce un mail real" onFocus="javascript:document.miFormulario.elements['mail'].value='';"></td>
		</tr>
		<tr>
			<td align=right><b>Password:</b></td>
			<td><input size=40 name="pass" type="password" value="password" onFocus="javascript:document.miFormulario.elements['pass'].value='';"></td>
		</tr>	
	</table><br>
	<input type="submit" name="ok" value="Acepto las normas y quiero crear cuenta">
	</form>
	</center>
