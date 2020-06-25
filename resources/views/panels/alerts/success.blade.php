
@if(Session::has('success'))
  <div class="alert alert-success alert-dismissible showfade " role="alert">
        <p>{{Session::get('success')}}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
    </button>
  </div>
@endif
