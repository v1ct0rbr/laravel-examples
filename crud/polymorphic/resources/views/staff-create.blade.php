@extends('layouts.app', ['title' => "Cadastro de usuário"])
@section('content')
<H2>Cadastro de Usuários</H2>

@include('includes.messages')
<form class="needs-validation" action="{{route('staff.store')}}" method="POST" id="form-users" novalidate>
    @csrf
    <fieldset>
        <legend>Personal data</legend>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <label for="path" class="form-label">Foto</label>
                <input type="text" class="form-control" name="path" id="photo" value="{{ old('path') }}" />
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" />
                <div class="invalid-feedback">
                    Please provide a valid name.
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="email" class="form-label">Email address</label>
                <input name="email" type="email" placeholder="email@company.com" value="{{ old('email') }}"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="email"
                    aria-describedby="emailHelp" />
                <div class="invalid-feedback">
                    Please provide a valid email.
                </div>
            </div>
        </div>
    </fieldset>
    <div class="col-md-12 buttons-div">
        <button type="button" id="form-submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@include('includes.confirm-submit',["title_modal"=>__('messages.save_data'), "danger"=>false])
@endsection
@section('scripts')
<script src="{{ asset('/js/page-users-form.js')}}">
</script>
@endsection