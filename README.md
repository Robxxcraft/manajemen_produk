## Manajemen Produk

Hasil tes Junior Programmer - Robbi Chandra


**Aplikasi yang dibutuhkan
<br />
-Xampp <br />
-Composer

### 1. Jalankan perintah dibawah ini untuk menyalin project

```sh
git clone https://github.com/Robxxcraft/manajemen_produk
```


### 2. Masuk ke dalam project yang telah disalin

```sh
cd manajemen_produk
```


### 3. Nyalakan Apache dan MySQL di Xampp

```sh
tekan tombol start pada Apache dan MySQL
```


### 4. Install package yang dibutuhkan

```sh
composer install
```


### 5. Buat database baru dengan jalankan perintah di bawah ini

```sh
php spark db:create manajemen_produk
```


### 6. Buat data seeder dengan jalankan perintah di bawah ini

```sh
php spark db:seed ProdukSeeder
```


### 7. Jalankan perintah di bawah ini untuk menjalankan aplikasi 

```sh
php spark serve
```

