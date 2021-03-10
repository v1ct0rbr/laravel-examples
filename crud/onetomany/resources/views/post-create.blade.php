@extends('layouts.app', ['title' => "Cadastro de Post"])
@section('content')
<H2>Cadastro de Posts</H2>

@include('includes.messages')
<form class="needs-validation" action="{{route('posts.store')}}" method="POST" id="form-posts" novalidate>
    @csrf

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
            <div class="invalid-feedback">
                Please provide a valid name.
            </div>
        </div>

        <div class="col-sm-12">
            <label for="editor" class="form-label">Conteúdo</label>
            <textarea name="content" id="editor">
            &lt;p&gt;This is some sample content.&lt;/p&gt;
            </textarea>

        </div>


        <div class="col-md-12 buttons-div">
            <button type="button" id="form-submit" class="btn btn-primary">Submit</button>
        </div>

</form>
@include('includes.confirm-submit',["title_modal"=>"Cadastrar Post", "danger"=>false])

@endsection
@section('scripts')
<script src="{{asset('js/ckeditor.js')}}"></script>
<script src="{{asset('js/page-post-create.js')}}"></script>

@endsection
