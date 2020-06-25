
@extends('layouts/contentLayoutMaster')

@section('title', 'Ajouter Utilisateur')

@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/plugins/forms/validation/form-validation.css')) }}">

@endsection

@section('content')
  {{-- Section Start --}}


  <section class="simple-validation">
    @include('panels.alerts.errors')


    <div class="row">
      <div class="col-md-12">
        <div class="card">

          <div class="card-content">
            <form class="form-horizontal" novalidate action="{{route('user.store')}}" enctype="multipart/form-data" method="post">
              @csrf()
              <div class="card-header">
                <div class="media">
                  <a href="javascript: void(0);">
                    <img src="{{ asset('images/portrait/small/avatar-s-12.jpg') }}" class="rounded mr-75"
                         alt="profile image" height="64" width="64">
                  </a>
                  <div class="media-body mt-75">
                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                      <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                             for="account-upload">Upload new photo</label>
                      <input type="file" name="avatar" id="account-upload" hidden value=" {{ old('avatar') }}">
                    </div>
                    <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                        size of
                        800kB</small></p>
                  </div>
                </div>
              </div>
              <hr class="w-75">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <input type="text" name="fname" class="form-control" placeholder="Nome" required value="{{ old('fname') }}"
                               data-validation-required-message="This First Name field is required">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <input type="text" name="lname" class="form-control" placeholder="Prenom" required value="{{ old('lname') }}"
                               data-validation-required-message="This Last Name field is required">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <input type="tel" name="phone" class="form-control" placeholder="Phone" required  value="{{ old('phone') }}"
                               data-validation-required-message="This phone field is required">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <input type="text" name="city" class="form-control" placeholder="City" required value="{{ old('city') }}"
                               data-validation-required-message="This City field is required">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <div class="controls">
                        <textarea name="address" class="form-control" placeholder="address" required
                                  data-validation-required-message="This Address field is required"
                        >{{ old('address') }}</textarea>

                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group ">
                      <div class="controls">
                        <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}"
                               data-validation-required-message="This Email field is required" aria-invalid="false">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <input type="password" name="password" class="form-control" placeholder="Password" required value="{{ old('password') }}"
                               data-validation-required-message="This Password field is required">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <input type="text" name="bank" class="form-control" placeholder="Bank" required value="{{ old('bank') }}"
                               data-validation-required-message="This  Bank field is required">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <input type="text" name="rib" class="form-control" placeholder="Rib Bank" required value=" {{ old('rib') }}"
                               data-validation-required-message="This RIB field is required">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="vs-checkbox-con vs-checkbox-primary mb-2">
                      <input type="checkbox" checked="" value="true" name="statut" value="{{ old('statut') }}">
                      <span class="vs-checkbox vs-checkbox-lg">
                      <span class="vs-checkbox--check">
                        <i class="vs-icon feather icon-check"></i>
                      </span>
                    </span>
                      <span class="">Active</span>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section  end -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/validation/jqBootstrapValidation.js')) }}"></script>

@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/validation/form-validation.js')) }}"></script>

@endsection
