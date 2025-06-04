<HTML>
<BODY>
<?php
$placa=		$_GET["pl"];
$bd=mysqli_connect("localhost","root","","clinica") or die ("erro!");
//mysql_select_db("detran");

$excluiu=mysqli_query($bd,"delete from pacientes where cpf = '$cpf'");

if ($excluiu == 1)
		echo "O registro foi excluído!!!";
	else
		echo "O registro NÃO foi excluído!!!";

?>
<br><a href="consultar.html">Voltar para nova Consulta</a><br>
</body>
</html>