Keyword `$this`

- `$this` adalah referensi untuk objek instance saat ini dalam kelas. 
- Digunakan untuk mengakses properti atau metode milik objek tersebut.

Contoh Penggunaan `$this`:

```php
class Contoh {
    public $nama;

    public function setNama($nama) {
        $this->nama = $nama; // Menggunakan $this untuk mengakses properti $nama
    }

    public function getNama() {
        return $this->nama; // Menggunakan $this untuk mengambil nilai properti $nama
    }
}

$objek = new Contoh();
$objek->setNama('Pemrograman Berbasis Web');
echo $objek->getNama();
```

Penjelasan:

`$this->nama` digunakan untuk mengakses properti `nama` milik objek yang dipanggil.

Keyword `self`
- `self` digunakan untuk mengakses anggota kelas (properti atau metode) yang didefinisikan sebagai `static`.
- Tidak membutuhkan objek untuk diakses.

Contoh Penggunaan `self`:

```php
class Contoh {
    public static $versi = '1.0';

    public static function getVersi() {
        return self::$versi; // Menggunakan self untuk mengakses properti statis
    }
}

echo Contoh::getVersi();


Penjelasan:

self::$versi mengacu pada properti statis versi dalam kelas.
Tidak memerlukan objek instance.

Perbedaan $this dan self
Aspek	$this	self
Konteks	Instance objek	Kelas
Akses Properti/Metode	Non-statis (bukan static)	Statis (static)
Contoh Penggunaan	$this->nama	self::$versi


class Contoh {
    public $nama = 'PBW';
    public static $versi = '1.0';

    public function tampilkanNama() {
        return $this->nama; // Menggunakan $this untuk properti instance
    }

    public static function tampilkanVersi() {
        return self::$versi; // Menggunakan self untuk properti statis
    }
}

$objek = new Contoh();
echo $objek->tampilkanNama(); // Output: PBW
echo Contoh::tampilkanVersi(); // Output: 1.0

Catatan Penting
- $this hanya dapat digunakan dalam metode non-statis.
- self digunakan dalam konteks statis atau untuk konstanta kelas.
Dengan cara ini, $this dan self membantu membedakan penggunaan antara instance objek dan konteks kelas