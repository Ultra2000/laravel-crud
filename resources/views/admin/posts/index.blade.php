@extends('admin.admin')

@section('title', 'Tous nos articles')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.post.create') }}" class="btn btn-primary">Ajouter un article</a>
    </div>

    <table class="table table-striped">

        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post -> title }}</td>
                <td>{{ $post -> content }}</td>
                
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.post.edit', $post) }}" class="btn btn-primary">Editer</a>
                        <form action="{{ route('admin.post.destroy', $post) }}" method="POST">
                            @csrf
                            @method("delete")
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    
    </table>

     {{ $posts->links() }}

@endsection