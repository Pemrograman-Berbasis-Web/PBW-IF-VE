<?php

class Mobil
{
	private $roda = 4;

	private function jalan()
	{
		echo 'Mobil berjalan';
	}
}

$avanza = new Mobil();

echo $avanza->jalan(); 
echo PHP_EOL;
echo $avanza->roda; 
echo PHP_EOL;