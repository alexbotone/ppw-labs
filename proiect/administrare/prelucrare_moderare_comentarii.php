<?php
include("../conectare.php");
include("autorizare.php");
include("admin_top.php");
if(isset($_POST['modifica']))
{
	if($_POST['nume_utilizator']=="")
	{
	print "Nu ai completat numele utilizatorului!";
}
else if($_POST['adresa_email']=="")
{
	print "Nu ai completat adresa de email!";
}
else if($_POST['comentariu']=="")
{
	print "Campul Comentariu este gol!";
}
else 
{
	$sql="UPDATE comentarii SET nume_utilizator='".$_POST['nume_utilizator']."',
		adresa_email='".$_POST['adresa_email']."',comentariu='".$_POST['comentariu']."' WHERE id_comentariu=".$_POST['id_comentariu'];
		mysql_query($sql);
		print "Comentariul a fost modificat!";
}
}
if(isset($_POST['sterge']))
{
	$sql="DELETE FROM comentarii WHERE id_comentariu=".$_POST['id_comentariu'];
	mysql_query($sql);
	print "Comentariul a fost sters!";
}
if(isset($_POST['seteaza_moderate']))
{
	$sql="UPDATE admin SET ultimul_comentariu_moderat=".$_POST['ultimul_id'];
	mysql_query($sql);
	print "Valoarea a fost setata";
}
?>
</body>
</html>