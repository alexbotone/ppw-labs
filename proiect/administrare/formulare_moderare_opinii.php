<?php
include("../conectare.php");
include("autorizare.php");
include("admin_top.php");
if(isset($_POST['modifica']))
{
	$sql="SELECT *FROM comentarii WHERE id_comentariu=".$_POST['id_comentariu'];
	$resursa=mysql_query($sql);
	$row=mysql_fetch_array($resursa);
	?>
<h1>Modifica </h1>
<p> Modifica acest comentariu </b>
<form action="prelucrare_moderare_comentarii.php" method="POST">
Nume: <input type="text" name="nume_utilizator" value="<?php echo $row['nume_utilizator']?>">
Email: <input type="text" name="adresa_email" value="<?php echo $row['adresa_email']?>"> <br><br>
Comentariu: <br> <textarea name="comentariu" cols="45" rows="8">
<?php echo $row['comentariu']?>
</textarea> <br><br>
<input type="hidden" name="id_comentariu" value="<?php echo $_POST['id_comentariu']?>">
<input type="submit" name="modifica" value="Modifica">
</form>
<?php
}
if(isset($_POST['sterge']))
{
	?>
	<h1>Sterge</h1>
	Esti sigur ca vrei sa stergi acest comentariu?
	<form action="prelucrare_moderare_comentarii.php" method="POST">
	<input type="hidden" name="id_comentariu" value="<?php echo $_POST['id_comentariu']?>">
	<input type="submit" name="sterge" value="Sterge">
	</form>
	<?php
}
if(isset($_POST['seteaza_moderate']))
{
?>
<h1>Seteaza comentariile ca fiind moderate </h1>
Esti sigur ca vrei sa setezi comentariile din pagina precedenta ca fiind moderate?
<form action="prelucrare_moderare_comentarii.php" method="POST">
<input type="hidden" name="ultimul_id" value="<?php echo $_POST['ultimul_id']?>">
<input type="submit" name="seteaza_moderate" value="Da!">
</form>
<?php
}
?>
</body>
</html>
