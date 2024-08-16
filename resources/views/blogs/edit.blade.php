<x-app-layout>
    <x-slot name="header">
    <div class="container">
        <h1>Edit Blog</h1>
        
        <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $blog->title }}" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control" id="content" rows="5" required>{{ $blog->content }}</textarea>
                <img class="img-fluid" style="max-width:20%;" src="{{ asset('images/'.$blog->image)}}" alt="">
            </div>

            <button type="submit" class="btn btn-primary">Update Blog</button>
        </form>
    </div>
    </x-slot>

    
</x-app-layout>
