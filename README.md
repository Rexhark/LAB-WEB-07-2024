# LAB-WEB-07-2024

Repository ini dibuat sebagai wadah pengumpulan tugas praktikum mata kuliah **Praktikum Pemrograman Web 2024**. Setiap mahasiswa diharapkan mengunggah hasil tugas praktikum sesuai dengan instruksi yang telah diberikan oleh asisten praktikum.

## Struktur Repository

Setiap mahasiswa akan memiliki **branch** sendiri dengan format **NIM**. Di dalam branch tersebut, mahasiswa wajib membuat folder dengan format:

`NIM - Nama Lengkap`

Contoh: `H071230000 - John Doe`

Folder ini akan berisi semua tugas praktikum yang dikumpulkan oleh mahasiswa tersebut.

### Struktur Branch Mahasiswa
Di dalam branch masing-masing, mahasiswa wajib mengorganisir tugas dengan struktur seperti berikut:
```
H071230000 - John Doe/ 
|-- Tugas Praktikum 1/ 
|   |-- ...
|-- Tugas Praktikum 2/ | 
|   |-- ...
|-- Tugas Praktikum 3/ | 
|   |-- ...
|-- dst.
```

### Struktur di Branch `main`
Branch `main` akan berisi daftar semua folder mahasiswa yang berisi semua tugas (akan di-merge dari tiap branch mahasiswa tiap pekannya oleh asisten):
```
LAB-WEB-07-2024/
|-- H071230000 - John Doe/
|   |-- Tugas Praktikum 1/
|   |   |-- ...
|   |-- Tugas Praktikum 2/
|   |   |-- ...
|   |-- Tugas Praktikum 3/
|   |   |-- ...
|   |-- ...
|-- H071230001 - Jane Doe/
|   |-- Tugas Praktikum 1/
|   |   |-- ...
|   |-- Tugas Praktikum 2/
|   |   |-- ...
|   |-- Tugas Praktikum 3/
|   |   |-- ...
|   |-- ...
|-- H071230002 - Foo Bar/
|   |-- Tugas Praktikum 1/
|   |   |-- ...
|   |-- Tugas Praktikum 2/
|   |   |-- ...
|   |-- Tugas Praktikum 3/
|   |   |-- ...
|   |-- ...
```

## Daftar Tugas Praktikum

1. **Tugas Praktikum 1: HTML as Skeleton**
   - Deskripsi: Membuat 2 halaman website statis menggunakan HTML.
   - Deadline: 14 September 2024
2. **Tugas Praktikum 2: CSS as Skin**
   - Deskripsi: Membuat halaman menggunakan CSS sesuai layout ynag telah diberikan.
   - Deadline: 21 September 2024
3. **Tugas Praktikum 3: Framework CSS (Bootstrap)**
   - Deskripsi: Membuat sebuah landing page menggunakan Bootstrap.
   - Deadline: 28 September 2024
...

## Petunjuk Penggunaan

1. **Fork** repository ini ke akun GitHub masing-masing.
2. **Clone** repository yang telah di-fork ke lokal.
   ```
   git clone https://github.com/rexhark/LAB-WEB-07-2024.git
   ```
3. Pindah ke branch masing-masing sesuai NIM Anda.
4. Buat folder dengan format `NIM - Nama Lengkap` (jika belum ada).
5. Tambahkan file tugas di dalam folder tersebut (simpan di dalam folder untuk masing-masing tugas).
6. Lakukan commit dan push perubahan ke repository Anda.
   ```
   git add .
   git commit -m "Menambahkan tugas praktikum 1"
   git push origin main
   ```
7. Setelah tugas selesai, kirimkan Pull Request (PR) untuk di-review oleh asisten.

### Jika ada pertanyaan lebih lanjut, silakan hubungi asisten praktikum melalui grup WhatsApp.
