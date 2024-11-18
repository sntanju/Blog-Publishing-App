<x-app-layout>
    <x-slot name="header">
        <div class="py-12 bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="p-6">
                        <h1 class="text-2xl font-bold text-gray-800">Welcome, {{ Auth::user()->name }}!</h1>
                        <p class="text-gray-600 mt-2">You're logged in!</p>

                        <!-- Personal Information Section -->
                        <div class="mt-6 bg-gray-50 p-4 rounded-md shadow-md">
                            <h3 class="text-xl font-semibold text-gray-700">Personal Information</h3>
                            <p class="mt-2 text-gray-600">
                                <strong>Email:</strong> {{ Auth::user()->email }}
                            </p>
                            <p class="text-gray-600">
                                <strong>Account Created:</strong> {{ Auth::user()->created_at->format('F j, Y') }}
                            </p>
                        </div>

                        <hr class="my-6 border-gray-300">

                        <!-- User Stats Section -->
                        <div class="bg-gray-50 p-4 rounded-md shadow-md">
                            <h3 class="text-xl font-semibold text-gray-700">Your Activity</h3>
                            <div class="mt-2 space-y-2">
                                <p class="text-gray-600">
                                    <strong>Blogs Posted:</strong> {{ Auth::user()->blogs->count() }}
                                </p>
                                <p class="text-gray-600">
                                    <strong>Upvotes Given:</strong> {{ Auth::user()->votes()->where('upvote', 1)->count() }}
                                </p>
                                <p class="text-gray-600">
                                    <strong>Downvotes Given:</strong> {{ Auth::user()->votes()->where('upvote', 0)->count() }}
                                </p>
                            </div>
                        </div>

                        <hr class="my-6 border-gray-300">

                        <!-- Action Buttons -->
                        <div class="flex justify-between mt-6">
                            <!-- Update Profile -->
                            <a href="{{ route('profile.edit') }}" 
                               class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700">
                                Update Profile Information
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
@include('layouts.footer')
