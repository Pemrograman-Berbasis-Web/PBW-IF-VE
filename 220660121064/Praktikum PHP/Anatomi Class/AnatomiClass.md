Untuk lebih memahami tentang struktur dari `class`, mari kita coba membedah kembali class `Mobil`.

```php
class Mobil
{
}
```
Keyword `class` adalah sebuah keyword yang digunakan PHP untuk menandai bahwa sebuah class didefinisikan.

Keyword `class` diikuti oleh nama class dalam hal ini adalah Mobil dan diikuti oleh kurung kurawal `{}` .

Didalam kurung kurawal itulah segala method maupun property dari sebuah class didefinisikan.

`public $roda;`

Keyword `public` menandai bahwa sebuah property atau method memiliki visibilitas public. Di PHP terdapat 4 visibilitas yaitu private, protected, public dan default (tidak didefinisikan).

Tentang visibilitas ini akan dibahas secara tersendiri pada pembahasan berikutnya. Setelah keyword `public` diikuti oleh variable `$roda` yang dalam konsep OOP disebut sebagai property yaitu sebuah variable yang dapat digunakan dalam lingkup object.

```php
public function jalan()
{
	echo 'Mobil berjalan';
}
```

Pada contoh diatas, terdapat keyword `public` yang fungsinya telah dijelaskan sebelumnya.

Setelah keyword `public` diikuti keyword `function` yang digunakan untuk menandai bahwa sebuah fungsi atau method didefinisikan.

Keyword `function` diikuti oleh nama method yaitu jalan dan ikuti dengan tanda kurung `()` dilanjutkan dengan kurung kurawal `{}`.

Diantara kurung kurawal `{}` terdapat baris program yaitu echo `'oleh _object_ Mobil berjalan';` , itulah yang disebut sebagai badan method.

Didalam badan method kita dapat mendefinisikan variable, memanggil method lain atau bahwa memanggil class lain. Mudahnya, didalam method kita dapat mendefinisikan apa saja yang kita dapat definisikan diluar method.

Namun yang perlu diingat adalah bahwa segala variable yang didefinisikan dalam method bersifat local sehingga hanya dapat digunakan pada lingkup method tersebut.

Jika Anda ingin membuat variable yang dapat diakses dalam lingkup object maka gunakanlah property.

Diantara tanda kurung `()` sebenarnya kita dapat mendefinisikan parameter yaitu variable yang akan dikirimkan ketika method tersebut dipanggil.