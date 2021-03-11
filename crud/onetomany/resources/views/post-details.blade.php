@extends('layouts.app', ['title' => "Cadastro de Post"])
@section('content')


@include('includes.messages')
@if($post)

<h2 style="text-align: center"> {{$post->title}} </h2>
<br />
<p>
    {!!$post->content!!}
</p>
<hr />

<div id="comments">
    <form action="{{ route('comments.store')}}"" method="post">
        @csrf
        <input type="hidden" name="post_id" value="{{old('post_id', $post->id)}}" />
        <div class="col-sm-6">
            <textarea class="form-control" name="text" cols="10" rows="5">
            {{old('text')}}
            </textarea>
        </div>
        <div class="buttons-div">
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
    </form>
    <br />
    @if($post->comments)
    <h2>Comentários</h2>
    <ul class="list-group list-group-flush">
        @foreach($post->comments as $key => $value)
        <li class="list-group-item" style="display:flex; justify-content: space-between">
            <p>{{$value->text}}</p>
            <small><i>{{date_format($value->created_at, 'd-m-Y H:i:s')}}</i> </small>
        </li>
        @endforeach
    </ul>
    @endif
</div>
@endif




@endsection
@section('scripts')
<script src="{{asset('js/ckeditor.js')}}"></script>
<script src="{{asset('js/page-post-create.js')}}"></script>

@endsection
