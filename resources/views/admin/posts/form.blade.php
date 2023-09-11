@extends('admin.admin')

@section('title', $post->exists ? "Editer un article" : "Créer un article")

@section('content')

    <h1>@yield('title')</h1>
    <form action="{{ route($post->exists ? 'admin.post.update' : 'admin.post.store', $post) }}" method="POST">
        
        
        @csrf
        @method($post->exists ? 'put' : 'post')

        @include('shared.input', ['label' => 'Titre', 'name' => 'title', 'value' => $post->title])
        @include('shared.input', ['label' => 'Titre', 'type' =>'textarea', 'name' => 'content', 'value' => $post->content])

        <div>
            <button class="btn btn-primary">
                @if ($post->exists)
                    Editer
                    @else
                    Créer
                @endif
            </button>
        </div>


    </form>

@endsection