<?php
include ("../conectare.php");
include("autorizare.php");
include("admin_top.php");
?>
<h1>Comenzi</h1>
<h2>Comenzi inca neonorate</h2>
<?php
$sqlT="select * from tranzactii where comanda_onorata=0";
$resursaT=mysql_query($sqlT);
$row=mysql_num_rows($resursaT);

while($row=mysql_fetch_array($resursaT))
{
?>
<form action="prelucrare_comenzi.php" method="post">
<br />
Data comenzii:
<b><?php echo $row['data_tranzactiei'];?></b>
<div style="width:500px; border:1px solid #ffffff; background-color:#f0f0f0; padding:5px">
<b><?php echo $row['nume_cumparator'];?></b><br/>
<?php echo $row['adresa_cumparator'];?>
<table border="1" cellpadding="4" cellspacing="0">
<tr>
<td align="center"><b>Carte</b></td>
<td align="center"><b>Nr.buc</b></td>
<td align="center"><b>Pret</b></td>
<td align="center"><b>Total</b></td>
</tr>
<?php
$sqlCarti="select titlu, nume_autor, pret, nr_buc from vanzari, carti, autori where carti.id_carte=vanzari.id_carte and carti.id_autor=autori.id_autor and id_tranzactie=".$row['id_tranzactie'];
$resursaCarti=mysql_query($sqlCarti);
$totalGeneral=0;
while ($rowCarte=mysql_fetch_array($resursaCarti))
{
print'<tr><td>'.$rowCarte['titlu'].' de '.$rowCarte['nume_autor'].'</td>
<td align="right">'.$rowCarte['nr_buc'].'</td>
<td align="right">'.$rowCarte['pret'].'</td>';
$total=$rowCarte['pret'] * $rowCarte['nr_buc'];
print '<td align="right">'.$total.'</td></tr>';
$totalGeneral=$totalGeneral + $total;
}
?>
<tr>
<td colspan="3" align="right">Total comanda:</td>
<td><?php echo $totalGeneral;?> lei</td>
</tr>
</table>
<input type="hidden" name="id_tranzactie" value="<?php echo $row['id_tranzactie'];?>"/>
<br />
<input type="submit" name="comanda_onorata" value="Comanda onorata"/>
<input type="submit" name="anuleaza_comanda" value="Anuleaza comanda"/>
</div>
</form>
<?php
}

?>

<br><br><br><br>
<b><h2>Comenzi onorate</h2></b><br><br>
<?php
	$sqlTranzactii="SELECT id_tranzactie, DATE_FORMAT(data_tranzactiei,'%d-%m-%Y')
	AS data_tranzactie, nume_cumparator,adresa_cumparator
	FROM tranzactii WHERE comanda_onorata=1";
	$resursaTranzactii=mysql_query($sqlTranzactii);
	//if (mysql_num_rows($resursaTranzactii)>0){
	while ($rowTranzactie=mysql_fetch_array($resursaTranzactii))
	{
?>
	<form action="prelucrare_comenzi.php" method="POST">
		Data comenzii: <b><?php print $rowTranzactie['data_tranzactie']?>
		</b>
		<div style="width:500px; border:1px solid #ffffff; background-color:F9F1E7; padding:5px">
		<b><?php print $rowTranzactie['nume_cumparator']?></b>
			<br>
				<?php print $rowTranzactie['adresa_cumparator']?>
					<table border="1" cellpadding="4" cellspacing="0">
						<tr>
							<td align="center"><b>Carte</b></td>
							<td align="center"><b>Nr Buc</b></td>
							<td align="center"><b>Pret</b></td>
							<td align="center"><b>Total</b></td>
						</tr>
<?php
	$sqlCarti="SELECT titlu,nume_autor,pret,nr_buc FROM vanzari,carti,autori WHERE carti.id_carte=vanzari.id_carte
	AND carti.id_autor=autori.id_autor
	AND id_tranzactie=".$rowTranzactie['id_tranzactie'];
	$resursaCarti=mysql_query($sqlCarti);
	$totalGeneral=0;
		while($rowCarte = mysql_fetch_array($resursaCarti))
			{
				print '<tr><td>'.$rowCarte['titlu'].' de '.$rowCarte['nume_autor'].'</td>
					<td align="right">'.$rowCarte['nr_buc'].'</td>
					<td align="right">'.$rowCarte['pret'].'</td>';
				$total=$rowCarte['pret'] * $rowCarte['nr_buc'];
				print '<td align="right">'.$total.'</td>
						</tr>';
				$totalGeneral = $totalGeneral+$total;
			}
?>
	<tr>
		<td colspan="3" align="right">Total comanda:</td>
		<td><?php print $totalGeneral?>lei</td>
		
	</tr>
					</table>
	<input type="hidden" name="id_tranzactie" value="<?php echo $rowTranzactie['id_tranzactie']?>">
	<input type="submit" name="anuleaza_comanda" value="Anuleaza comanda">
		</div>
	</form>
<?php
	}
	//}
?>
</body> 
</html>