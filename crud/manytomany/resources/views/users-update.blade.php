@extends('layouts.app', ['title' => "Cadastro de usuário"])
@section('content')
<H2>Atualização</H2>
@include('includes.messages')

<form class="needs-validation" action="{{route('users.update', ['user'=>$user->id])}}" method="POST" id="form-users"
    novalidate>
    @csrf
    @method('put')

    <fieldset>

        <legend>Personal data</legend>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name', $user->name)}}" />
                <div class="invalid-feedback">
                    Please provide a valid name.
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="email" class="form-label">Email address</label>
                <input name="email" type="email" placeholder="email@company.com"
                    value="{{ old('email', $user->email) }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                    class="form-control" id="email" aria-describedby="emailHelp" />
                <div class="invalid-feedback">
                    Please provide a valid email.
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Roles</legend>
        @foreach ($roles as $key=>$item)
        <div class="form-check">

            {{-- <input class="form-check-input" name="roles[]" value="{{$item->id}}" type="checkbox"
                {{(is_array(old('roles')) && in_array($item->id, old('roles')) || in_array($item->id, $user_roles)) ?'checked':'' }} id="role_{{$item->id}}">
            <label class="form-check-label" for="role_{{$item->id}}">
                {{$item->name}}
            </label> --}}
            <input class="form-check-input" name="roles[]" value="{{$item->id}}" type="checkbox"
                {{($item->checked) ?'checked':'' }} id="role_{{$item->id}}" />
            <label class="form-check-label" for="role_{{$item->id}}">
                {{$item->name}}
            </label>
        </div>
        @endforeach

    </fieldset>
    <div class="col-md-12 buttons-div">
        <button type="button" id="form-submit" class="btn btn-primary">Atualizar</button>
    </div>

</form>

@include('includes.confirm-submit',["title_modal"=>"enviar dados", "danger"=>false])

@endsection
@section('scripts')
<script src="{{ asset('/js/page-users-form.js')}}">
</script>

@endsection