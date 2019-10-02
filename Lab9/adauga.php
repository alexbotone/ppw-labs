<?php
session_start();
//am pornit sesiunea

if(isset($_POST['butonulAdauga']))// daca butonul a fost apasat se executa urmatorul cod
{
  $_SESSION['produs_id'][]=$_POST['produs_id'];
  $_SESSION['produs_denumire'][]=$_POST['produs_denumire'];
  $_SESSION['categorie_denumire'][]=$_POST['categorie_denumire'];
  $_SESSION['produs_pret'][]=$_POST['produs_pret'];
  $_SESSION['nr_bucati'][]=$_POST['nr_bucati'];
}

//am adaugat toate datele care se vor trimite prin post in variabile de sesiune
?>

<form action="" method="POST">
  <table>
    <tr>
    <td>ID: </td>
      <td><input type="number" name="produs_id"></td>
    </tr>
    <tr>
      <td>DENUMIRE: </td>
      <td><input type="text" name="produs_denumire"></td>
    </tr>
    <tr>
      <td>CATEGORIE:</td>
      <td><input type="text" name="categorie_denumire"></td>
    </tr>
    <tr>
      <td>PRET : </td>
      <td><input type="number" nume="produs_pret"></td>
    </tr>
    <tr>
      <td>NUMAR BUCATI : </td>
      <td><input type="number" nume="nr_bucati"></td>
    </tr>
    <tr>
      <td><input type="submit" nume="butonulAdauga"></td>
    </tr>
  </table>
</form>

<?php
  echo '<table border="1" cellspacing="0" cellpadding="4">';
 $nr_bucati=count($_SESSION['produs_id']);
 for($i=0;$i<$nr_bucati;$i++)
 {
   echo '<tr>';
   echo '<td>'.$_SESSION['produs_denumire'][$i].'</td>';
   echo '<td>'.$_SESSION['categorie_denumire'][$i].'</td>';
   echo '<td>'.$_SESSION['produs_pret'][$i].'</td>';
   echo '<td>'.$_SESSION['nr_bucati'][$i].'</td>';
   $total=$_SESSION['nr_bucati'][$i]*$_SESSION['produs_pret'][$i];
   echo '<td>'.$total.'</td>';
   echo '</tr>';
   $totalGeneral=$totalGeneral+$total;
   echo '</table>';
   echo '<p>/<p>'.$totalGeneral;
 }
 ?>
