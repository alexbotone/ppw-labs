<?php
session_start();
include("conectare.php");
include("page_top.php");
include("meniu.php");
$cuvant=$_GET['cuvant'];
?>
<td valign="top">
<h1>Rezultatele cautarii: </h1>
<p>Textul cautat: <b><?php echo $cuvant?>
</b></p>
<b>Autori</b>
<blockquote>
<?php
$sql="SELECT id_autor,nume_autor FROM autori WHERE nume_autor LIKE '%".$cuvant."%'";
$resursa=mysql_query($sql);
if(mysql_num_rows($resursa) == 0)
{
	print "<i>Niciun rezultat</i>";
}
while($row=mysql_fetch_array($resursa))
{
	
	print '<a href="carte.php? id_autor='.$row['id_autor'].'">'.$row['nume_autor'].'</a><br>';
		
}
?>
</blockquote>
<b>Titluri</b>
<blockquote>
<?php
$sql="SELECT id_carte,titlu FROM carti WHERE titlu LIKE '%".$cuvant."%'";
$resursa=mysql_query($sql);
if (mysql_num_rows($resursa) ==0)
{
	print "<i>Niciun rezultat</i>";
}
while ($row=mysql_fetch_array($resursa))
{
	
	print '<a href="carte.php? id_carte='.$row['id_carte'].'">'.$row['titlu'].'</a><br>';
	
}
?>
</blockquote>
<b>Descrieri</b>
<blockquote>
<?php
$sql="SELECT id_carte, titlu, descriere FROM carti WHERE descriere LIKE '%".$cuvant."%'";
$resursa=mysql_query($sql);
if(mysql_num_rows($resursa) == 0)
{
	print "<i>Niciun rezultat </i>";
}
while ($row=mysql_fetch_array($resursa))
{
	print '<a href="carte.php? id_carte='.$row['id_carte'].'">'.$row['titlu'].'</a><br>'.$row['descriere'].'<br><br>';
	
}
?>
</blockquote>
</td>
<?php
include ("page_bottom.php");
?>
