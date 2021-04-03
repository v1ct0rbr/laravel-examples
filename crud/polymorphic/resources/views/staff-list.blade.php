@extends('layouts.app', ['title' => "Lista de Usuários"])

@section('content')
<H2>Lista de Usuários</H2>

@include('includes.messages')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">First</th>
            <th scope="col">email</th>

            <th scope="col">opções</th>
        </tr>
    </thead>
    <tbody>
        @if (count($staff))
        @foreach($staff as $key=> $user)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td> @if($user->photo)
                <img src="{{$user->photo->path}}" alt="staff image" width="32" />
                @endif

            </td>
            <td> {{$user->name}}</td>
            <td> <b> {{$user->email}} </b>
            </td>

            <td>
                <div class="btn-options">
                    <a class="btn btn-primary" href="{{route('staff.edit', ['staff'=>$user->id])}}"><i
                            class="fas fa-edit"></i></a>
                    <form action="{{ route('staff.destroy', ['staff' => $user->id])}}" method="POST">
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
            <td colspan="4"> Não há dados</td>
        </tr>
        @endif
    </tbody>

</table>
@include('includes.confirm-submit',["title_modal"=>__('messages.delete_data'), "danger"=>true])


@endsection

@section('scripts')
<script src="{{ asset('/js/page-staff-list.js')}}">
</script>

@endsection