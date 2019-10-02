$titlu[] = "Dune";
$titlu[] = "Poezii";
$titlu[] = "Legendele Olimpului";
print $titlu[0]; //va afisa Dune
print $titlu[1]; //va afisa Poezii
print $titlu[2]; //va afisa Legendele Olimpului

$titlu[] = "Dune";
$titlu[] = "Poezii";
$titlu[] = "Legendele Olimpului";
$nrElementeInArray = count($titlu);
for ($i = 0; $i < $nrElementeInArray; $i++)
{
  print $titlu[$i]."<br>";
}