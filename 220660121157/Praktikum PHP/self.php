<?php

class Lingkaran
{
	const PI = 3.14;

	public function luas($jari)
	{
        //keyword self hanya digunakan untuk memanggil property atau method yang bersifat statis dan juga untuk memanggil konstanta.
		echo self::PI * $jari * $jari;
	}
}

$lingkaran = new Lingkaran(); 

echo Lingkaran::PI;
echo PHP_EOL;

$lingkaran->luas(7); 
echo PHP_EOL;