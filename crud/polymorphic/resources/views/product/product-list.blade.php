@extends('layouts.app', ['title' => "Lista de Produtos"])

@section('content')
<H2>Lista de Produtos</H2>

@include('includes.messages')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">title</th>
            <th scope="col">price</th>

            <th scope="col">opções</th>
        </tr>
    </thead>
    <tbody>
        @if (count($products))
        @foreach($products as $key=> $prod)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td> @if($prod->photo)
                <img src="{{$prod->photo->path}}" alt="product image" width="32" />
                @endif

            </td>
            <td> {{$prod->title}}</td>
            <td> R$ {{$prod->price}} </b>
            </td>

            <td>
                <div class="btn-options">
                    <a class="btn btn-primary" href="{{route('product.edit', ['product'=>$prod->id])}}"><i
                            class="fas fa-edit"></i></a>
                    <form action="{{ route('product.destroy', ['product' => $prod->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger delete" type="submit"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="5"> Não há dados</td>
        </tr>
        @endif
    </tbody>

</table>
@include('includes.confirm-submit',["title_modal"=>__('messages.delete_data'), "danger"=>true])


@endsection

@section('scripts')
<script src="{{ asset('js/page-list.js')}}">
</script>

@endsection