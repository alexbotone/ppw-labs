<?php
include("../conectare.php");
include("autorizare.php");
include("admin_top.php");
?>
<h1>Adaugare</h1>
<b>Adauga domeniu</b>
<form action="prelucrare_adaugare.php" method="POST">
   Domeniu nou: <INPUT type="text" name="domeniu_nou">
   <INPUT type="submit" name="adauga_domeniu" value="Adauga">
</form>
<b>Adauga autor </b>
 <form action="prelucrare_adaugare.php" method="POST">
   Autor nou: <INPUT type="text" name="autor_nou">
   <INPUT type="submit" name="adauga_autor" value="Adauga">
 </form>
 <b> Adauga carte</b>
 <form action="prelucrare_adaugare.php" method="POST">
 <table>
 <tr>
 <td> Domeniu:</td>
 <td>
   <select name="id_domeniu">
<?php
 $sql = "SELECT * FROM domenii ORDER BY nume_domeniu ASC";
 $resursa = mysql_query($sql);
 while($row=mysql_fetch_array($resursa))
 {
   print '<option value="'.$row['id_domeniu'].'">'.$row['nume_domeniu'].'</option>';
 }
 ?>
 </select>
</td>
</tr>
<tr>
 <td>Autor:</td>
 <td>
  <select name="id_autor">
<?php
$sql = "SELECT * FROM autori ORDER BY nume_autor ASC";
$resursa = mysql_query($sql);
while($row = mysql_fetch_array($resursa))
{
 print '<option value="'.$row['id_autor'].'">'.$row['nume_autor'].'</option>';
}
?>
</select>
</td>
</tr>
<tr>
<td>Titluri:</td>
<td><INPUT type="text" name="titlu">
</td>
</tr>
<tr>
<td valign="top">Descriere:</td>
<td><textarea name="descriere" rows="8"></textarea></td>
</tr>
<tr>
<td>Pret:</td>
<td><INPUT type="text" name="pret">
</td>
</tr>
<tr>
<td></td>
<td><INPUT type="submit" name="adauga_carte" value="Adauga"></td>
</tr>
</table>
</form>
</body>
</html>
   