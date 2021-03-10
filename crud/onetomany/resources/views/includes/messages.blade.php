@if ($message = Session::get('success'))

<div class="alert alert-success alert-dismissible fade show">
    <strong>{{ $message }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lable="close"></button>
</div>

@endif



@if ($messages = Session::get('error'))

<div class="alert alert-danger alert-dismissible fade show">
    <div class="accordion" id="accordionFlushExample">
        @foreach($messages as $value)
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    {{$value['title']}}
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    {{$value['details']}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lable="close"></button>
</div>

@endif



@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-dismissible fade show">

    <strong>{{ $message }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>

</div>

@endif



@if ($message = Session::get('info'))

<div class="alert alert-info alert-dismissible fade show">
    <strong>{{ $message }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lable="close"></button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lable="close"></button>
</div>
@endif
