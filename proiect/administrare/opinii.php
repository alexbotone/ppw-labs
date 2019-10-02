<?php
include ("../conectare.php");
include("autorizare.php");
include("admin_top.php");
?>
<h1> Modificarea sau stergerea comentarii utilizatori </h1>
<b> Comentariile utilizatorilor de la ultima moderare </b>
<?php
$sql="SELECT * FROM comentarii, admin, carti, autori WHERE id_comentariu>admin.ultimul_comentariu_moderat AND carti.id_carte=comentarii.id_carte AND carti.id_autor=autori.id_autor ORDER BY id_comentariu ASC";
$resursa=mysql_query($sql);
while($row=mysql_fetch_array($resursa))
{
?>
<form action="formulare_moderare_opinii.php" method="POST">
<div style="width:500px; border:1px solid #ffffff; background-color:#F9F1E7; padding:5px">
<b><?php echo $row['titlu']?></b>de
<?php echo $row['nume_autor']?>
<HR size="1">
<a href="mailto:<?php echo $row['adresa_email']?>">
<?php echo $row['nume_utilizator']?>
</a> <br>
<?php echo $row['comentariu']?>
</div>
<INPUT type="hidden" name="id_comentariu" value="<?php echo $row['id_comentariu']?>">
<INPUT type="submit" name="modifica" value="Modifica">
<INPUT type="submit" name="sterge" value="Sterge">
</form>
<?php
}
$nrComentarii=mysql_num_rows($resursa);
if($nrComentarii>0)
{
	?>
	<form action="formulare_moderare_opinii.php" method="POST">
	<INPUT type="hidden" name="ultimul_id" value="<?php echo $ultimul_id?>">
	<INPUT type="submit" name="seteaza_moderate" value="Seteaza aceste comentarii ca fiind moderate">
	</form>
	<?php
}
else
{
	print "<p>Nu exista comentarii noi. </p>";
}
?>
</body>
</html>