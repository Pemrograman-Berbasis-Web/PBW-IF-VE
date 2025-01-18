# PRAKTIKUM FRAMEWORK
Implementasi _CRUD_ dengan Laravel 11 dan Vue JS menggunakan Inertia. Berikut adalah penjelasan kodenya:

## `database/migrations/2025_01_16_210943_create_posts_table.php`
1. **Namespace dan Import:**
   - `use Illuminate\Database\Migrations\Migration;` : Mengimpor kelas `Migration` yang menyediakan fungsionalitas dasar untuk migrasi di Laravel.
   - `use Illuminate\Database\Schema\Blueprint;` : Mengimpor `Blueprint` yang memungkinkan kita mendefinisikan struktur tabel.
   - `use Illuminate\Support\Facades\Schema;` : Mengimpor `Schema` yang digunakan untuk melakukan operasi pada skema database, seperti membuat atau menghapus tabel.

2. **Fungsi `up()`**:
   - Fungsi ini digunakan untuk menjalankan operasi migrasi, dalam hal ini membuat tabel baru.
   - `Schema::create('posts', function (Blueprint $table) {...})`: Ini membuat tabel `posts` di database. Di dalam closure, kita mendefinisikan struktur tabel.
     - `$table->id()` : Menambahkan kolom `id` yang menjadi primary key dengan tipe auto-increment.
     - `$table->string('title')` : Menambahkan kolom `title` dengan tipe string, untuk menyimpan judul dari sebuah post.
     - `$table->text('body')` : Menambahkan kolom `body` dengan tipe text, yang biasanya digunakan untuk menyimpan isi artikel atau konten post.
     - `$table->timestamps()` : Menambahkan dua kolom yaitu `created_at` dan `updated_at`, yang secara otomatis mengatur waktu saat data dibuat atau diperbarui.

3. **Fungsi `down()`**:
   - Fungsi ini digunakan untuk membatalkan migrasi, dalam hal ini untuk menghapus tabel `posts` jika migrasi dibatalkan.
   - `Schema::dropIfExists('posts')`: Ini akan menghapus tabel `posts` jika tabel tersebut ada. Ini berguna untuk rollback atau mengembalikan perubahan ketika migrasi dibatalkan.
- **`up()`** digunakan untuk mendefinisikan dan menjalankan perubahan (membuat tabel).
- **`down()`** digunakan untuk membatalkan perubahan tersebut (menghapus tabel).

## `App/Models/Post.php`
1. **Namespace dan Import:**
   - `namespace App\Models;` : Menetapkan namespace untuk model ini, yaitu berada di dalam folder `app/Models`.
   - `use Illuminate\Database\Eloquent\Factories\HasFactory;` : Mengimpor trait `HasFactory`, yang memungkinkan kita untuk menggunakan Factory dalam model ini. Factory sering digunakan untuk membuat data palsu (dummy data) untuk keperluan testing atau seeding.
   - `use Illuminate\Database\Eloquent\Model;` : Mengimpor kelas `Model` dari Eloquent, yang merupakan kelas dasar dari semua model di Laravel. Kelas ini memberikan banyak fungsionalitas seperti interaksi dengan database.

2. **Kelas `Post`**:
   - `class Post extends Model`: Mendeklarasikan kelas `Post`, yang merupakan model Eloquent yang berhubungan dengan tabel `posts` dalam database. Kelas ini mewarisi semua fitur yang disediakan oleh Eloquent, seperti operasi CRUD (Create, Read, Update, Delete).
   
3. **Trait `HasFactory`**:
   - `use HasFactory;` : Menggunakan trait `HasFactory`, yang menyediakan kemampuan untuk menggunakan factory, yaitu untuk membuat data model palsu secara otomatis. Hal ini sangat berguna saat melakukan seeding atau testing.

4. **Atribut `$fillable`**:
   - `protected $fillable = ['title', 'body'];`: Ini adalah array yang mendefinisikan kolom mana saja yang bisa diisi secara massal (mass assignment). Artinya, kita dapat mengisi kolom `title` dan `body` secara langsung dengan data dalam array atau saat melakukan operasi `create` atau `update`.
   
## `app/Http/Controllers/PostController.php`
1. **`index()`**:
   - Fungsi ini digunakan untuk menampilkan daftar semua post yang ada di database. Mengambil data dari tabel `posts` menggunakan `Post::all()`, lalu mengirim data tersebut ke tampilan `Post/Index` menggunakan `Inertia::render()`.
   - **Inertia.js** memungkinkan kita untuk membuat aplikasi frontend modern dengan Vue.js atau React.js, dan controller ini mengirim data ke tampilan frontend melalui Inertia.

2. **`create()`**:
   - Fungsi ini digunakan untuk menampilkan form untuk membuat post baru. Ini akan merender tampilan `Post/Create` dengan menggunakan Inertia.

3. **`store(Request $request)`**:
   - Fungsi ini menangani penyimpanan data post baru yang dikirimkan melalui form (method POST). Data dari request diambil dengan `$request->all()` dan digunakan untuk mengisi model `Post`. Kemudian, data tersebut disimpan ke database dengan `$post->save()`.
   - Setelah berhasil menyimpan, pengguna diarahkan ke halaman daftar post (`posts.index`).

4. **`edit(Post $post)`**:
   - Fungsi ini digunakan untuk menampilkan form pengeditan untuk sebuah post yang sudah ada. Laravel akan secara otomatis mencari post berdasarkan ID yang diberikan melalui route model binding. Post yang ditemukan akan diteruskan ke tampilan `Post/Edit`.

5. **`update(Request $request, Post $post)`**:
   - Fungsi ini digunakan untuk memperbarui data post yang ada. Data yang dikirimkan melalui request akan digunakan untuk memperbarui model `Post`. Setelah data diperbarui, pengguna akan diarahkan kembali ke halaman daftar post.

6. **`destroy(Post $post)`**:
   - Fungsi ini digunakan untuk menghapus sebuah post dari database. Laravel akan mencari post berdasarkan ID yang diberikan melalui route model binding dan kemudian menghapusnya. Setelah itu, pengguna diarahkan kembali ke halaman sebelumnya.

## `routes/web.php`
1. **`use App\Http\Controllers\PostController;`**:
   - Baris ini mengimpor `PostController` ke dalam file routing (biasanya `web.php` di Laravel). Dengan cara ini, kita dapat menggunakan controller tersebut untuk menangani permintaan HTTP pada rute yang terkait.

2. **`Route::resource('posts', PostController::class);`**:
   - Fungsi ini digunakan untuk mendefinisikan **resource route** di Laravel, yang secara otomatis menghubungkan berbagai URL (endpoint) dengan metode-metode dalam controller (`PostController` dalam hal ini).
   - Laravel menyediakan 7 metode default yang secara otomatis akan dihubungkan dengan rute-rute yang relevan. Metode-metode tersebut adalah:
   
   - **GET /posts** – Menampilkan daftar semua post (`index` method di controller).
   - **GET /posts/create** – Menampilkan form untuk membuat post baru (`create` method di controller).
   - **POST /posts** – Menyimpan post baru ke dalam database (`store` method di controller).
   - **GET /posts/{post}** – Menampilkan detail dari sebuah post tertentu (`show` method di controller).
   - **GET /posts/{post}/edit** – Menampilkan form untuk mengedit post yang ada (`edit` method di controller).
   - **PUT/PATCH /posts/{post}** – Memperbarui post tertentu dalam database (`update` method di controller).
   - **DELETE /posts/{post}** – Menghapus post tertentu dari database (`destroy` method di controller).

## `resources/js/Pages/Post/Index.vue`
1. **`defineProps`**:
   - Menetapkan properti `posts` yang akan diterima oleh komponen ini. Properti ini bertipe array dan akan berisi daftar post yang diteruskan dari backend Laravel.
   - **Default Value**: Jika tidak ada nilai `posts` yang diteruskan, maka array kosong (`[]`) akan digunakan sebagai nilai default.

2. **`useForm`**:
   - Menginisialisasi form kosong dengan hook `useForm` dari Inertia.js. Ini digunakan untuk menangani operasi form, seperti pengiriman data dan penghapusan data.
   - Form ini dipersiapkan untuk digunakan dalam fungsi `deletePost` untuk mengirimkan permintaan HTTP `DELETE`.

3. **`deletePost`**:
   - Fungsi ini menerima `id` dari post yang ingin dihapus.
   - Menggunakan metode `form.delete()` dari `useForm` untuk mengirimkan permintaan `DELETE` ke endpoint `posts/{id}` di backend.
   - Inertia.js akan menangani permintaan tersebut dan memperbarui tampilan halaman tanpa me-refresh halaman.

4. **`<Head>`**:
   - Komponen ini digunakan untuk mengatur tag `<head>` HTML, khususnya untuk mengatur title halaman. Dalam hal ini, title halaman diatur menjadi "Manage Posts".

5. **`<AuthenticatedLayout>`**:
   - Layout ini digunakan untuk membungkus seluruh konten halaman. Layout ini menyediakan struktur dasar (seperti header, sidebar, dll.) yang konsisten di seluruh aplikasi bagi pengguna yang telah terautentikasi.

6. **`<template #header>`**:
   - Menyediakan bagian header dalam layout, yang berisi judul halaman yang mengatakan "Manage Posts". Ini memberi konteks kepada pengguna tentang halaman yang sedang mereka lihat.

7. **`<Link href="posts/create">`**:
   - Tombol ini adalah link yang mengarah ke halaman `posts/create`, memungkinkan pengguna untuk membuat post baru. Inertia.js digunakan untuk menangani navigasi antar halaman tanpa me-refresh seluruh halaman.

8. **Tabel Daftar Post**:
   - Tabel ini berfungsi untuk menampilkan daftar post yang diterima melalui props `posts`. Setiap post ditampilkan dalam baris tabel (`<tr>`) dengan kolom-kolom untuk **ID**, **Title**, dan **Content**.
   - **`v-for="post in posts"`**: Digunakan untuk mengiterasi array `posts` dan menampilkan setiap post dalam tabel.
   - **`@click="deletePost(post.id)"`**: Ketika tombol **Delete** diklik, fungsi `deletePost` dipanggil dengan ID post yang relevan. Ini akan mengirimkan permintaan untuk menghapus post tersebut.

9. **Tombol Edit**:
   - Tombol ini mengarahkan pengguna ke halaman untuk mengedit post yang bersangkutan. Navigasi dilakukan menggunakan komponen `Link` dari Inertia.js, yang memungkinkan transisi halaman tanpa me-refresh halaman.

10. **Tombol Delete**:
    - Tombol ini memungkinkan pengguna untuk menghapus post. Ketika diklik, ia memanggil fungsi `deletePost(post.id)`, yang akan menghapus post tersebut dari database menggunakan HTTP request `DELETE`.

## `resources/js/Pages/Post/Create.vue`
1. **`useForm`**:
   - **`useForm`** adalah hook dari Inertia.js yang digunakan untuk menangani form, termasuk pengiriman data. Dalam kode ini, `useForm` menginisialisasi form dengan dua field: `title` dan `body`, keduanya dimulai dengan nilai kosong.
   - **`v-model`**: Digunakan untuk mengikat input form ke properti `title` dan `body` pada objek `form`. Setiap perubahan pada input akan diperbarui secara otomatis di dalam objek `form`.

2. **`submit`**:
   - **`submit`** adalah fungsi yang dipanggil saat form disubmit.
   - Fungsi ini menggunakan metode `form.post()` dari Inertia.js untuk mengirim data form ke server pada endpoint `/posts` menggunakan HTTP method `POST`. 
   - `@submit.prevent="submit"` digunakan untuk mencegah perilaku default form (yang biasanya melakukan refresh halaman) dan menggantikannya dengan pengiriman data menggunakan Inertia.js.

3. **`<AuthenticatedLayout>`**:
   - Layout ini membungkus konten halaman dan memberikan struktur untuk tampilan halaman yang memerlukan autentikasi (misalnya, header, footer, sidebar, dsb.).

4. **`<Link href="/posts">`**:
   - Link ini memungkinkan navigasi kembali ke halaman daftar post dengan URL `/posts`. 
   - Tombol **Back** menggunakan **Inertia.js's Link** untuk berpindah halaman tanpa me-refresh seluruh halaman.

5. **`<form @submit.prevent="submit">`**:
   - Form ini menangani inputan pengguna untuk membuat post baru.
   - **`@submit.prevent="submit"`**: Mencegah form melakukan submit standar (refresh halaman), dan memanggil fungsi `submit` yang mengirimkan data ke server.

6. **`<input>` dan `<textarea>`**:
   - Form input untuk judul dan konten post.
   - **`v-model="form.title"`** dan **`v-model="form.body"`** digunakan untuk mengikat nilai input ke properti dalam objek `form`, yang memastikan bahwa perubahan pada input akan tercermin dalam objek data.

7. **Tombol Submit**:
   - Tombol ini digunakan untuk mengirimkan form.
   - Ketika diklik, tombol ini akan memanggil metode `submit()` dan mengirimkan data form ke server untuk disimpan.

## `resources/js/Pages/Post/Edit.vue`
1. **`defineProps`**:
   - **`defineProps`** digunakan untuk mendefinisikan properti yang diterima oleh komponen ini. Dalam hal ini, `post` adalah objek yang berisi data dari post yang akan diedit.
   - **`post`**: Diambil sebagai properti, yang akan berisi data post yang ada (title dan body) yang ingin diedit.

2. **`useForm`**:
   - **`useForm`** digunakan untuk mengelola data form dan status pengirimannya.
   - **`title: props.post.title`** dan **`body: props.post.body`**: Nilai awal dari form diambil dari data `post` yang diterima melalui properti. Ini memungkinkan pengguna untuk melihat dan mengedit data yang ada.
   - **`form.put()`**: Fungsi untuk mengirim data yang diubah ke server menggunakan metode HTTP PUT, yang mengupdate post yang ada. Endpoint yang dipanggil adalah `/posts/{id}`, di mana `id` diambil dari properti `post.id`.

3. **`submit`**:
   - Fungsi ini dipanggil saat pengguna mengirimkan form (dengan menekan tombol submit).
   - **`form.put(`/posts/${props.post.id}`)`**: Data form yang sudah diubah akan dikirim ke backend untuk mengupdate post yang sesuai dengan ID yang diberikan.

4. **`<Link href="/posts">`**:
   - Ini adalah tombol **Back**, yang menggunakan **Inertia.js's Link** untuk menavigasi kembali ke halaman daftar posts tanpa melakukan refresh halaman.

5. **`<form @submit.prevent="submit">`**:
   - **`@submit.prevent="submit"`**: Mencegah form melakukan submit standar (yang biasanya akan melakukan reload halaman), dan menggantikannya dengan pengiriman data menggunakan metode `submit` yang sudah didefinisikan.
   
6. **`<input>` dan `<textarea>`**:
   - Form input untuk mengedit data post.
   - **`v-model="form.title"`** dan **`v-model="form.body"`** mengikat input dengan properti dalam objek `form`, yang memungkinkan data form berubah secara otomatis saat pengguna melakukan perubahan pada input.

7. **Tombol Submit**:
   - Tombol ini digunakan untuk mengirimkan data form yang sudah diedit.
   - Ketika diklik, tombol ini akan memicu pengiriman data ke backend melalui metode PUT untuk mengupdate post.

## `resources/js/Layouts/AuthenticatedLayout.vue`
1. **`<NavLink>`**:
   - Ini adalah komponen yang berfungsi untuk membuat sebuah link navigasi yang mendukung status aktif _(active state)._
   - Biasanya, komponen ini digunakan dalam sistem navigasi untuk menunjukkan link mana yang sedang aktif.

2. **`:href="route('posts.index')"`**:
   - **`:href`** adalah sintaks Vue.js untuk binding dinamis ke atribut `href`. 
   - **`route('posts.index')`**: Ini adalah fungsi dari **Inertia.js** atau Laravel yang mengembalikan URL untuk route yang dinamai `posts.index`. Dengan menggunakan `route()`, kamu tidak perlu menuliskan URL secara manual, melainkan hanya menggunakan nama route yang didefinisikan di file `web.php` (di Laravel) atau di tempat lain yang mendefinisikan route.
   - Jadi, kode ini membuat **link** menuju halaman yang memiliki route dengan nama `posts.index` (misalnya halaman daftar post).

3. **`:active="route().current('posts.index')"`**:
   - **`:active`** adalah binding dinamis untuk menentukan apakah link tersebut aktif atau tidak.
   - **`route().current('posts.index')`**: Fungsi **`route().current()`** memeriksa apakah route yang sedang diakses sesuai dengan nama route yang diberikan (dalam hal ini `posts.index`).
   - Jika halaman saat ini adalah halaman yang terhubung dengan route `posts.index`, maka properti `active` akan bernilai `true`, yang akan memberi tahu komponen `NavLink` bahwa link ini sedang aktif.
   - Biasanya, komponen `NavLink` akan menambahkan kelas CSS seperti `active` ke link tersebut agar tampil berbeda (misalnya dengan mengganti warnanya), menunjukkan bahwa link tersebut mewakili halaman yang sedang aktif.

4. **`Posts`**:
   - Ini adalah teks yang akan ditampilkan di dalam link navigasi. Ketika pengguna mengklik link ini, mereka akan diarahkan ke halaman daftar post yang didefinisikan di route `posts.index`.

## 📝 Lisensi  
&copy; 2025 Anisa Pebriyani Huslan.