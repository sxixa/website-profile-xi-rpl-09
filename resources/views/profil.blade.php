@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-slate-800">Profil Tim Developer</h1>
            <p class="text-slate-500 mt-2">Kelola informasi profil tim dan profil kelas XI RPL 1</p>
        </div>

        <div id="cardContainer" class="grid grid-cols-1 md:grid-cols-3 gap-6"></div>
    </div>


    <script>
        let profils = [
            { id: 1, nama: "SEKOLAH", peran: "SMKN 1 GARUT", deskripsi: "JL. Cimanuk." },
            { id: 2, nama: "Program Keahlian", peran: "Rekayasa Perangkat Lunak", deskripsi: "Software Engineer." },
            { id: 3, nama: "Deskripsi", peran: " ", deskripsi: "Menjadi kelas yang solid, inovatif, dan terampil dalam dunia pemrograman." },
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
@endsection