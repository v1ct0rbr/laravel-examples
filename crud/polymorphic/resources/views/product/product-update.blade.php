@extends('layouts.app', ['title' => "Atualizaão de produto"])
@section('content')
<H2>Atualização</H2>
@include('includes.messages')

<form class="needs-validation" action="{{route('product.update', ['product'=>$product->id])}}" method="POST"
    id="form-products" novalidate>
    @csrf
    @method('put')

    <fieldset>

        <legend>Personal data</legend>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <label for="path" class="form-label">Foto</label>
                <input type="text" class="form-control" name="path" id="photo"
                    value="{{ old('path', $product->photo->path) }}" />

            </div>

            <div class="col-md-6 col-sm-12">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title"
                    value="{{old('title', $product->title)}}" />
                <div class="invalid-feedback">
                    Please provide a valid title.
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="price" class="form-label">Price</label>
                <input name="price" type="text" value="{{ old('price', $product->price) }}" class="form-control"
                    id="price" />

            </div>
        </div>
    </fieldset>

    <div class="col-md-12 buttons-div">
        <button type="button" id="form-submit" class="btn btn-primary">Atualizar</button>
    </div>

</form>

@include('includes.confirm-submit',["title_modal"=>"enviar dados", "danger"=>false])

@endsection
@section('scripts')
<script src="{{ asset('js/simple-mask-money.js')}}">
</script>
<script src="{{ asset('/js/page-product-form.js')}}">
</script>
@endsection