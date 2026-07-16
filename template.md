# Product Requirements Document (PRD)
## Sistem Informasi Layanan [Nama Instansi]

| | |
|--|--|
| **Nama Sistem** | Sistem Informasi Layanan [Nama Instansi] |
| **Tanggal** | [Tanggal] |
| **Penyusun** | [Nama] — [Jabatan] |
| **Instansi** | [Nama Instansi Lengkap] |

---

## Ringkasan Sistem

> *Jelaskan dalam 2–4 kalimat: apa sistemnya, untuk siapa, dan manfaat utamanya.*

[Nama Instansi] membutuhkan sistem digital terpadu untuk mengelola layanan **[sebutkan: pelatihan / sewa fasilitas / sertifikasi / dll]**. Sistem ini memudahkan klien mendaftar layanan secara online, membantu staf mengelola transaksi, dan memberikan pimpinan laporan real-time. Target: memangkas waktu proses dari **[kondisi saat ini]** menjadi **[kondisi yang diinginkan]**.

---

## 1. Pengguna Sistem

| Peran | Siapa | Yang Mereka Lakukan |
|-------|-------|---------------------|
| **Administrator** | [contoh: Staf TI] | Kelola seluruh data dan hak akses pengguna |
| **Operator Layanan** | [contoh: Staf loket/administrasi] | Input pendaftaran, konfirmasi, cetak invoice |
| **Pimpinan** | [contoh: Kepala Balai / Direktur] | Lihat dashboard dan laporan — hanya baca |
| **Klien Individu** | [contoh: Profesional/peserta perorangan] | Daftar layanan, upload dokumen, cek status |
| **Klien Instansi** | [contoh: Kepala Bagian SDM] | Daftarkan rombongan, terima invoice kolektif |

---

## 2. Layanan yang Dikelola Sistem

> *Untuk setiap layanan: jelaskan alurnya dan data apa yang perlu dicatat.*
> *Aturan bisnis penting wajib dituliskan — ini yang akan menjadi validasi di sistem.*

---

### Layanan 1 — [Nama Layanan, contoh: Pelatihan Teknis]

**Deskripsi:** [contoh: Penyelenggaraan pelatihan teknis bagi pegawai instansi lain. Peserta mendaftar, mengikuti pelatihan, dan mendapatkan sertifikat.]

**Alur:**
1. Klien memilih jadwal pelatihan yang tersedia
2. Klien mengisi formulir pendaftaran (nama, asal instansi, jumlah peserta)
3. Operator memverifikasi dan mengkonfirmasi pendaftaran
4. Klien menerima invoice dan melakukan pembayaran
5. Peserta mengikuti pelatihan dan mengisi absensi
6. Sertifikat diterbitkan setelah pelatihan selesai

**Data yang dicatat:** nama peserta · asal instansi · jadwal dipilih · status pembayaran · kehadiran · nomor sertifikat

**Aturan bisnis:**
- Kuota maksimal **[X] peserta** per kelas — jika penuh, pendaftaran otomatis ditutup
- Pembayaran lunas minimal **H-[X]** sebelum pelatihan dimulai
- [Tambahkan aturan lain]

---

### Layanan 2 — [Nama Layanan, contoh: Sewa Fasilitas / Asrama]

**Deskripsi:** [contoh: Penyewaan ruang kelas, aula, dan kamar asrama untuk kegiatan instansi lain.]

**Alur:**
1. Klien mengecek ketersediaan fasilitas di kalender
2. Klien mengajukan permohonan sewa dengan detail kegiatan dan tanggal
3. Operator mengkonfirmasi dan mengirim invoice sewa
4. Klien check-in dan check-out sesuai jadwal yang disetujui

**Data yang dicatat:** nama fasilitas · tanggal check-in/out · nama kegiatan · jumlah tamu · total biaya

**Aturan bisnis:**
- Satu fasilitas **tidak bisa dipesan dua kali** di tanggal yang sama
- Pembatalan kurang dari **[X] hari** dikenakan biaya [X]%
- [Tambahkan aturan lain]

---

### Layanan 3 — [Nama Layanan, contoh: Sertifikasi Profesi]

**Deskripsi:** [Tuliskan deskripsi layanan Anda]

**Alur:**
1. [Langkah 1]
2. [Langkah 2]
3. [Langkah 3]
4. [Langkah 4]

**Data yang dicatat:** [sebutkan data yang perlu disimpan]

**Aturan bisnis:**
- [Aturan 1]
- [Aturan 2]

---

### Layanan 4 — [Salin blok di atas untuk layanan tambahan]

---

## 3. Laporan & Dashboard yang Dibutuhkan

### Dashboard Utama (tampil saat login)

| Informasi | Keterangan |
|-----------|------------|
| [contoh: Total penerimaan bulan ini] | [contoh: Jumlah PNBP yang diterima bulan berjalan] |
| [contoh: Jumlah pendaftaran minggu ini] | [contoh: Pendaftaran baru 7 hari terakhir per layanan] |
| [contoh: Fasilitas aktif hari ini] | [contoh: Ruangan/kamar yang sedang digunakan] |
| [Tambahkan] | |

### Laporan Berkala

| Laporan | Frekuensi | Isi | Format |
|---------|-----------|-----|--------|
| [contoh: Rekap PNBP] | Bulanan | [contoh: Total per jenis layanan] | Excel & PDF |
| [contoh: Statistik Peserta] | Triwulanan | [contoh: Jumlah per jenis pelatihan] | PDF |
| [Tambahkan] | | | |

---

> **Catatan untuk AI Coding Assistant:**
> - Setiap **layanan** di Bagian 2 → 1 modul Filament Resource + set tabel database
> - Setiap **alur** → urutan status pada kolom `status` di tabel transaksi
> - Setiap **data yang dicatat** → kolom-kolom pada tabel yang bersangkutan
> - Setiap **aturan bisnis** → validasi dan business logic di Model/Controller
> - Bagian 3 → widget dashboard Filament + fitur ekspor PDF/Excel

---
