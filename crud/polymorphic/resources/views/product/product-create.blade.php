@extends('../layouts.app', ['title' => "Cadastro de Produto"])
@section('content')
<H2>Cadastro de Produtos</H2>

@include('includes.messages')
<form class="needs-validation" action="{{route('product.store')}}" method="POST" id="form-users" novalidate>
    @csrf
    <fieldset>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
                <div class="invalid-feedback">
                    Please provide a valid title.
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="price" class="form-label">Price</label>
                <input class="form-control" name="price" type="text" data-type="currency" placeholder=""
                    value="{{ old('price') }}" id="price" />
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="path" class="form-label">Foto</label>
                <input type="text" class="form-control" name="path" id="photo" value="{{ old('path') }}" />
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
<script src="{{ asset('js/simple-mask-money.js')}}">
</script>
<script src="{{ asset('/js/page-product-form.js')}}">
</script>

@endsection