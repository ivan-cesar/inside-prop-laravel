@if(session()->has('message'))
    <div class="alert {{ session()->get('type') }} alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session()->get('message') !!}
    </div>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!!  $error !!}
        </div>
    @endforeach
@endif