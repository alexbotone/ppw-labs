/* include fisierul f_autorizare.php care porneste sesiunea, se conecteaza la baza de date si se declara functia de autorizare*/
<?
include("f_autorizare.php");
if(!autorizat())
{
  print 'Acces neautorizat!';
  exit;
}
include("meniu.php");
include("main.php");
?>