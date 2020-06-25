@if(Session::has('errors'))
  <div class="alert alert-danger alert-dismissible showfade " role="alert">
    <ul >
      @foreach ($errors->all() as $message)
        <li>{{$message}}</li>
      @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
    </button>
  </div>
@endif
@if(Session::has('error'))
  <div class="alert alert-danger alert-dismissible showfade " role="alert">
    <p>{{Session::get('error')}}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
    </button>
  </div>
@endif



