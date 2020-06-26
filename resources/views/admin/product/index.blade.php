
@extends('layouts/contentLayoutMaster')

@section('title', 'User')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">

@endsection


@section('content')
  {{-- Section Start --}}
  <!-- Zero configuration table -->
  <section id="basic-datatable">
    @include('panels.alerts.errors')
    @include('panels.alerts.success')
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body card-dashboard">
              <div class="table-responsive">
                <table class="table UserTable">
                  <thead>
                  <tr>
                    <th>ref</th>
                    <th>Produit</th>
                    <th>Client</th>
                    <th>price</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @isset($products)
                    @foreach($products as $product)
                      <tr>
                        <td>
                            {{$product->ref}}
                        </td>
                        <td>{{$product -> name }}</td>
                        <td>{{$product -> custumer -> fname }} {{$product -> custumer -> lname }}</td>
                        <td>{{$product -> price }}</td>
                        <td>
                          <div class="d-flex ">
                            <a href="{{route('product.show',$product -> id)}}"  class="btn btn-icon btn-icon  btn-flat-warning mr-1 mb-1 waves-effect waves-light"><i class="feather icon-eye warning"></i></a>
                            <a href="{{route('product.edit',$product -> id)}}"  class="btn btn-icon btn-icon  btn-flat-primary mr-1 mb-1 waves-effect waves-light"><i class="feather icon-edit primary"></i></a>
                            <form method="post" action="{{route('product.destroy',$product -> id)}}">
                              @csrf
                              @method("DELETE")
                              <button class="btn btn-icon btn-icon  btn-flat-danger mr-1 mb-1 waves-effect waves-light"><i class="feather icon-trash-2 danger"></i></button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  @endisset

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Zero configuration table -->
  <!-- Section  end -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script>
    $('.UserTable').DataTable();
  </script>

@endsection
