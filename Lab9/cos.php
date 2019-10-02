<?php
    session_start();
    include ("conectare.php");
    include ('page_top.php');
    include ('menu.php');
    $actiune=$_GET['actiune'];
    if (isset($_GET['actiune']) && $_GET['actiune'] == 'adauga') {
        $_SESSION['produs_id'][] = $_POST['produs_id'];
        $_SESSION['produs_denumire'][] = $_POST['produs_denumire'];
        $_SESSION['produs_pret'][] = $_POST['produs_pret'];
        $_SESSION['nr_bucati'][] = 1;
        $_SESSION['noulNrBuc'][]=0;
    }
    if (isset($_GET['actiune']) && $_GET['actiune'] == 'modifica') {
        for($i=0; $i<count($_SESSION['produs_id']); $i++) {

                $_SESSION['nr_bucati'][$i] = $_POST['noulNrBuc'][$i];

        }
        //redirect pt a actualiza nr de carti din meniul lateral
        //header("location:modifica.php");
    }
?>

<td valign="top">
	<fieldset class="fieldset">
		<table width="100%"><tr><td><h1>Cosul de cumparaturi</h1></td>
					<td align="right"><img src="img\cos1.jpg" style="width:120px;"></td>
				</tr>
		</table>
			<form action="cos.php?actiune=modifica" method="POST">
			<table border="1" cellpspacing="0" cellpadding="4">
				<tr bgcolor="#F5DEB3">
					<td><b>Nr. buc</b></td>
					<td><b>Produs</b></td>
					<td><b>Pret</b></td>
					<td><b>Total</b></td>
				</tr>
            <?php
				$totalGeneral=0;
				for($i = 0; $i < count($_SESSION['produs_id']); $i++)
				{
          if($_SESSION['nr_bucati'][$i]!=0){
                     echo '<tr><td><input type="text" name="noulNrBuc['.$i.']" size="1" value="'.$_SESSION['nr_bucati'][$i].'"></td><td><b>'
                     .$_SESSION['produs_denumire'][$i].'</b><td align="right">'.$_SESSION['produs_pret'][$i].
                     '</td><td align="right">'.($_SESSION['produs_pret'][$i]*$_SESSION['nr_bucati'][$i]).' lei</td></tr>';
					 $totalGeneral=$totalGeneral+($_SESSION['produs_pret'][$i]*$_SESSION['nr_bucati'][$i]);
         }}
                echo '<tr bgcolor="#F5DEB3"><td align=right" colspan="3"><b>Total in cos</b></td><td align="right"><b>'. $totalGeneral .
                '</b> RON</td></tr>';
            ?>
        </table>
        <input type="submit" name="butonulModifica" value="Modifica"><br><br>
        Introduceti <b>0</b> pentru produsele pe care doriti sa le scoateti din cos!
        <h1>Continuare</h1>

        <table>
            <tr>
                <td width="200" align="center"><img src="img\cos1.jpg" style="width: 20px;"><a href="index.php">Continua cumparaturile</a></td>
                <td width="200" align="center"><img src="img\casa.png" style="width: 20px;"><a href="casa.php">Mergi la casa</a></td>
            </tr>
        </table>
    </form>
	</fieldset>
</td>

<?php
include ('page_bottom.php');
?>
