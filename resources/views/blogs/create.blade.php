<!-- resources/views/add-post.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-semibold text-center mt-4 mb-6">Add Post</h1>
            <section class="mt-3">
                <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <!-- Error Message Display -->
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card bg-white shadow-lg rounded-lg p-6">
                        <!-- Title Field -->
                        <div class="mb-4">
                            <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
                            <input id="title" type="text" name="title" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300" required>
                        </div>

                        <!-- Content Field -->
                        <div class="mb-4">
                            <label for="content" class="block text-lg font-medium text-gray-700">Content</label>
                            <textarea id="content" name="content" rows="6" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300" required></textarea>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label for="image" class="block text-lg font-medium text-gray-700">Add Image</label>
                            <input id="image" type="file" name="image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300">
                        </div>

                        <!-- Save Button -->
                        <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save</button>
                    </div>
                </form>
            </section>
        </div>
    </x-slot>
</x-app-layout>
@include('layouts.footer')
