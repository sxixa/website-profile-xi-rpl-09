<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil & CRUD Anggota - XI RPL 1</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800 font-sans min-h-screen p-8">

    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-slate-800">Anggota Tim Developer</h1>
            <p class="text-slate-500 mt-2">Kelola informasi anggota tim dan profil kelas XI RPL 1</p>
            <button onclick="openModal()" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">
                + Tambah Anggota Profil
            </button>
        </div>

        <div id="cardContainer" class="grid grid-cols-1 md:grid-cols-3 gap-6"></div>
    </div>

    <!-- Modal Form (Create & Edit) -->
    <div id="modalForm" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-xl shadow-lg p-6 max-w-md w-full border-t-4 border-blue-500">
            <h2 id="modalTitle" class="text-xl font-bold mb-4 text-slate-800">Tambah Anggota</h2>
            <form id="profilForm" onsubmit="saveProfil(event)" class="space-y-4">
                <input type="hidden" id="profilId">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                    <input type="text" id="nama" class="w-full border rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Peran / Jabatan</label>
                    <input type="text" id="peran" class="w-full border rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Deskripsi Tugas</label>
                    <textarea id="deskripsi" rows="3" class="w-full border rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 text-sm border rounded-lg hover:bg-slate-50">Batal</button>
                    <button type="submit" class="px-4 py-2 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let profils = [
            { id: 1, nama: "Muhammad Jibrilian Sidiq Akasya", peran: "Project Manager", deskripsi: "Bertanggung jawab mengelola alur proyek dan pembagian tugas." },
            { id: 2, nama: "Synta Awaling", peran: "Developer Profile", deskripsi: "Merancang profil anggota tim dan halaman informasi." },
            { id: 3, nama: "Taufiq Nur Muhammad Irvan", peran: "Developer Anggota", deskripsi: "Mengurus dokumentasi dan komunikasi tim." },
            { id: 4, nama: "Abdul Jamil Febriansyah", peran: "Developer Kontak", deskripsi: "Membuat halaman kontak tim." }
        ];

        function renderCards() {
            const container = document.getElementById('cardContainer');
            container.innerHTML = '';
            profils.forEach(item => {
                const card = document.createElement('div');
                card.className = "bg-white rounded-xl shadow-sm p-6 border-t-4 border-blue-500 flex flex-col justify-between";
                card.innerHTML = `
                    <div>
                        <h2 class="text-lg font-bold text-slate-800">${item.nama}</h2>
                        <p class="text-sm text-blue-600 font-medium mb-3">${item.peran}</p>
                        <p class="text-sm text-slate-600 leading-relaxed">${item.deskripsi}</p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 flex gap-3 justify-end text-xs font-semibold">
                        <button onclick="editProfil(${item.id})" class="text-amber-600 hover:underline">Edit</button>
                        <button onclick="deleteProfil(${item.id})" class="text-red-600 hover:underline">Hapus</button>
                    </div>
                `;
                container.appendChild(card);
            });
        }

        function openModal() { document.getElementById('modalForm').classList.remove('hidden'); }
        function closeModal() {
            document.getElementById('modalForm').classList.add('hidden');
            document.getElementById('profilForm').reset();
            document.getElementById('profilId').value = '';
            document.getElementById('modalTitle').innerText = 'Tambah Anggota';
        }

        function saveProfil(e) {
            e.preventDefault();
            const id = document.getElementById('profilId').value;
            const nama = document.getElementById('nama').value;
            const peran = document.getElementById('peran').value;
            const deskripsi = document.getElementById('deskripsi').value;

            if (id) {
                const index = profils.findIndex(p => p.id == id);
                profils[index] = { id: parseInt(id), nama, peran, deskripsi };
            } else {
                const newId = profils.length ? Math.max(...profils.map(p => p.id)) + 1 : 1;
                profils.push({ id: newId, nama, peran, deskripsi });
            }
            renderCards();
            closeModal();
        }

        function editProfil(id) {
            const item = profils.find(p => p.id === id);
            if (item) {
                document.getElementById('profilId').value = item.id;
                document.getElementById('nama').value = item.nama;
                document.getElementById('peran').value = item.peran;
                document.getElementById('deskripsi').value = item.deskripsi;
                document.getElementById('modalTitle').innerText = 'Edit Anggota Profil';
                openModal();
            }
        }

        function deleteProfil(id) {
            if (confirm('Yakin ingin menghapus anggota ini?')) {
                profils = profils.filter(p => p.id !== id);
                renderCards();
            }
        }

        renderCards();
    </script>
</body>
</html>