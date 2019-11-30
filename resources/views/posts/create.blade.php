@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        {{isset($post)?'Edit Post':'Create Post'}}
    </div>    
    <div class="card-body">
        
        
    <form action="{{isset($post)? route('posts.update', $post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($post))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{isset($post)? $post->title:''}}">
            </div>

            <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" cols="5" rows="5">
                                {{isset($post)? $post->description:''}}
                    </textarea>
            </div>

            <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content"  type="hidden" name="content" value="{{isset($post)? $post->content:''}}">
                    <trix-editor input="content"></trix-editor>
            </div>

            <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="text" class="form-control" id="published_at" name="published_at" value="published_at">
            </div>

            @if (isset($post))
        <img src="{{ asset($post->image) }}" alt="" style="width:100%" />
            @endif

            <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="form-group">
            <button class="btn btn-success">{{isset($post)? 'Update Post':'Create Post'}}</button>
            </div>
        </form>
    </div>
</div>    
@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix-core.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
        flatpickr("#published_at", {
                enableTime:true
        });

</script>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

