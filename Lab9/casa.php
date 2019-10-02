<?php
session_start();
include("conectare.php");
include("page_top.php");
include("menu.php");
?>

<td valign="top">
  <h1>CASA<h1>
    Acestea sunt cărțile comandate de dumneavoastră:
    <table border="1" cellspacing="0" cellpadding="4">
      <tr bgcolor="white">
        <td><b>Nr. bucati</b></td>
        <td><b>Produs</b></td>
        <td><b>Pret</b></td>
        <td><b>Total</b></td>
      </tr>
      <?php
      for($i=0;$i<count($_SESSION['produs_id']);$i++)
      {
        $totalGeneral=0;
        if($_SESSION['nr_bucati'][$i]!=0)
        {// de ce imi afiseaza categoria in loc de denumirea produsului ???
          echo '<tr><td>'.$_SESSION['nr_bucati'][$i].'</td><td><b>'.$_SESSION['produs_denumire'][$i].'</td><td align="right">'.$_SESSION['produs_pret'][$i].
          'lei </td><td align="right">'.$_SESSION['produs_pret'][$i]*$_SESSION['nr_bucati'][$i].'lei </td></tr>';
          $totalGeneral=$totalGeneral+($_SESSION['produs_pret'][$i]*$_SESSION['nr_bucati'][$i]);

        }
      }
       echo '<tr><td align="right" colspan="3"><b>Total de plata</b></td>
       <td align="right"><b>'.$totalGeneral.'</b> lei </td></tr>';
      ?>
    </table>
    <h1>Detalii</h1>
    <form action="prelucrare.php" method="POST">
        <table>
          <tr>
              <td>Numele:</td>
              <td><input type="text" name="nume"></td>
          </tr>
          <tr>
            <td valign="top"><b>Adresa:</b></td>
            <td><textarea name="adresa" rows="6"></textarea></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" value="Trimite!"></td>
          </tr>
        </table>
    </form>
</td>
<?php include('page_bottom.php'); ?>
