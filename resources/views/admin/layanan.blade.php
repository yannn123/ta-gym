<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FIT HUB Admin Dashboard</title>
    @vite('resources/css/app.css')
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 50;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        @include('admin.partials.sidebar')
        <div class="flex-1 md:ml-72">
            @include('admin.partials.navbar', ['title' => 'Layanan'])
            <main class="p-6">
                <!-- Notification messages -->
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                @endif

                <div class="bg-white p-6 shadow-md rounded-lg">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">List Layanan</h2>
                        <button id="addLayananBtn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            Tambah Layanan
                        </button>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="py-3 px-4 border text-left">No</th>
                                    <th class="py-3 px-4 border text-left">Nama</th>
                                    <th class="py-3 px-4 border text-left">Deskripsi</th>
                                    <th class="py-3 px-4 border text-left">Harga</th>
                                    <th class="py-3 px-4 border text-left">Durasi Layanan</th>
                                    <th class="py-3 px-4 border text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($layanan as $index => $item)
                                <tr class="{{ $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' }}">
                                    <td class="py-3 px-4 border">{{ $index + 1 }}</td>
                                    <td class="py-3 px-4 border">{{ $item->nama_layanan }}</td>
                                    <td class="py-3 px-4 border">{{ $item->deskripsi }}</td>
                                    <td class="py-3 px-4 border">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td class="py-3 px-4 border">{{ $item->durasi_layanan }} Bulan</td>
                                    <td class="py-3 px-4 border">
                                        <div class="flex space-x-2">
                                            <button 
                                                class="editBtn bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm"
                                                data-id="{{ $item->id }}"
                                                data-nama="{{ $item->nama_layanan }}"
                                                data-deskripsi="{{ $item->deskripsi }}"
                                                data-harga="{{ $item->harga }}"
                                                data-durasi="{{ $item->durasi_layanan }}"
                                            >
                                                Edit
                                            </button>
                                            <button 
                                                class="deleteBtn bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm"
                                                data-id="{{ $item->id }}"
                                                data-nama="{{ $item->nama_layanan }}"
                                            >
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="py-4 px-4 border text-center text-gray-500">
                                        Tidak ada data layanan
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Add/Edit Modal -->
    <div id="layananModal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-center mb-4">
                <h3 id="modalTitle" class="text-lg font-semibold">Tambah Layanan</h3>
                <span class="close">&times;</span>
            </div>
            
            <form id="layananForm" method="POST" action="{{ route('admin.layanan.store') }}">
                @csrf
                <input type="hidden" id="method" name="_method" value="POST">
                <input type="hidden" id="layanan_id" name="layanan_id">
                
                <div class="mb-4">
                    <label for="nama_layanan" class="block text-gray-700 text-sm font-bold mb-2">Nama Layanan</label>
                    <input type="text" id="nama_layanan" name="nama_layanan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                </div>
                
                <div class="mb-4">
                    <label for="harga" class="block text-gray-700 text-sm font-bold mb-2">Harga (Rp)</label>
                    <input type="number" id="harga" name="harga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                
                <div class="mb-6">
                    <label for="durasi_layanan" class="block text-gray-700 text-sm font-bold mb-2">Durasi Layanan</label>
                    <input type="number" id="durasi_layanan" name="durasi_layanan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="contoh: 60 menit" required>
                </div>
                
                <div class="flex justify-end">
                    <button type="button" class="cancelBtn bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded mr-2">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content" style="max-width: 400px;">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Konfirmasi Hapus</h3>
                <span class="close">&times;</span>
            </div>
            
            <p class="mb-4">Apakah Anda yakin ingin menghapus layanan "<span id="deleteLayananName"></span>"?</p>
            
            <div class="flex justify-end">
                <button type="button" class="cancelDeleteBtn bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded mr-2">
                    Batal
                </button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const addBtn = document.getElementById('addLayananBtn');
            const layananModal = document.getElementById('layananModal');
            const deleteModal = document.getElementById('deleteModal');
            const modalCloseButtons = document.querySelectorAll('.close');
            const cancelBtn = document.querySelector('.cancelBtn');
            const cancelDeleteBtn = document.querySelector('.cancelDeleteBtn');
            const editButtons = document.querySelectorAll('.editBtn');
            const deleteButtons = document.querySelectorAll('.deleteBtn');
            const modalTitle = document.getElementById('modalTitle');
            const layananForm = document.getElementById('layananForm');
            const methodInput = document.getElementById('method');
            const layananIdInput = document.getElementById('layanan_id');

            // Open Add Modal
            addBtn.addEventListener('click', function() {
                modalTitle.textContent = 'Tambah Layanan';
                layananForm.reset();
                layananForm.action = "{{ route('admin.layanan.store') }}";
                methodInput.value = 'POST';
                layananModal.style.display = 'block';
            });

            // Open Edit Modal
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const nama = this.getAttribute('data-nama');
                    const deskripsi = this.getAttribute('data-deskripsi');
                    const harga = this.getAttribute('data-harga');
                    const durasi = this.getAttribute('data-durasi');

                    modalTitle.textContent = 'Edit Layanan';
                    document.getElementById('nama_layanan').value = nama;
                    document.getElementById('deskripsi').value = deskripsi;
                    document.getElementById('harga').value = harga;
                    document.getElementById('durasi_layanan').value = durasi;
                    
                    layananForm.action = `/admin/layanan/${id}`;
                    methodInput.value = 'PUT';
                    layananIdInput.value = id;
                    
                    layananModal.style.display = 'block';
                });
            });

            // Open Delete Modal
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const nama = this.getAttribute('data-nama');
                    
                    document.getElementById('deleteLayananName').textContent = nama;
                    document.getElementById('deleteForm').action = `/admin/layanan/${id}`;
                    
                    deleteModal.style.display = 'block';
                });
            });

            // Close
            modalCloseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    layananModal.style.display = 'none';
                    deleteModal.style.display = 'none';
                });
            });

            // Cancel
            if (cancelBtn) {
                cancelBtn.addEventListener('click', function() {
                    layananModal.style.display = 'none';
                });
            }
            
            if (cancelDeleteBtn) {
                cancelDeleteBtn.addEventListener('click', function() {
                    deleteModal.style.display = 'none';
                });
            }

            // tutup modal
            window.addEventListener('click', function(event) {
                if (event.target === layananModal) {
                    layananModal.style.display = 'none';
                }
                if (event.target === deleteModal) {
                    deleteModal.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>