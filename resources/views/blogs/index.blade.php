
<x-app-layout>
    <x-slot name="header">
<div class="container">
  <div class="titlebar">
    <a class="btn btn-secondary float-end mt-3" href="{{ route('blogs.create') }}" role="button">Add Blog</a>

    <h1>Blog List</h1>
  </div>
    
  <hr>
  <!-- Message if a post is posted successfully -->
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
         @if (count($blogs) > 0)
    @foreach ($blogs as $blog)
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-2">
              <img class="img-fluid" style="max-width:20%;" src="{{ asset('images/'.$blog->image)}}" alt="">
            </div>
            <div class="col-10">
              <h4>{{$blog->title}}</h4>
            </div>
          </div>
          <p>{{$blog->content}}</p>

          <button class="btn btn-secondary m-3">+</button>
          <button class="btn btn-secondary m-3">count</button>
          <button class="btn btn-secondary m-3">-</button>
          <a class="btn btn-secondary float-end mt-3" href="{{ route('blogs.edit', $blog->id) }}" role="button">Edit Blog</a>
          <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger float-end mt-3" onclick="return confirm('Are you sure you want to delete this blog?');">Delete Blog</button>
        </form>
          <hr>
        </div>
      </div>
    @endforeach
  @else
    <p>No blogs found</p>
  @endif
</div>

</x-slot>

    
</x-app-layout>
