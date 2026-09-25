<div align="center">

<img src="assets/banner.png" alt="E-Voting OSIS Banner" width="100%">

<br><br>

<img src="assets/logo.png" alt="Logo E-Voting OSIS" width="160">

<br>

# 🗳️ E-Voting OSIS

### Sistem Pemilihan Ketua & Wakil Ketua OSIS Berbasis Digital

<p>
  <img src="https://img.shields.io/badge/Laravel-Framework-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Bootstrap-Frontend-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/PWA-Progressive%20Web%20App-5A0FC8?style=for-the-badge&logo=pwa&logoColor=white" alt="PWA">
</p>

<p>
  <img src="https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Blade-Template-orange?style=flat-square" alt="Blade">
  <img src="https://img.shields.io/badge/JavaScript-ES6%2B-F7DF1E?style=flat-square&logo=javascript&logoColor=black" alt="JavaScript">
  <img src="https://img.shields.io/badge/Status-Development-yellow?style=flat-square" alt="Status">
</p>

<br>

<p>
  <strong>Digitalisasi proses pemilihan Ketua dan Wakil Ketua OSIS<br>
  untuk menciptakan proses pemilihan yang lebih praktis, terstruktur, dan modern.</strong>
</p>

<br>

</div>

---

## 📖 Tentang E-Voting OSIS

**E-Voting OSIS** adalah sistem informasi berbasis web yang dirancang untuk
mendigitalisasi proses pemilihan Ketua dan Wakil Ketua Organisasi Siswa
Intra Sekolah (OSIS).

Sistem ini membantu sekolah dan panitia dalam mengelola seluruh proses
pemilihan, mulai dari pengelolaan data siswa sebagai pemilih, data kelas,
kandidat, periode pemilihan, proses pemungutan suara, hingga rekapitulasi
hasil pemilihan.

Aplikasi dikembangkan menggunakan **Laravel** sebagai framework utama,
**Bootstrap** untuk antarmuka, **MySQL** sebagai database, serta dukungan
**Progressive Web App (PWA)** agar aplikasi dapat digunakan dengan nyaman
pada perangkat komputer maupun smartphone.

---

## 🎯 Tujuan Pengembangan

E-Voting OSIS dikembangkan untuk membantu sekolah melakukan transformasi
digital dalam proses pemilihan OSIS.

Tujuan utama sistem:

- 🗳️ Mendigitalisasi proses pemilihan Ketua dan Wakil Ketua OSIS
- 📄 Mengurangi penggunaan kertas dalam proses pemungutan suara
- ⚡ Mempercepat proses pemungutan dan rekapitulasi suara
- 👨‍🎓 Mempermudah siswa dalam melakukan pemilihan
- 👨‍💼 Mempermudah panitia dalam mengelola data pemilihan
- 📊 Mempermudah proses penghitungan dan rekapitulasi suara
- 🔐 Membantu mengatur hak akses pengguna
- 📱 Mendukung penggunaan pada perangkat mobile
- 🏫 Mendukung penerapan teknologi digital di lingkungan sekolah

---

# ✨ Fitur Utama

## 👨‍💼 Admin

Admin merupakan pengguna dengan hak akses utama untuk mengelola sistem.

Fitur Admin meliputi:

- 📊 Dashboard
- 👤 Manajemen pengguna
- 👨‍🎓 Manajemen data siswa
- 🏫 Manajemen data kelas
- 🗳️ Manajemen kandidat
- 📅 Manajemen pemilihan
- ⚙️ Pengaturan sistem
- 🔐 Pengelolaan hak akses
- 📈 Melihat rekapitulasi suara
- 🏆 Melihat hasil pemilihan

---

## 👨‍💼 Panitia

Panitia digunakan untuk membantu mengelola proses pemilihan OSIS.

Fitur Panitia meliputi:

- 📊 Melihat dashboard pemilihan
- 👨‍🎓 Melihat data pemilih
- 🗳️ Mengelola data kandidat
- 📅 Mengelola proses pemilihan
- 📈 Memantau jumlah suara
- 📊 Melihat rekapitulasi hasil voting

Hak akses panitia dapat disesuaikan dengan kebutuhan sekolah.

---

## 👨‍🎓 Pemilih

Pemilih merupakan siswa yang terdaftar sebagai peserta pemilihan.

Fitur Pemilih:

- 🔐 Login ke sistem
- 👤 Melihat informasi akun
- 👥 Melihat daftar kandidat
- 🖼️ Melihat foto kandidat
- 📋 Melihat visi dan misi
- 🗳️ Memilih pasangan kandidat
- ✅ Melakukan konfirmasi pilihan
- 📌 Melihat status pemilihan
- 🚫 Mencegah pemilih memberikan suara lebih dari satu kali

---

# 👥 Role Pengguna

Sistem memiliki beberapa jenis pengguna dengan hak akses yang berbeda.

<table>
<thead>
<tr>
<th align="center">Role</th>
<th align="center">Deskripsi</th>
<th align="center">Akses Utama</th>
</tr>
</thead>

<tbody>

<tr>
<td align="center">👨‍💼 <strong>Admin</strong></td>
<td>Mengelola keseluruhan sistem</td>
<td>Pengguna, siswa, kelas, kandidat, pemilihan, voting, dan hasil</td>
</tr>

<tr>
<td align="center">👨‍💼 <strong>Panitia</strong></td>
<td>Mengelola proses pemilihan</td>
<td>Kandidat, pemilih, pemilihan, monitoring, dan rekapitulasi</td>
</tr>

<tr>
<td align="center">👨‍🎓 <strong>Pemilih</strong></td>
<td>Siswa yang memberikan suara</td>
<td>Melihat kandidat dan melakukan voting</td>
</tr>

</tbody>
</table>

> 💡 Hak akses pengguna dapat disesuaikan dengan kebutuhan dan kebijakan
> masing-masing sekolah.

---

# 🧩 Modul Sistem

Sistem terdiri dari beberapa modul utama yang saling terintegrasi.

---

## 1️⃣ Manajemen Pengguna

Modul ini digunakan untuk mengelola akun pengguna yang dapat mengakses
sistem.

Data yang dapat dikelola antara lain:

- Nama pengguna
- Username / email
- Password
- Role pengguna
- Status akun

---

## 2️⃣ Manajemen Siswa

Modul ini digunakan untuk menyimpan dan mengelola data siswa yang terdaftar
sebagai pemilih.

Data siswa dapat meliputi:

- NIS / NISN
- Nama siswa
- Jenis kelamin
- Kelas
- Status pemilih
- Akun pengguna

---

## 3️⃣ Manajemen Kelas

Modul ini digunakan untuk mengelompokkan siswa berdasarkan kelas.

Contoh:

```text
Kelas X
├── X TKJ
├── X OTKP
└── X lainnya

Kelas XI
├── XI TKJ
├── XI OTKP
└── XI lainnya

Kelas XII
├── XII TKJ
├── XII OTKP
└── XII lainnya
