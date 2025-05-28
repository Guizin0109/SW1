<HTML>
<BODY>
<?php
$expressao=		$_POST["expressao"];
$bd=mysqli_connect("localhost","root","","clinica") or die ("erro!");


if (isset($_POST ["op"]))
{
	$op = $_POST ["op"];
	if ($op=="data_consulta")
		$consulta=mysqli_query($bd,"select * from pacientes where veiculo='$expressao'");
	if ($op=="quadro_clinico")
		$consulta=mysqli_query($bd,"select * from pacientes where marca='$expressao'");
	if ($op=="nome")
		$consulta=mysqli_query($bd,"select * from pacientes where proprietario like '%$expressao%'");
	
} else
{
	echo "volte a página e escolha o campo que fará a pesquisa";
	exit;
}
$reg = mysqli_fetch_array($consulta);
if ($reg==0)
{
	echo "Não existem registros para a pesquisa!";
	exit;
}
while ($reg!=0)
{
	$placa = $reg["placa"];
	$veiculo = $reg["veiculo"];
	$marca = $reg["marca"];
	$cor = $reg["cor"];
	$ano = $reg["ano"];
	$proprietario = $reg["proprietario"];
	$fone = $reg["fone"];
	$opcionais = $reg["opcionais"];
	
	echo   "Placa: $placa<br>
			Veículo: $veiculo<br>
			Marca: $marca<br>
			Cor: $cor<br>
			Ano: $ano<br>
			Proprietário: $proprietario<br>
			Fone: $fone<br>
			Opcionais: $opcionais<br>";
			
	?>
	<a href="excluir.php?pl=<?php echo $placa;?>" onclick = "return confirm ('Exclui o registro?');">Excluir</a>
	
	<a href="alterar.php?pl=<?php echo $placa;?>">Alterar</a><hr>
	<?php
	$reg = mysqli_fetch_array($consulta);		
} 
?>
<br><a href="consultar.html">Voltar</a><br>
</body>
</html>