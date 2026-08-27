# Website Profil XI RPL
Website ini merupakan proyek pembelajaran
kolaborasi Git dan GitHub
1. Muhamad Jibrilian Sadiq Akasya - Project Manager
2. Synta Awalling - Developer Profil
3. Taufiq Nur Muhammad Irvan - Developer Anggota
## Pertanyaan
[Link URL GitHub](https://github.com/sxixa/website-profile-xi-rpl-09.git)

**1. Apa arti hasil git status?** <br>
Arti hasil git status adalah menampilkan kondisi terkini dari
Working Directory dan Staging Area dalam repository Git, untuk memantau perubahan file

**2. Mengapa setiap developer tidak langsung bekerja pada main?** <br>
Karena branch **Main** biasanya dianggap branch utama yang harus tetap stabil. Jadi tiap kontributor bisa testing dan debugging di branch masing-masing, sehingga project manager bisa review kode, membandingkan lalu merge pull request dari kontributor.

**3. Apa perbedaan dari commit berikut?**<br>
`git commit -m "update"` <br>
dan <br>
`git commit -m "Menambahkan halaman profil kelas"` <br>
**Jawaban** <br>
Beda commit message <br>

*Mana yang lebih baik?* <br>

Tentu saja yang terakhir karena messagenya informatif.

**4. Pertanyaan analisis sinkronisasi**
- **Apa fungsi `git pull`?** Untuk mengunduh perubahan terbaru dari repo remote ke repo lokal dan secara otomatis melakukan merge
- **Apa yang terjadi jika programmer tidak melakukan `git pull`?** Git tidak akan otomatis mengambil perubahan terbaru dari repo remote ke repo lokal
- **Mengapa main harus dijaga agar tetap stabil?** Karena branch main dianggap branch utama<br>

**5. Pertanyaan Conflict**
- **Mengapa conflict terjadi?** Conflict terjadi ketika dua perubahan menyentuh kode yang sama, tetapi git tidak tau harus memilih yang mana
- **Apakah conflict berarti Git rusak?** Tidak, masih bisa diresolve untuk memperbaikinya oleh pemilik repo atau kontributor lain yang memiliki izin
- **Siapa yang harus menentukan versi kode yang benar?** Pemilik repo atau kontributor lain yang memiliki izin
- **Mengapa komunikasi antar programmer penting?** Agar alur kerja projek bisa sesuai dengan tujuan akhir