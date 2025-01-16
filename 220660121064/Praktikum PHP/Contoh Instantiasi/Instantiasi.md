Seperti yang sudah dijelaskan sebelumnya bahwa sebuah class hanyalah blueprint, maka untuk membuatnya menjadi real kita perlu melakukan instansiasi.

Proses instansiasi atau pembuatan object pada PHP ditandai dengan keyword `new` diikuti dengan nama class. Perhatikan contoh berikut:

```php
<?php

class Mobil
{
	public $roda;

	public function jalan()
	{
		echo 'Mobil berjalan';
	}

}

$avanza = new Mobil();
```

Pada contoh diatas, kita menginstansiasi class `Mobil` dan memasukkannya kedalam variable `$avanza` . Selain cara diatas, kita juga dapat melakukan instansiasi tanpa menggunakan tanda kurung `()` setelah nama class.

```php

<?php

class Mobil
{
	public $roda;

	public function jalan()
	{
		echo 'Mobil berjalan';
	}
}

$avanza = new Mobil;

Untuk memanggil method maupun property yang bersifat public dapat dilakukan sebagai berikut:

``
<?php

class Mobil
{
	public $roda;

	public function jalan()
	{
		echo 'Mobil berjalan';
	}
}

$avanza = new Mobil();
$avanza->roda = 4;

echo $avanza->jalan(); echo PHP_EOL;
echo $avanza->roda; echo PHP_EOL;

Sehingga bila program diatas dijalankan maka akan menghasilkan output sebagai berikut:

`php Mobil.php

Output:
Mobil berjalan 
4`

Anda juga dapat menjalankan program diatas secara online dengan membuka link berikut https://3v4l.org/RR865.