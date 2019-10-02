<?php

include ("conectare.php");
include ("page_top.php");
include ("meniu.php");
$id_domeniu = $_GET['id_domeniu'];
$sqlNumeDomeniu = "SELECT nume_domeniu FROM domenii WHERE id_domeniu=".$id_domeniu;
$resursaNumeDomeniu = mysql_query($sqlNumeDomeniu);
$numeDomeniu = mysql_result($resursaNumeDomeniu,0,"nume_domeniu");
?>

<td valign="top">
<h1>Domeniu: <?php echo $numeDomeniu?></h1>
<b>Carti in domeniul
<u><i><?php echo $numeDomeniu?></i></u>:</b>
<table cellpadding="5">
<?php
$sql = "SELECT id_carte, titlu, descriere, pret, nume_autor FROM carti, autori, domenii WHERE carti.id_domeniu=domenii.id_domeniu AND carti.id_autor=autori.id_autor AND domenii.id_domeniu=".$id_domeniu;
$resursa = mysql_query($sql);
while ($row=mysql_fetch_array($resursa))
{ 
 ?>
 <tr>
  <td align="center">
  <?php
  $adresaImagine="coperte/".$row['id_carte'].".jpg";
  if (file_exists($adresaImagine))
  {
   print '<img src="'.$adresaImagine.'" width="75" height="100"> <br>';
  }
  else
  {
   print '<div style="width:75px; height:100px; border:1px black solid; background-color:#cccccc"> Fara imagine </div>';
  }
  ?>
  </td>
  <td>
   <b><a href="carte.php? id_carte=<?php echo $row['id_carte']?>">
   <?php echo $row['titlu']?> </a></b><br>
   <i>de <?php echo $row['nume_autor']?> </i>
   <br>Pret: <?php echo $row['pret']?> lei
  </td>
 </tr>
 <?php
}
?>
  </table>
 </td>
 <?php
 include ("page_bottom.php");
?>