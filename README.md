## Cara Clone Repository

Utuk melakukan clone repository ikuti langkah berikut:

1. Clone repository fhs-management.

```console
git clone https://github.com/arieffadhlan/fhs-management.git
```

2. Install vendor dengan menggunakan composer (pastikan sudah ada composer di sistem).

```console
composer install
```

3.  Buat folder baru dengan nama ".env". Setelah itu copy semua yang ada di file ".env.example", kemudian paste ke dalam file ".env".
4.  Generate APP_KEY

```console
php artisan generate:key
```

5.  Clear Cache

```console
php artisan config:cache
```

## Cara Kontribusi

Untuk melakukan Kontribusi ikuti langkah berikut:

1. Buat kodingan untuk fitur yang sudah dibagikan.
2. Pastikan kodingan **tidak ada eror** dan **tidak mempengaruhi kodingan lain secara fatal**.
3. Menambahkan file dari working directory ke staging index

```console
git add .
```

4. Mengecek status dari repository

```console
git status
```

5. Commit file

```console
git commit -m "Pesan Commit anda (misal: add stock)"
```

6. Push file ke repository

```console
git push -u origin master
```

## Cara mengambil kodingan dari commit teman

```console
git pull origin master
```
