<?
session_start();
if ($_SESSION['key_admin']!=session_id())
{
  print 'Acces neautorizat!';
  exit;
}
include ("../conectare.php");
$sql = "SELECT * FROM admin WHERE admin_nume='".$_SESSION ['nume_admin']."' AND admin_parola='".$_SESSION['parola_encriptata']."'";
$resursa = mysql_query($sql);
/* Daca nu returneaza exact un rand, vom afisa un mesaj de eroare */
if(mysql_num_rows($resursa) != 1)
{
  print 'Acces neautorizat!';
  exit;
}
?>
