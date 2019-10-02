<?php
session_start();
    
mysql_connect("localhost", "root", "");
mysql_select_db("librarie");

include("page_top.php");
include("meniu.php");
//$id_autor=$_GET['id_autor'];
$id_carte=$_GET['id_carte'];
$sql = "SELECT titlu, nume_autor, descriere, pret FROM carti, autori WHERE id_carte=".$id_carte." AND carti.id_autor=autori.id_autor";
$resursa = mysql_query($sql);
$row = mysql_fetch_array($resursa);
?>
<td valign="top">
<table>
<tr>
<td valign="top">
<?php
$adresaImagine = "coperte/".$id_carte.".jpg";
if(file_exists($adresaImagine))
{ 
print '<img src="'.$adresaImagine.'" width="75" height="100" hspace="10"><br>';
}
?>
</td>
<td valign="top">
<h1><?=$row['titlu']?></h1>
<i>de <b><?php print $row['nume_autor']?></b></i>
<p><i><?php print $row['descriere']?></i></p>
<p>Pret:<?php print $row['pret']?> lei</p>
</td>
</tr>
</table>
<br />
<form action="cos.php?actiune=adauga" method="post">
<input type="hidden" name="id_carte" value="<?=$id_carte?>" />
<input type="hidden" name="titlu" value="<?=$row['titlu']?>" />
<input type="hidden" name="nume_autor" value="<?=$row['nume_autor']?>" />
<input type="hidden" name="pret" value="<?=$row['pret']?>" />
<input type="submit" value="Cumpara acum" />
</form>
<br />
<p><h2>Opiniile cititorilor</h2></p>
<?php
$sqlComentarii = "SELECT * FROM comentarii WHERE id_carte=".$id_carte;
$resursaComentarii = mysql_query($sqlComentarii);
while($row = mysql_fetch_array($resursaComentarii))
{
	print '<div style="width:400px;border:1px solid #dedede; background-color:#f0f0f0; padding:5px"><a href="mailto:'.$row['adresa_email'].'">'.$row['nume_utilizator'].'</a><br>'.$row['comentariu'].'</div>';
}
?>
<br />
<div style="width:400px;border:1px solid #dedede;background-color:#f0f0f0;padding:5px;">
<b>Adauga opinia ta:</b>
<hr size="1" />
<form action="adauga_comentariu.php" method="post">
Nume:<input type="text" name="nume_utilizator" /><br /><br />
Email:<input type="text" name="adresa_email" /><br /><br />
Comentariu:<br />
<textarea name="comentariu" cols="45"></textarea><br /><br />
<input type="hidden" name="id_carte" value="<?=$id_carte?>" />
<center><input type="submit" value="Adauga" /></center>
</form>
</div>
</td>
<?php
include("page_bottom.php");
?>	       
