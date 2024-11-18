<div class="flex justify-center items-center mt-5">
    <a href="{{ route('blogs.create') }}" role="button" 
        class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
        Add New Blog
    </a>
</div>

<main class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
            <!-- Blog Cards -->
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($blogs as $blog)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-2">{{ $blog->title }}</h2>
                        <img src="{{ asset('images/'.$blog->image)}}" alt="Blog Image" class="w-full h-40 object-cover rounded-md mb-4">
                        <p class="text-gray-700 mb-4">{{ \Illuminate\Support\Str::limit($blog->content, 300) }}</p>
                        
                        <div class="flex justify-between items-center text-sm text-gray-500">
                            <span>Posted {{ $blog->created_at->diffForHumans() }}</span>
                            <span>By {{ $blog->user->name }}</span>
                           
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                        <!-- Upvote Form -->
                        <form action="{{ route('blogs.vote', $blog->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="upvote" value="1">
                            <button type="submit" class="btn btn-success btn-sm vote-button" 
                                    {{ $blog->votes()->where('user_id', auth()->id())->first()?->upvote == 1 ? 'disabled' : '' }}>
                                👍
                            </button>
                        </form>    

                        <!-- Downvote Form -->
                        <form action="{{ route('blogs.vote', $blog->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="upvote" value="0">
                            <button type="submit" class="btn btn-danger btn-sm vote-button" 
                                    {{ $blog->votes()->where('user_id', auth()->id())->first()?->upvote === 0 ? 'disabled' : '' }}>
                                👎
                            </button>
                        </form>
                         <!-- Total Vote Count -->
                         <span class="mx-2">Total Votes: {{ $blog->upvotes->count() - $blog->downvotes->count() }}</span>
                    </div>
                        <div class="flex mt-4 space-x-2">
                            <a href="{{ route('blogs.show', $blog) }}" class="text-blue-500 hover:underline">Read more</a>
                            @if(Auth::check() && Auth::id() === $blog->user_id)
                                <a href="{{ route('blogs.edit', $blog) }}" class="text-green-500 hover:underline">Edit</a>
                                <form method="POST" action="{{ route('blogs.destroy', $blog) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $blogs->links() }}
            </div>
        </div>
    </main>