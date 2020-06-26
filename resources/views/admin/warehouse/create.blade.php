
@extends('layouts/contentLayoutMaster')

@section('title', 'Ajouter Stock')

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
            <form class="form-horizontal" novalidate action="{{Route('warehouse.store')}}" enctype="multipart/form-data" method="post">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nome" required
                               data-validation-required-message="This  Name field is required">
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <input type="tel" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Phone" required
                               data-validation-required-message="This phone field is required">
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <select class="custom-select" id="city_id" name="city_id" required>
                        <option class="text-secondary" selected="" disabled>selection ville</option>
                        @if ($citise -> count() >0)
                          @foreach($citise as $city)
                            <option value="{{$city->id}}" {{ (old('city_id')==$city->id) ? "selected":""}} >{{$city->city}}</option>
                          @endforeach
                        @endif
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <div class="controls">
                        <textarea name="address" class="form-control" placeholder="address" required
                                  data-validation-required-message="This Address field is required"
                        >{{old('address')}}</textarea>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="controls">
                        <input step="0.1"  min="0" type="number" value="{{old('price_warehousing')}}"  name="price_warehousing" class="form-control" placeholder="Price Warehouse" required
                               data-validation-required-message="This Price Delivery field is required">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="controls">
                        <input step="0.1"  min="0" type="number" value="{{old('price_packing_basic')}}"  name="price_packing_basic" class="form-control" placeholder="Price Packing Basic" required
                               data-validation-required-message="This Price Delivery field is required">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="controls">
                        <input step="0.1"  min="0" type="number" value="{{old('price_packing_ultra')}}" name="price_packing_ultra" class="form-control" placeholder="Price Packing Ultra" required
                               data-validation-required-message="This Price Packing Ultra field is required">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="controls">
                        <input step="0.1"  min="0" type="number" value="{{old('price_packing_primum')}}" name="price_packing_primum" class="form-control" placeholder="Price Packing Primum  " required
                               data-validation-required-message="This Price Packing Primum  field is required">
                      </div>
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
