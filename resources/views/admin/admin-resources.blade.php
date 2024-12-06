<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Resources</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <x-admin-sidebar></x-admin-sidebar>

        <!-- Main Content -->
        <div class="container mx-auto py-6">
            <!-- Helpful Links Section -->
            <h2 class="text-2xl font-bold mb-6 text-center">Helpful Links</h2>
            <button onclick="openAddModal('resource')" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-4">
                Add Resource
            </button>
            <div class="grid grid-cols-3 gap-6">
                @foreach ($resources as $resource)
                    <div class="border rounded-lg shadow-lg overflow-hidden relative p-4">
                        <a href="{{ $resource->url }}" target="_blank" class="block">
                            <img src="{{ $resource->thumbnail }}" alt="{{ $resource->title }}" class="w-full h-40 object-cover">
                            <div class="p-4 text-center">
                                <h3 class="text-md font-semibold mb-8">{{ $resource->title }}</h3>
                            </div>
                        </a>
                        <button
                            onclick="openEditModal('resource', {{ $resource }})"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded absolute bottom-0 inset-x-0 m-4 mt-8">
                            Edit
                        </button>
                    </div>
                @endforeach
            </div>
        
            <div class="my-12"></div>
        
            <!-- Articles Section -->
            <h2 class="text-2xl font-bold mb-6 text-center">Articles</h2>
            <button onclick="openAddModal('article')" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-4">
                Add Article
            </button>
            <div class="grid grid-cols-3 gap-6">
                @foreach ($articles as $article)
                    <div class="border rounded-lg shadow-lg p-4 relative">
                        <a href="{{ $article->url }}" target="_blank" class="block">
                            <h3 class="text-md font-semibold">{{ $article->title }}</h3>
                            <p class="text-sm text-gray-600 mt-2 mb-14">{{ $article->excerpt }}</p>
                        </a>
                        <button
                            onclick="openEditModal('article', {{ $article }})"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded absolute bottom-0 inset-x-0 m-4">
                            Edit
                        </button>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 w-1/3">
            <h2 id="modalTitle" class="text-2xl font-bold mb-4">Add Resource</h2>
            <form id="modalForm" method="POST" action="">
                @csrf

                <!-- Method Override for Editing -->
                <input type="hidden" name="_method" id="modalMethod" value="POST">

                <!-- Resource Fields -->
                <div id="resourceFields">
                    <div class="mb-4">
                        <label for="url" class="block font-semibold">URL</label>
                        <input type="text" name="url" id="url" class="w-full border border-gray-300 p-2 rounded">
                    </div>
                    <div class="mb-4">
                        <label for="thumbnail" class="block font-semibold">Thumbnail</label>
                        <input type="text" name="thumbnail" id="thumbnail" class="w-full border border-gray-300 p-2 rounded">
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block font-semibold">Title</label>
                        <input type="text" name="title" id="title" class="w-full border border-gray-300 p-2 rounded">
                    </div>
                </div>

                <!-- Article Fields -->
                <div id="articleFields" class="hidden">
                    <div class="mb-4">
                        <label for="articleTitle" class="block font-semibold">Title</label>
                        <input type="text" name="title" id="articleTitle" class="w-full border border-gray-300 p-2 rounded">
                    </div>
                    <div class="mb-4">
                        <label for="excerpt" class="block font-semibold">Excerpt</label>
                        <textarea name="excerpt" id="excerpt" class="w-full border border-gray-300 p-2 rounded"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="articleUrl" class="block font-semibold">URL</label>
                        <input type="text" name="url" id="articleUrl" class="w-full border border-gray-300 p-2 rounded">
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                        Cancel
                    </button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function openAddModal(type) {
            const modal = document.getElementById('modal');
            const modalTitle = document.getElementById('modalTitle');
            const modalForm = document.getElementById('modalForm');
            const methodField = document.getElementById('modalMethod');

            const resourceFields = document.getElementById('resourceFields');
            const articleFields = document.getElementById('articleFields');

            // Reset form fields
            modalForm.reset();

            if (type === 'resource') {
                modalTitle.inner Text = 'Add Resource';
                modalForm.action = '/resources'; // POST to the resources store route
                methodField.value = 'POST';

                resourceFields.classList.remove('hidden');
                articleFields.classList.add('hidden');
            } else {
                modalTitle.innerText = 'Add Article';
                modalForm.action = '/articles'; // POST to the articles store route
                methodField.value = 'POST';

                articleFields.classList.remove('hidden');
                resourceFields.classList.add('hidden');
            }

            modal.classList.remove('hidden');
        }

        function openEditModal(type, data) {
            console.log(data); // Add this line to debug

            const modal = document.getElementById('modal');
            const modalTitle = document.getElementById('modalTitle');
            const modalForm = document.getElementById('modalForm');
            const methodField = document.getElementById('modalMethod');

            const resourceFields = document.getElementById('resourceFields');
            const articleFields = document.getElementById('articleFields');

            if (type === 'resource') {
                modalTitle.innerText = 'Edit Resource';
                modalForm.action = `/resources/${data.id}`; // PUT to the resources update route
                methodField.value = 'PUT';

                resourceFields.classList.remove('hidden');
                articleFields.classList.add('hidden');

                // Populate fields
                document.getElementById('url').value = data.url;
                document.getElementById('thumbnail').value = data.thumbnail;
                document.getElementById('title').value = data.title;
            } else {
                modalTitle.innerText = 'Edit Article';
                modalForm.action = `/articles/${data.id}`; // PUT to the articles update route
                methodField.value = 'PUT';

                articleFields.classList.remove('hidden');
                resourceFields.classList.add('hidden');

                // Populate fields
                document.getElementById('articleTitle').value = data.title;
                document.getElementById('excerpt').value = data.excerpt;
                document.getElementById('articleUrl').value = data.url;
            }

            modal.classList.remove('hidden');
        }


        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.add('hidden');
        }
    </script>
</body>
</html>