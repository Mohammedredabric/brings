
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
                    <th>Nom/Prenom</th>
                    <th>Email</th>
                    <th>Ville</th>
                    <th>Etat</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @isset($customeres)
                    @foreach($customeres as $customer)
                      <tr>
                        <td><div class="avatar bg-primary mr-1">
                            <div class="avatar-content">
                              <i class="avatar-icon feather icon-user"></i>
                            </div>
                          </div>
                          <span>{{$customer -> fname }} {{$customer -> lname }}</span>
                        </td>
                        <td>{{$customer -> email }}</td>
                        <td>{{$customer -> city }}</td>
                        <td>{{$customer -> statut }}</td>
                        <td>
                          <div class="d-flex ">
                            <a href="{{route('customer.show',$customer->id)}}"  class="btn btn-icon btn-icon  btn-flat-warning mr-1 mb-1 waves-effect waves-light"><i class="feather icon-eye warning"></i></a>
                            <a href="{{route('customer.edit',$customer->id)}}"  class="btn btn-icon btn-icon  btn-flat-primary mr-1 mb-1 waves-effect waves-light"><i class="feather icon-edit primary"></i></a>
                            <form method="post" action="{{route('customer.destroy',$customer->id)}}">
                              @csrf
                              @method("Delete")
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
