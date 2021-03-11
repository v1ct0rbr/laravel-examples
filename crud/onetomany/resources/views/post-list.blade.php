@extends('layouts.app', ['title' => "Lista de Posts"])

@section('content')
<H2>Lista de posts</H2>

@include('includes.messages')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">content</th>
            <th scope="col">opções</th>
        </tr>
    </thead>
    <tbody>
        @if (count($posts))
        @foreach($posts as $key=> $post)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td> {{$post->title}}</td>
            <td> {{ substr(strip_tags($post->content), 0,100).'...'}}</td>
            <td>
                <div class="btn-options">
                    <a class="btn btn-primary" href="{{route('posts.edit', ['post'=>$post->id])}}"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('posts.destroy', ['post' => $post->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger delete" type="submit"><i class="fas fa-trash"></i></button>
                    </form>
                    <a class="btn btn-primary" href="{{route('posts.show', ['post'=>$post->id])}}"><i class="fas fa-info-circle"></i></a>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="4"> Não há dados</td>
        </tr>
        @endif
    </tbody>

</table>
@include('includes.confirm-submit',["title_modal"=>__('messages.delete_data'), "danger"=>true])


@endsection

@section('scripts')
<script src="{{ asset('/js/page-posts-list.js')}}">
</script>

@endsection
