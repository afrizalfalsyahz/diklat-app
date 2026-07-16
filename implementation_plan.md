# Product Requirements Document (PRD)
## Sistem Informasi Layanan Peminjaman BMN, Arsip & Pengambilan ATK — Balai Diklat Industri Denpasar

| | |
|--|--|
| **Nama Sistem** | Sistem Informasi Layanan Peminjaman BMN, Arsip & Pengambilan ATK |
| **Tanggal** | 16 Juli 2026 |
| **Penyusun** | — |
| **Instansi** | Balai Diklat Industri (BDI) Denpasar |

---

## Ringkasan Sistem

Balai Diklat Industri Denpasar membutuhkan sistem digital terpadu untuk mengelola layanan **peminjaman Barang Milik Negara (BMN), peminjaman Arsip, dan pengambilan Alat Tulis Kantor (ATK)**. Sistem ini memudahkan pegawai BDI untuk mengajukan peminjaman/pengambilan barang secara online, membantu admin (Prakom, Pengelola BMN, Arsiparis) mengelola persetujuan dan inventaris, serta menyediakan bukti form peminjaman/pengambilan yang dapat dicetak. Target: memangkas proses manual berbasis kertas menjadi **alur digital real-time dengan notifikasi otomatis dan pelacakan stok**.

---

## 1. Pengguna Sistem

| Peran | Siapa | Yang Mereka Lakukan |
|-------|-------|---------------------|
| **Superadmin (Prakom)** | Pranata Komputer BDI Denpasar | Kelola seluruh data, hak akses pengguna, manajemen user, tambah user baru, handle persetujuan peminjaman peralatan elektronik BMN |
| **Admin Pengelola BMN** | Pengelola BMN BDI Denpasar | Kelola data & persetujuan peminjaman seluruh Barang Milik Negara (BMN) |
| **Admin Arsiparis** | Arsiparis BDI Denpasar | Kelola data & persetujuan peminjaman arsip |
| **User (Pegawai)** | Pegawai BDI Denpasar | Ajukan peminjaman BMN/Arsip, ajukan pengambilan ATK, pantau status pengajuan, terima notifikasi pengembalian |

### Hak Akses & Cakupan Admin

| Admin | Cakupan Pengelolaan |
|-------|---------------------|
| **Prakom (Superadmin)** | Peralatan elektronik BMN + Manajemen User (CRUD user, assign role) |
| **Pengelola BMN** | Seluruh kategori BMN (termasuk elektronik) |
| **Arsiparis** | Khusus data arsip saja |

> [!IMPORTANT]
> Prakom sebagai Superadmin memiliki hak manajemen user: menambah user baru, mengubah role, dan menonaktifkan akun. Pengelola BMN dan Arsiparis **tidak** memiliki hak ini.

---

## 2. Layanan yang Dikelola Sistem

---

### Layanan 1 — Peminjaman Barang Milik Negara (BMN)

**Deskripsi:** Layanan peminjaman BMN (peralatan elektronik, meubelair, peralatan kantor, dll.) oleh pegawai BDI Denpasar untuk keperluan dinas. Barang harus dikembalikan sesuai tenggat waktu yang disepakati.

**Alur:**
1. User (Pegawai) memilih barang BMN yang tersedia dari daftar inventaris
2. User mengisi formulir peminjaman (nama barang, jumlah, tanggal pinjam, estimasi tanggal kembali, keperluan)
3. Admin (Pengelola BMN / Prakom untuk elektronik) menerima **notifikasi pengajuan baru**
4. Admin memverifikasi ketersediaan dan **menyetujui / menolak** pengajuan
5. User mengambil barang, status berubah menjadi "Dipinjam"
6. Sistem mengirim **notifikasi reminder** kepada User di hari pengembalian
7. User mengembalikan barang → Admin menerima **notifikasi pengembalian**
8. Admin memverifikasi kondisi barang dan mengkonfirmasi pengembalian
9. **Bukti form peminjaman** tersedia untuk di-print

**Data yang dicatat:** kode BMN · nama barang · kategori · jumlah dipinjam · nama peminjam · tanggal pinjam · tanggal jatuh tempo kembali · tanggal aktual kembali · kondisi barang saat kembali · status (Diajukan / Disetujui / Ditolak / Dipinjam / Dikembalikan) · admin yang menyetujui · keperluan

**Aturan bisnis:**
- Pengajuan peminjaman **wajib mendapat persetujuan** admin sebelum barang dapat diambil
- Peminjaman peralatan **elektronik** disetujui oleh **Prakom**, BMN lainnya oleh **Pengelola BMN**
- User menerima **notifikasi otomatis** pada hari jatuh tempo pengembalian
- Admin menerima **notifikasi** saat ada pengajuan baru dan saat barang dikembalikan
- Barang dengan status "Dipinjam" **tidak dapat dipinjam** oleh user lain (jika stok habis)
- Bukti form peminjaman dapat di-**print** dalam format PDF

---

### Layanan 2 — Peminjaman Arsip

**Deskripsi:** Layanan peminjaman dokumen arsip oleh pegawai BDI Denpasar untuk keperluan dinas. Dikelola oleh Arsiparis.

**Alur:**
1. User mencari arsip yang dibutuhkan dari katalog arsip
2. User mengisi formulir peminjaman arsip (judul arsip, nomor arsip, keperluan, estimasi tanggal kembali)
3. Arsiparis menerima **notifikasi pengajuan peminjaman arsip**
4. Arsiparis memverifikasi ketersediaan dan **menyetujui / menolak** pengajuan
5. User mengambil arsip, status berubah menjadi "Dipinjam"
6. Sistem mengirim **notifikasi reminder** kepada User di hari pengembalian
7. User mengembalikan arsip → Arsiparis menerima **notifikasi pengembalian**
8. Arsiparis memverifikasi kelengkapan dan kondisi arsip, lalu mengkonfirmasi pengembalian
9. **Bukti form peminjaman arsip** tersedia untuk di-print

**Data yang dicatat:** kode arsip · judul arsip · klasifikasi · lokasi simpan · nama peminjam · tanggal pinjam · tanggal jatuh tempo kembali · tanggal aktual kembali · kondisi arsip saat kembali · status (Diajukan / Disetujui / Ditolak / Dipinjam / Dikembalikan) · arsiparis yang menyetujui · keperluan

**Aturan bisnis:**
- Pengajuan peminjaman arsip **wajib mendapat persetujuan** Arsiparis
- Arsiparis menerima **notifikasi** saat ada pengajuan baru dan saat arsip dikembalikan
- User menerima **notifikasi otomatis** pada hari jatuh tempo pengembalian
- Satu arsip **tidak dapat dipinjam** oleh lebih dari satu user pada waktu bersamaan
- Arsip tertentu dapat diberi label **"Tidak Boleh Dipinjam"** oleh Arsiparis
- Bukti form peminjaman arsip dapat di-**print** dalam format PDF

---

### Layanan 3 — Pengambilan Alat Tulis Kantor (ATK)

**Deskripsi:** Layanan pengambilan ATK oleh pegawai BDI Denpasar untuk keperluan dinas. ATK bersifat habis pakai sehingga tidak perlu dikembalikan, namun stok harus dipantau.

**Alur:**
1. User memilih jenis ATK yang dibutuhkan dari daftar stok yang tersedia
2. User mengisi formulir pengambilan ATK (jenis ATK, jumlah, keperluan)
3. Admin (Pengelola BMN) menerima **notifikasi pengajuan pengambilan ATK**
4. Admin memverifikasi ketersediaan stok dan **menyetujui / menolak** pengajuan
5. User mengambil ATK, stok otomatis berkurang
6. **Bukti form pengambilan ATK** tersedia untuk di-print

**Data yang dicatat:** kode ATK · nama ATK · kategori · satuan · stok tersedia · jumlah diambil · nama pengambil · tanggal pengambilan · status (Diajukan / Disetujui / Ditolak / Diambil) · admin yang menyetujui · keperluan

**Aturan bisnis:**
- Pengambilan ATK **wajib mendapat persetujuan** admin (Pengelola BMN)
- Jumlah pengambilan **tidak boleh melebihi** stok yang tersedia
- Stok ATK **otomatis berkurang** setelah pengambilan disetujui dan barang diambil
- Admin menerima **notifikasi** saat ada pengajuan pengambilan ATK baru
- Admin dapat melakukan **restocking** (menambah stok) dan melihat riwayat stok
- Bukti form pengambilan ATK dapat di-**print** dalam format PDF
- Sistem menampilkan **peringatan stok menipis** saat stok di bawah batas minimum

---

## 3. Data Master

### Data BMN

| Field | Keterangan |
|-------|------------|
| Kode BMN | Kode unik barang milik negara |
| Nama Barang | Nama lengkap barang |
| Kategori | Elektronik, Meubelair, Peralatan Kantor, dll. |
| Merk/Tipe | Merk dan tipe barang |
| Tahun Perolehan | Tahun perolehan barang |
| Kondisi | Baik / Rusak Ringan / Rusak Berat |
| Jumlah | Kuantitas barang |
| Lokasi | Lokasi penyimpanan |
| Status | Tersedia / Dipinjam |

### Data Arsip

| Field | Keterangan |
|-------|------------|
| Kode Arsip | Kode unik arsip |
| Judul Arsip | Judul dokumen arsip |
| Klasifikasi | Jenis/klasifikasi arsip |
| Nomor Arsip | Nomor dokumen |
| Tahun | Tahun arsip |
| Lokasi Simpan | Rak/box penyimpanan |
| Status | Tersedia / Dipinjam / Tidak Boleh Dipinjam |

### Data ATK (dengan Stok)

| Field | Keterangan |
|-------|------------|
| Kode ATK | Kode unik ATK |
| Nama ATK | Nama barang ATK |
| Kategori | Alat Tulis, Kertas, Tinta, dll. |
| Satuan | Pcs, Rim, Buah, Pack, dll. |
| Stok Tersedia | Jumlah stok saat ini |
| Stok Minimum | Batas minimum untuk peringatan |
| Harga Satuan | Harga per satuan (opsional) |

---

## 4. Notifikasi

| Event | Penerima | Tipe Notifikasi |
|-------|----------|-----------------|
| Pengajuan peminjaman BMN baru | Pengelola BMN / Prakom (elektronik) | In-app + Email (opsional) |
| Pengajuan peminjaman arsip baru | Arsiparis | In-app + Email (opsional) |
| Pengajuan pengambilan ATK baru | Pengelola BMN | In-app + Email (opsional) |
| Pengajuan disetujui/ditolak | User (Pegawai) | In-app |
| Hari pengembalian BMN (reminder) | User (Pegawai) | In-app + Email (opsional) |
| Hari pengembalian Arsip (reminder) | User (Pegawai) | In-app + Email (opsional) |
| BMN dikembalikan | Pengelola BMN / Prakom | In-app |
| Arsip dikembalikan | Arsiparis | In-app |
| Stok ATK menipis | Pengelola BMN | In-app |

---

## 5. Laporan & Dashboard yang Dibutuhkan

### Dashboard Utama (tampil saat login)

| Informasi | Keterangan |
|-----------|------------|
| Total BMN yang sedang dipinjam | Jumlah BMN dengan status "Dipinjam" saat ini |
| Total Arsip yang sedang dipinjam | Jumlah arsip dengan status "Dipinjam" saat ini |
| Pengajuan menunggu persetujuan | Jumlah pengajuan BMN/Arsip/ATK yang belum diproses |
| Stok ATK menipis | Daftar ATK yang stoknya di bawah batas minimum |
| Peminjaman jatuh tempo hari ini | Daftar peminjaman yang harus dikembalikan hari ini |
| Aktivitas terbaru | Log aktivitas peminjaman/pengambilan terkini |

### Laporan Berkala

| Laporan | Frekuensi | Isi | Format |
|---------|-----------|-----|--------|
| Rekap Peminjaman BMN | Bulanan | Total peminjaman per kategori, peminjam terbanyak, barang paling sering dipinjam | Excel & PDF |
| Rekap Peminjaman Arsip | Bulanan | Total peminjaman arsip, arsip paling sering dipinjam | Excel & PDF |
| Rekap Pengambilan ATK | Bulanan | Total pengambilan per jenis ATK, konsumsi per unit kerja | Excel & PDF |
| Laporan Stok ATK | Bulanan | Stok awal, masuk, keluar, sisa stok per item | Excel & PDF |
| Riwayat Peminjaman per User | On-demand | Seluruh riwayat peminjaman/pengambilan satu pegawai | PDF |

---

## 6. Bukti Form (Printable)

### Form Peminjaman BMN
- Header: Logo & nama instansi BDI Denpasar
- Data peminjam: Nama, NIP, Unit Kerja
- Data barang: Kode BMN, Nama Barang, Jumlah, Kondisi
- Tanggal pinjam & tanggal wajib kembali
- Keperluan peminjaman
- Tanda tangan: Peminjam, Admin yang menyetujui
- Nomor form / kode transaksi unik

### Form Peminjaman Arsip
- Header: Logo & nama instansi BDI Denpasar
- Data peminjam: Nama, NIP, Unit Kerja
- Data arsip: Kode Arsip, Judul, Nomor Arsip
- Tanggal pinjam & tanggal wajib kembali
- Keperluan peminjaman
- Tanda tangan: Peminjam, Arsiparis yang menyetujui
- Nomor form / kode transaksi unik

### Form Pengambilan ATK
- Header: Logo & nama instansi BDI Denpasar
- Data pengambil: Nama, NIP, Unit Kerja
- Data ATK: Kode ATK, Nama ATK, Jumlah, Satuan
- Tanggal pengambilan
- Keperluan
- Tanda tangan: Pengambil, Admin yang menyetujui
- Nomor form / kode transaksi unik

---

## 7. Manajemen User (Superadmin / Prakom)

| Fitur | Keterangan |
|-------|------------|
| Tambah User Baru | Input nama, NIP, email, unit kerja, assign role |
| Edit User | Ubah data user dan role |
| Nonaktifkan User | Soft-delete / nonaktifkan akun pegawai |
| Daftar User | Lihat seluruh user beserta role-nya |
| Assign Role | Tentukan role: User, Prakom, Pengelola BMN, Arsiparis |
| Reset Password | Reset password user yang lupa |

---

> **Catatan untuk AI Coding Assistant:**
> - Setiap **layanan** di Bagian 2 → 1 modul Filament Resource + set tabel database
> - Setiap **alur** → urutan status pada kolom `status` di tabel transaksi
> - Setiap **data yang dicatat** → kolom-kolom pada tabel yang bersangkutan
> - Setiap **aturan bisnis** → validasi dan business logic di Model/Controller
> - Bagian 3 (Data Master) → Filament Resource untuk CRUD data BMN, Arsip, ATK
> - Bagian 4 (Notifikasi) → Laravel Notification + Filament Notification
> - Bagian 5 → widget dashboard Filament + fitur ekspor PDF/Excel
> - Bagian 6 (Bukti Form) → Blade view / DomPDF untuk generate PDF printable
> - Bagian 7 (Manajemen User) → Filament Shield / custom user management resource (hanya Prakom)
> - Role & permission: gunakan Spatie Laravel Permission atau Filament Shield

---
