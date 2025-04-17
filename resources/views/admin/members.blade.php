<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members List - FIT HUB Admin</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        @include('admin.partials.sidebar')
        <div class="flex-1 md:ml-72">
            @include('admin.partials.navbar', ['title' => 'Members'])
            <main class="p-6">
                <!-- Flash Messages -->
                @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
                @endif

                <div class="bg-white p-6 shadow-md rounded-lg">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">List of Registered Members</h2>
                        <button 
                            onclick="openAddModal()"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
                            Add New
                        </button>
                    </div>
                    
                    <!-- Search Bar -->
                    <div class="mb-6">
                        <div class="relative flex items-center">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input 
                                type="search" 
                                id="memberSearch" 
                                placeholder="Search members by name, email, phone or address..." 
                                class="pl-10 pr-4 py-2 border border-gray-300 rounded-md w-full focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="flex space-x-2 mt-2">
                            <div class="flex items-center">
                                <input type="checkbox" id="searchName" class="searchFilter" checked>
                                <label for="searchName" class="ml-1 text-sm text-gray-600">Name</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="searchEmail" class="searchFilter" checked>
                                <label for="searchEmail" class="ml-1 text-sm text-gray-600">Email</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="searchPhone" class="searchFilter" checked>
                                <label for="searchPhone" class="ml-1 text-sm text-gray-600">Phone</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="searchAddress" class="searchFilter" checked>
                                <label for="searchAddress" class="ml-1 text-sm text-gray-600">Address</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="py-3 px-4 border text-left">No</th>
                                    <th class="py-3 px-4 border text-left">Member ID</th>
                                    <th class="py-3 px-4 border text-left">Name</th>
                                    <th class="py-3 px-4 border text-left">Email</th>
                                    <th class="py-3 px-4 border text-left">Phone</th>
                                    <th class="py-3 px-4 border text-left">Address</th>
                                    <th class="py-3 px-4 border text-left">Role</th>
                                    <th class="py-3 px-4 border text-left">Joined Date</th>
                                    <th class="py-3 px-4 border text-left">Is Active</th>
                                    <th class="py-3 px-4 border text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody id="memberTableBody">
                                @forelse($members as $index => $member)
                                <tr class="hover:bg-gray-100 member-row">
                                    <td class="py-3 px-4 border">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-4 border member-id">#M{{ str_pad($member->id, 3, '0', STR_PAD_LEFT) }}</td>
                                    <td class="py-3 px-4 border member-name">{{ $member->name }}</td>
                                    <td class="py-3 px-4 border member-email">{{ $member->email }}</td>
                                    <td class="py-3 px-4 border member-phone">{{ $member->no_hp }}</td>
                                    <td class="py-3 px-4 border member-address">{{ $member->alamat }}</td>
                                    <td class="py-3 px-4 border text-center">
                                        @php
                                            $latestTransaction = $member->transaksis->sortByDesc('created_at')->first();
                                        @endphp

                                        @if($member->role === 'admin')
                                            <span class="bg-green-200 rounded px-2 py-1">Admin</span>
                                        @elseif($latestTransaction && $latestTransaction->status === 'failed')
                                            <span class="bg-yellow-200 rounded px-2 py-1">Payment Issue</span>
                                        @else
                                            <span class="bg-blue-200 rounded px-2 py-1">Member</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 border">{{ $member->created_at->format('Y-m-d') }}</td>
                                    <td class="py-3 px-4 border">
                                        @php
                                            $activeTransaction = $member->transaksis->whereIn('status', ['completed'])->first();
                                        @endphp
                                        @if($activeTransaction)
                                            <span class="text-green-500">✔️</span>
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 border">
                                        <div class="flex space-x-2">
                                            <button 
                                                onclick="openEditModal({{ $member->id }}, '{{ $member->name }}', '{{ $member->email }}', '{{ $member->no_hp }}', '{{ addslashes($member->alamat) }}', '{{ $member->role }}')"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-2 rounded text-sm">
                                                Edit
                                            </button>
                                            <button 
                                                onclick="openDeleteModal({{ $member->id }}, '{{ $member->name }}')"
                                                class="bg-red-500 hover:bg-red-600 text-white py-1 px-2 rounded text-sm">
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr id="noMembersRow">
                                    <td colspan="10" class="py-3 px-4 border text-center text-gray-500">No members found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4" id="paginationContainer">
                        {{ $members->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Add/Edit Member Modal -->
    <div id="memberModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <!-- Backdrop -->
            <div id="memberModalBackdrop" class="fixed inset-0 bg-black opacity-50"></div>
            
            <!-- Modal -->
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full z-10 p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 id="memberModalTitle" class="text-lg font-medium text-gray-900">Add New Member</h3>
                    <button onclick="closeMemberModal()" class="text-gray-400 hover:text-gray-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form id="memberForm" action="{{ route('admin.member.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="memberFormMethod" value="POST">

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password <span id="passwordHint" class="text-sm text-gray-500 hidden">(Leave blank to keep current password)</span>
                        </label>
                        <input type="password" name="password" id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="no_hp" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="text" name="no_hp" id="no_hp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                    </div>

                    <div class="mb-4" id="roleContainer">
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <input type="hidden" name="role" id="role" value="admin">
                        <span class="bg-green-200 rounded px-2 py-1">Admin</span>
                    </div>

                    <div class="mb-6">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Address</label>
                        <textarea name="alamat" id="alamat" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required></textarea>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeMemberModal()" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <span id="memberModalSubmitText">Save</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <!-- Backdrop -->
            <div id="deleteModalBackdrop" class="fixed inset-0 bg-black opacity-50"></div>
            
            <!-- Modal -->
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full z-10 p-6">
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Confirm Delete</h3>
                </div>

                <p class="mb-6 text-gray-600">
                    Are you sure you want to delete member <span id="deleteMemberName" class="font-semibold"></span>? This action cannot be undone.
                </p>

                <div class="flex justify-end space-x-3">
                    <button onclick="closeDeleteModal()" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </button>
                    <form id="deleteForm" action="{{ route('admin.member.destroy', '') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let isEditing = false; // Flag to determine if we are in edit mode

        // Function to show/hide the role dropdown based on mode
        function toggleRoleDropdown() {
            const roleContainer = document.getElementById('roleContainer');
            if (isEditing) {
                roleContainer.style.display = 'none'; // Hide the dropdown in edit mode
            } else {
                roleContainer.style.display = 'block'; // Show the dropdown in add mode
            }
        }

        // Call this function when opening the add modal
        function openAddModal() {
            isEditing = false; // Set to add mode
            document.getElementById('memberForm').reset(); // Reset the form
            toggleRoleDropdown(); // Show the role dropdown
            document.getElementById('memberModal').classList.remove('hidden'); // Show the modal
        }

        // Call this function when opening the edit modal
        function openEditModal(id, name, email, phone, address, role) {
            isEditing = true; // Set to edit mode
            document.getElementById('name').value = name;
            document.getElementById('email').value = email;
            document.getElementById('no_hp').value = phone;
            document.getElementById('alamat').value = address;

            // Set the hidden role input value
            document.getElementById('role').value = role; // This will always be 'admin'

            toggleRoleDropdown(); // Hide the role dropdown

            // Set form action and method
            document.getElementById('memberForm').action = "{{ route('admin.member.update', '') }}/" + id;
            document.getElementById('memberFormMethod').value = 'PUT';

            // Show modal
            document.getElementById('memberModal').classList.remove('hidden');
        }

        function closeMemberModal() {
            document.getElementById('memberModal').classList.add('hidden');
        }

        // Delete Modal Functions
        function openDeleteModal(id, name) {
            document.getElementById('deleteMemberName').textContent = name;
            document.getElementById('deleteForm').action = "{{ route('admin.member.destroy', '') }}/" + id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Close modals when clicking on backdrop
        document.getElementById('memberModalBackdrop').addEventListener('click', closeMemberModal);
        document.getElementById('deleteModalBackdrop').addEventListener('click', closeDeleteModal);

        // Close modals with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeMemberModal();
                closeDeleteModal();
            }
        });
        
        // Search functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('memberSearch');
            const memberRows = document.querySelectorAll('.member-row');
            const noMembersRow = document.getElementById('noMembersRow');
            const paginationContainer = document.getElementById('paginationContainer');
            const searchFilters = document.querySelectorAll('.searchFilter');
            
            searchInput.addEventListener('input', performSearch);
            searchFilters.forEach(filter => {
                filter.addEventListener('change', performSearch);
            });
            
            function performSearch() {
                const searchTerm = searchInput.value.toLowerCase();
                let visibleCount = 0;
                
                // Check which filters are enabled
                const filterName = document.getElementById('searchName').checked;
                const filterEmail = document.getElementById('searchEmail').checked;
                const filterPhone = document.getElementById('searchPhone').checked;
                const filterAddress = document.getElementById('searchAddress').checked;
                
                memberRows.forEach(row => {
                    // Get searchable content based on enabled filters
                    let searchableContent = '';
                    
                    if (filterName) {
                        searchableContent += row.querySelector('.member-name').textContent.toLowerCase() + ' ';
                    }
                    
                    if (filterEmail) {
                        searchableContent += row.querySelector('.member-email').textContent.toLowerCase() + ' ';
                    }
                    
                    if (filterPhone) {
                        searchableContent += row.querySelector('.member-phone').textContent.toLowerCase() + ' ';
                    }
                    
                    if (filterAddress) {
                        searchableContent += row.querySelector('.member-address').textContent.toLowerCase() + ' ';
                    }
                    
                    // Check if row matches search term
                    if (searchTerm === '' || searchableContent.includes(searchTerm)) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });
                
                // Show or hide "No members found" message
                if (noMembersRow) {
                    if (visibleCount === 0 && memberRows.length > 0) {
                        // Create and show no results row if it doesn't exist
                        if (!document.getElementById('noResultsRow')) {
                            const noResultsRow = document.createElement('tr');
                            noResultsRow.id = 'noResultsRow';
                            const noResultsCell = document.createElement('td');
                            noResultsCell.colSpan = 10;
                            noResultsCell.className = 'py-3 px-4 border text-center text-gray-500';
                            noResultsCell.textContent = 'No matching members found';
                            noResultsRow.appendChild(noResultsCell);
                            
                            const tableBody = document.getElementById('memberTableBody');
                            tableBody.appendChild(noResultsRow);
                        } else {
                            document.getElementById('noResultsRow').style.display = '';
                        }
                    } else {
                        // Hide no results row if it exists
                        const noResultsRow = document.getElementById('noResultsRow');
                        if (noResultsRow) {
                            noResultsRow.style.display = 'none';
                        }
                    }
                }
                
                // Hide pagination when searching
                if (searchTerm === '') {
                    paginationContainer.style.display = '';
                } else {
                    paginationContainer.style.display = 'none';
                }
                
                // Update row numbers for visible rows
                let counter = 1;
                memberRows.forEach(row => {
                    if (row.style.display !== 'none') {
                        const numberCell = row.querySelector('td:first-child');
                        if (numberCell) {
                            numberCell.textContent = counter++;
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>