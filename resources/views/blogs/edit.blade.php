<!-- resources/views/edit-blog.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-semibold text-center mt-4 mb-6">Edit Blog</h1>
            
            <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Title Field -->
                <div class="mb-4">
                    <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
                    <input id="title" type="text" name="title" value="{{ $blog->title }}" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300" required>
                </div>

                <!-- Content Field -->
                <div class="mb-4">
                    <label for="content" class="block text-lg font-medium text-gray-700">Content</label>
                    <textarea id="content" name="content" rows="5" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300" required>{{ $blog->content }}</textarea>
                </div>

                <!-- Image Display and Upload -->
                <div class="mb-4">
                    <label class="block text-lg font-medium text-gray-700">Current Image</label>
                    <img src="{{ asset('images/'.$blog->image) }}" alt="Blog Image" class="w-1/5 rounded mt-2 mb-4">
                    
                    <label for="image" class="block text-lg font-medium text-gray-700">Change Image</label>
                    <input id="image" type="file" name="image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300">
                </div>

                <!-- Update Button -->
                <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Update Blog
                </button>
            </form>
        </div>
    </x-slot>
</x-app-layout>
