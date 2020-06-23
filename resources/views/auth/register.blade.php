@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')


@section('content')
<section class="row flexbox-container">
  <div class="col-xl-12 col-10 d-flex justify-content-center">
      <div class="card bg-authentication rounded-0 mb-0">
          <div class="row m-0">
              <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                  <img src="{{ asset('images/pages/register.jpg') }}" alt="branding logo">
              </div>
              <div class="col-lg-6 col-12 p-0">
                  <div class="card rounded-0 mb-0 p-2">
                      <div class="card-header  pb-1">
                          <div class="card-title">
                              <h4 class="mb-0">Create Account For {{ isset($url) ? ucwords($url) : ""}}</h4>
                          </div>
                      </div>
                      <div class="card-content">
                        <div class="card-body">
                          @isset($url)
                            <form method="POST" action='{{ url("$url/register") }}' aria-label="{{ __('Register') }}">
                              @else
                                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                  @endisset
                                    @csrf
                                  <div class="form-label-group">
                                      <!-- <input type="text" id="inputName" class="form-control" placeholder="Nom" required> -->
                                      <input id="fname" type="text" class="form-control form-control-sm @error('fname') is-invalid @enderror" name="fname" placeholder="Nom" value="{{ old('fname') }}" required autocomplete="off" autofocus>
                                      <label for="fname">Nom</label>
                                      @error('fname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                  </div>
                                  <div class="form-label-group">
                                    <!-- <input type="text" id="inputName" class="form-control" placeholder="prenom" required> -->
                                    <input id="lname" type="text" class="form-control form-control-sm @error('lname') is-invalid @enderror" name="lname" placeholder="Prenom" value="{{ old('lname') }}" required autocomplete="off" >
                                    <label for="lname">Prenom</label>
                                    @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-label-group">
                                    <!-- <input type="text" id="inputName" class="form-control" placeholder="ville" required> -->
                                    <input id="phone" type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" name="phone" placeholder="Telephone" value="{{ old('phone') }}" required autocomplete="off" >
                                    <label for="phone">Telephone</label>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-label-group">
                                    <!-- <input type="text" id="inputName" class="form-control" placeholder="ville" required> -->
                                    <input id="city" type="text" class="form-control form-control-sm @error('city') is-invalid @enderror" name="city" placeholder="Ville" value="{{ old('city') }}" required autocomplete="off" >
                                    <label for="city">Ville</label>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-label-group">
                                    <!-- <input type="text" id="inputName" class="form-control" placeholder="ville" required> -->
                                    <input id="address" type="text" class="form-control form-control-sm @error('address') is-invalid @enderror" name="address" placeholder="Address" value="{{ old('address') }}" required autocomplete="off" >
                                    <label for="address">Address</label>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-label-group">
                                      <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Email" required> -->
                                      <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                                      <label for="email">Email</label>
                                      @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                  </div>
                                  <div class="form-label-group">
                                      <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required> -->
                                      <input id="password" type="password" class="form-control  form-control-sm @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                                      <label for="password">Mot Pass</label>
                                      @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                  </div>
                                  <div class="form-label-group">
                                      <!-- <input type="password" id="inputConfPassword" class="form-control" placeholder="Confirm Password" required> -->
                                      <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                      <label for="password-confirm">Confirmation Mot Pas</label>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-12">
                                          <fieldset class="checkbox">
                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                              <input type="checkbox" checked>
                                              <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                  <i class="vs-icon feather icon-check"></i>
                                                </span>
                                              </span>
                                              <span class=""> I accept the terms & conditions.</span>
                                            </div>
                                          </fieldset>
                                      </div>
                                  </div>
                                  <a href="login" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                  <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</button>
                              </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

</section>
@endsection
