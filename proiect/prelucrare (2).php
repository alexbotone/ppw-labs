<?
if($_POST['nume']== "")
{
print 'Trebuie sa completati numele!
< a href="cos.php">Inapoi</a>';
exit;
}

if($_POST['adresa'] =="")
{
print 'Trebuie sa completati adresa!
<a href="cos.php">Inpoi</a>';
exit;
}
session_start();
$nrCarti=array_sum($_SESSION['nr_buc']);
if($nrCarti ==0)
{
print 'Trebuie sa cumparati cel putin o carte! 
<a href="cos.php">Inapoi</a>';
exit;
}

include ("conectare.php");
$sqlTranzactie ="insert into tranzactii(nume_cumparator,adresa_cumparator) values ('".$_POST['adresa']."')";
$resursaTranzactie=mysql_query($sqlTranzactie);
$id_tranzactie= mysql_insert_id();

for ($i=0;$i<cont($_SESSION['id_carte']);
$i++)
{
	if($_SESSION['nr_buc'][$i] > 0)
	{
		/*Cream interogarea */
		$sqlVanzare = "INSERT INTO vanzari values('".$id_tranzactie."','".$_SESSION['id_carte'][$i]."','".$_SESSION['nr_buc'][$i]."')";
		mysql_query($sqlVanzare);
	}
}
$emailDestinatar = "mirza_andreea@yahoo.com";
$mesaj = "O noua comanda de la <b>".$_POST['nume']."</b><br>";
$mesaj .="Adresa:".$_POST['adresa']."<br>";
$mesaj .="Cartile comandate:<br><br>";
$mesaj .="<table border='1' cellspacing='0' cellpadding='4'>";
for($i=0;$i<count($_SESSION['id_carte']);$i++)
{
	if($_SESSION['nr_buc'][$i]>0)
	{
		$mesaj .="<tr><td>".$_SESSION['titlu'][$i]." de ".$_SESSION['nume_autor'][$i]."</td><td>".$_SESSION['nr_buc'][$i]." buc</td></tr>";
        $totalGeneral = $totalGeneral + ($_SESSION['nr_buc'][$i] * $_SESSION['pret'][$i]);		
	}
}
$mesaj .="</table>";
$mesaj .="Total: <b>".$totalGeneral."</b>";
$headers ="MIME-Version: 1.0\r\nContent-type: text/html; charset=iso-8859-2\r\n";
mail($emailDestinatar,$subiect,$mesaj,$headers);
session_unset();
session_destroy();

include("page_top.php");
include("meniu.php");
?>
<td valign="top">
<h1>Multumim!</h1>
Va multumim ca ati cumparat de la noi! Veti primi comanda solicitata in cel mai scurt timp.
</td>
<?
include("page_bottom.php");
?>



