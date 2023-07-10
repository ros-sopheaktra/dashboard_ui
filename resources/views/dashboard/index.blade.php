@extends('dashboard.layout.app')

{{-- url title --}}
@section('title', 'home')

{{-- page title --}}
@section('page-title', 'Dashboard')

{{-- custom stylesheet --}}
@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('css/dashboard/index.css') }}">
@endsection

{{-- BEGIN :: Dashboard Content Container --}}
@section('content')
  <div class="dashboard-index-wrapper">
    {{-- title contant wrapper --}}
    <div class="title-contant-wrapper">
      <div class="text-uppercase font-20">overview</div>
    </div>

    {{-- card row --}}
    <div class="row">
      {{-- daily sales --}}
      <div class="col-sm-12 col-md-6 col-lg-4 mt-4">
        <div class="card text-center pt-5 pb-5 border" data-toggle="modal" data-target="#myModal">
          <div class="card-content">
            <div class="card-item">
              <div class="card-item-total">3456</div>
              <div class="card-item-name">Daily Sales</div>
            </div>
          </div>
        </div>
      </div>
      
      {{-- premiums --}}
      <div class="col-sm-12 col-md-6 col-lg-4 mt-4">
        <div class="card text-center pt-5 pb-5 border">
          <div class="card-content">
            <div class="card-item">
              <div class="card-item-total">6556</div>
              <div class="card-item-name">Premiums</div>
            </div>
          </div>
        </div>
      </div>

      {{-- free vizzy user --}}
      <div class="col-sm-12 col-md-6 col-lg-4 mt-4">
        <div class="card text-center pt-5 pb-5 border">
          <div class="card-content">
            <div class="card-item">
              <div class="card-item-total">3456</div>
              <div class="card-item-name">Free Vizzy Users</div>
            </div>
          </div>
        </div>
      </div>

      {{-- feedback --}}
      <div class="col-sm-12 col-md-6 col-lg-4 mt-4">
        <div class="card text-center pt-5 pb-5 border">
          <div class="card-content">
            <div class="card-item">
              <div class="card-item-total">3456</div>
              <div class="card-item-name">Total Feedback</div>
            </div>
          </div>
        </div>
      </div>
      
      {{-- business profiles --}}
      <div class="col-sm-12 col-md-6 col-lg-4 mt-4">
        <div class="card text-center pt-5 pb-5 border">
          <div class="card-content">
            <div class="card-item">
              <div class="card-item-total">3456</div>
              <div class="card-item-name">Business Profiles</div>
            </div>
          </div>
        </div>
      </div>

      {{-- business admins --}}
      <div class="col-sm-12 col-md-6 col-lg-4 mt-4">
        <div class="card text-center pt-5 pb-5 border">
          <div class="card-content">
            <div class="card-item">
              <div class="card-item-total">3456</div>
              <div class="card-item-name">Business Admins</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Please select the roles for --- cart</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
@endsection
{{-- END   :: Dashboard Content Container --}}

{{-- custom script --}}
@section('script')

@endsection