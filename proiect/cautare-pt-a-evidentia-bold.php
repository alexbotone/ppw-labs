<?
session_start();
include("conectare.php");
include("page_top.php");
include("meniu.php");
$cuvant = $_GET['cuvant'];
?>
<td valign="top">
<h1>Rezultatele cautarii</h1>
<p>Textul cautat: <b>?=$cuvant?> </b></p>
<b>Autori</b>
<blockquote>
<?
$sql = "SELECT id_autor, nume_autor FROM autori WHERE nume_autor LIKE '%".$cuvant."%'";
$resursa = mysql_query($sql);
if(mysql_num_rows($resursa) == 0)
{
  print "<i>Nici un rezultat</i>";
}
while ($row=mysql_fetch_array($resursa))
{ 
   $nume_autor = str_replace($cuvant,"<b>$cuvant</b>",$row['nume_autor']);
   print '<a href="autor.php? id_autor='.$row['id_autor'].'">'.$nume_autor.'</a><br>';   
}
?>
</blockquote>
<b>Titluri</b>
<blockquote>
<?
$sql="SELECT id_carte, titlu FROM carti WHERE titlu LIKE '%".$cuvant."%'";
$resursa = mysql_query($sql);
id(mysql_num_rows($resursa) == 0)
{
  print "<i>Nici un rezultat</i>";
}
while ($row=mysql_fetch_array($resursa))
{ 
  $titlu = str_replace($cuvant,"<b>$cuvant</b>",$row['titlu']);
  print '<a href="carte.php?id_carte='.$row['id_carte'].'">'.$row['titlu'].'</a><br>';
}
?>
</blockquote>
<b>Descrieri</b>
<blockquote>
<?
$sql = "SELECT id_carte, titlu, descriere FROM carti WHERE descriere LIKE '%".$cuvant."%'";
$resursa = mysql_query($sql);
if(mysql_num_rows($resursa) == 0)
{
  print "<i>Nici un rezultat</i>";
}
while ($row=mysql_fetch_array($resursa))
{
  $descriere = str_replace($cuvant,"<b>$cuvant</b>",$row['descriere']);
  print '<a href="carte.php?id_carte='.$row['id_carte'].'">'.$row['titlu'].'</a><br>'.$row['descriere'].'<br><br>';
}
?>
</blockquote>
</td>
<?
include ("page_bottom.php");
>?



$stringModificat = str_replace("textul vechi din string ce urmeaza a fi modificat", "textul nou, modificat", $stringVechi);
