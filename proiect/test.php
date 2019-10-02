<?php
session_start();
if(isset($_POST['butonulAdauga']))
{
	$_SESSION['titlu'][]=$_POST['titlu'];
	$_SESSION['autor'][]=$_POST['autor'];
	$_SESSION['nr_buc'][]=$_POST['nr_buc'];
	$_SESSION['pret'][]=$_POST['pret'];
}
if(isset($_POST['butonulModifica']))
{
	for($i=0; $i<count($_SESSION['titlu']); $i++)
	{
		$_SESSION['nr_buc'][$i]= $_POST['nr_buc'][$i];
	}
}
	?>
    <form action="test.php" method="post">
        <table>
            <tr>
                <td>Titlu:</td>
                <td><input type="text" name="titlu"></td>
            </tr>
            <tr>
                <td>Autor:</td>
                <td><input type="text" name="autor"></td>
            </tr>
            <tr>
                <td>Pret:</td>
                <td><input type="text" name="pret"></td>
            </tr>
            <tr>
                <td>Nr buc:</td>
                <td><input type="text" name="nr_buc"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="butonulAdauga" value="Adauga"></td>
            </tr>
        </table>
    </form>
    <?php
	?>
        <form action="test.php" method="post">
            <table border="1" cellspacing="0" cellpadding="4">';
                <?php
	print '<tr>
	<td><b>Titlu</b></td>
	<td><b>Autor</b></td>
	<td><b>Pret</b></td>
	<td><b>Nr buc</b></td>
	<td><b>Total</b></td>
	</tr>';
	$nrCarti=count($_SESSION['titlu']);
	for ($i=0; $i<$nrCarti; $i++)
	{
		print '<tr>';
		print '<td>'.$_SESSION['titlu'][$i].'</td>';
		print '<td>'.$_SESSION['autor'][$i].'</td>';
		print '<td>'.$_SESSION['pret'][$i].'</td>';
		print '<td><input type="text" name="nr_buc['.$i.']" value="'.$_SESSION['nr_buc'][$i].'">
		</td>';
		$total=$_SESSION['nr_buc'][$i]*$_SESSION['pret'][$i];
		print '<td>'.$total.'</td>';
		print '</tr>';
		$totalGeneral=$totalGeneral+$total;
	}
	print '<table>';
?>
                    <input type="submit" name="butonulModifica" value="Modifica">
        </form>
        <?php
print 'Total general:'.$totalGeneral;
?>