<!-- VERIFICAM DACA TOATE CAMPURILE FORMULARUI DE INTRODUCERE A COMENTARIILOR AU FOST COMPLETATE IAR DACA NU ATUNCI vom
AFISA UN MESAJ DE EROARE SI VOM OPRI EXECUTIA-->
<?php
if($_POST['nume_utilizator']==""||$_POST['adresa_email']==""||$_POST['comentariu']==""){
  echo 'Trebuie să completezi toate câmpurile!';
  exit;
}
 ?>
 <!-- DACA TOATE CONDITIILE AU FOST INDEPLINITE ATUNCI URMEAZA SA NE CONECTAM LA BAZA DE DATE -->
 <?php include("conectare.php")?>

 <!-- Folosim strip_tags din motive de securitate pentru a evita intentiile utilizatorilor de a introduce orice tip de  cod potential rau voitor -->
 <?php
$numeFaraTags=strip_tags($_POST['nume_utilizator']);
$emailFaraTags=strip_tags($_POST['adresa_email']);
$cometariuFaraTags=strip_tags($_POST['comentariu']);
$sql="INSERT INTO comentarii(id_comentariu,nume_utilizator,adresa_email,comentariu)VALUES(".$_POST['id_carte'].",'".$numeFaraTags."','".$emailFaraTags."','".$comentariuFaraTags."')";
echo $sql;
mysqli_query($sql);
// REDIRECTIONAM CLIENTUL CATRE PAGINA CARTII LA CARE A AGAUGAT UN Comentariu
$inapoi="produs.php?produs_id=".$_POST['produs_id'];
header("location: $inapoi");
  ?>
