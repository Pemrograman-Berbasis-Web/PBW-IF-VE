# Property
*property* adalah sebuah variable dapat digunakan dalam lingkup class atau object. 

*Property* sering disebut juga sebagai segala sesuatu yang dimiliki oleh *class*. 

*Property* memiliki visibilitas serta dapat memiliki nilai default. 

Perhatikan kembali contoh class Mobil berikut:

```php
<?php

class Mobil
{
	public $roda;
}
```
Pada contoh diatas, *property* `$roda` memiliki visibilitas public dan tanpa nilai default atau nilai awal. 

Untuk memberikan nilai awal pada *property* `$roda` , kita dapat melakukannya sebagai berikut:

```php
<?php

class Mobil
{
	public $roda = 4;
}
```
Pada contoh diatas, kita memberikan nilai awal pada *property* `$roda` dengan nilai 4 . 

Maka ketika kita melakukan instansiasi, secara otomasi *property* `$roda` akan langsung mempunyai nilai 4 sebagaimana yang telah kita definisikan.
