<?php
session_start();
$_SESSION['titlu'][]="Manual de geografie";
$_SESSION['autor'][]="Popescu Ion";
$_SESSION['pret'][]=25;
$_SESSION['nr_buc'][]=30;
print '<table border="1">';
$nrCarti=count($_SESSION['titlu']);
for($i=0; $i<$nrCarti; $i++)
{
	print '<tr>';
	print '<td>'.$_SESSION['titlu'][$i].'</td>';
	print '<td>'.$_SESSION['autor'][$i].'</td>';
	print '<td>'.$_SESSION['pret'][$i].'</td>';
	print '<td>'.$_SESSION['nr_buc'][$i].'</td>';
	$total=$_SESSION['nr_buc'][$i]*$_SESSION['pret'][$i];
	print '<td>'.$total.'</td>';
	print '</tr>';
	$totalGeneral=$totalGeneral+$total;
}
print '</table>';
print 'Total General:'.$totalGeneral;
?>


