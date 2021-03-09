@extends('layouts.app', ['title' => "Cadastro de usuário"])
@section('content')
<H2>Cadastro de Usuários</H2>

@include('includes.messages')
<form class="needs-validation" action="{{route('users.store')}}" method="POST" id="form-users" novalidate>
    @csrf
    <fieldset>
        <legend>Personal data</legend>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" />
                <div class="invalid-feedback">
                    Please provide a valid name.
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="email" class="form-label">Email address</label>
                <input name="email" type="email" placeholder="email@company.com" value="{{ old('email') }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="email" aria-describedby="emailHelp" />
                <div class="invalid-feedback">
                    Please provide a valid email.
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Address</legend>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <label for="address-street" class="form-label">Street</label>
                <input type="text" class="form-control" name="street" value="{{ old('street')}}" id="address-street" required />
                <div class="invalid-feedback">
                    Please provide the street.
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <label for="address-number" class="form-label">Number</label>
                <input type="number" step="1" name="number" class="form-control" value="{{old('number')}}" id="address-number" required />
                <div class="invalid-feedback">
                    Please provide a valid number.
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <label for="address-postal-code" class="form-label">Postal Code</label>
                <input type="text" class="form-control" name="postal_code" value="{{old('postal_code')}}" id="address-postal-code" aria-describedby="postalCodeHelp">
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
                <div id="postalCodeHelp" class="form-text">12345-987</div>

            </div>
            <div class="col-md-6 col-sm-12">
                <label for="name" class="form-label">Complement</label>
                <input type="text" class="form-control" name="complement" value="{{old('complement')}}" id="address-complement" />
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
