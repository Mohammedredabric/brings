
@extends('layouts/contentLayoutMaster')

@section('title', 'Ajouter Produit')

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
            <form class="form-horizontal" novalidate action="{{Route('product.store')}}" enctype="multipart/form-data" method="post">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <div class="controls">
                        <input type="text" name="ref" value="{{old('ref')}}" class="form-control" placeholder="ref Produit" required
                               data-validation-required-message="This  Ref Produit field is required">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <div class="controls">
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Name Produit" required
                               data-validation-required-message="This  Name Produit field is required">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <div class="controls">
                        <input type="number" step="0.1" name="price" value="{{old('price')}}" class="form-control" placeholder="Prix Produit" required
                               data-validation-required-message="This  Prix Produit field is required">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <div class="controls">
                        <textarea name="description" class="form-control" placeholder="Description" required
                                  data-validation-required-message="This Description field is required"
                        >{{old('description')}}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <select class="custom-select" id="customer" name="customer" required>
                        <option class="text-secondary" selected="" disabled>Selection  Client</option>
                        @isset($customers)
                          @foreach($customers as $customer)
                            <option value="{{$customer->id}}" {{ (old('customer')==$customer->id) ? "selected":""}} >{{$customer->fname}} {{$customer->lname}}</option>
                          @endforeach
                        @endisset
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12 mb-2" >
                    <div class="custom-file">
                      <input name="image" value="{{old('image')}}" type="file" class="custom-file-input" id="inputGroupFile01">
                      <label class="custom-file-label text-secondary" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                  <!--   <div class="col-md-12">
                 <label class=" mb-1">Emballage</label>
                    <ul class="list-unstyled mb-2">
                      <li class="d-inline-block mr-2">
                        <fieldset>
                          <div class="vs-radio-con">
                            <input type="radio" name="paking_type_Deja" checked="true" value="true">
                            <span class="vs-radio">
                      <span class="vs-radio--border"></span>
                      <span class="vs-radio--circle"></span>
                    </span>
                            <span class="">Deja Emballe</span>
                          </div>
                        </fieldset>
                      </li>
                      <li class="d-inline-block mr-2">
                        <fieldset>
                          <div class="vs-radio-con vs-radio-primary">
                            <input type="radio" name="paking_type_Base" value="false">
                            <span class="vs-radio">
                      <span class="vs-radio--border"></span>
                      <span class="vs-radio--circle"></span>
                    </span>
                            <span class="">E-Base</span>
                          </div>
                        </fieldset>
                      </li>
                      <li class="d-inline-block mr-2">
                        <fieldset>
                          <div class="vs-radio-con vs-radio-primary">
                            <input type="radio" name="paking_type_Ultra" value="false">
                            <span class="vs-radio">
                      <span class="vs-radio--border"></span>
                      <span class="vs-radio--circle"></span>
                    </span>
                            <span class="">E-Ultra</span>
                          </div>
                        </fieldset>
                      </li>
                      <li class="d-inline-block mr-2">
                        <fieldset>
                          <div class="vs-radio-con vs-radio-primary">
                            <input type="radio" name="paking_type_Premium" value="false">
                            <span class="vs-radio">
                      <span class="vs-radio--border"></span>
                      <span class="vs-radio--circle"></span>
                    </span>
                            <span class="">E-Premium</span>
                          </div>
                        </fieldset>
                      </li>
                    </ul>

                  </div> -->
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
