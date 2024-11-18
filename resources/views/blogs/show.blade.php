
<x-app-layout>
    <x-slot name="header">
<div class="container mx-auto p-4">
    <div class="blog-details bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $blog->title }}</h1>
        <img src="{{ asset('images/'.$blog->image)}}" alt="Blog Image" class="w-80 h-40 object-cover rounded-md mb-4">
        <p class="text-gray-700 mb-4">{{ $blog->content }}</p>
        
        <div class="text-sm text-gray-500">
            <p>Posted by: {{ $blog->user->name }}</p>
            <p>Created on: {{ $blog->created_at->format('F j, Y') }}</p>
        </div>
        
        <a href="{{ route('home') }}" class="mt-6 inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-500">
            Back to Blog List
        </a>
    </div>
</div>
</x-slot>
</x-app-layout>

