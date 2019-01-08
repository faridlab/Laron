@extends('layouts.robust')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
<div class="content-header row">
  <div class="breadcrumb-wrapper col-8">
    <ol class="breadcrumb">
      @foreach($breadcrumbs as $breadcrumb)
      @if($breadcrumb['active'])
      <li class="breadcrumb-item active">{{$data->first_name}} {{$data->last_name}}</li>
      @else
      <li class="breadcrumb-item"><a href="{{url($breadcrumb['link'])}}">{{$breadcrumb['title']}}</a></li>
      @endif
      @endforeach
    </ol>
  </div>

  <div class="content-header-right text-md-right col-4">
    <div class="btn-group">
      <button class="btn btn-round"><a href="{{url(Request::segment(1).'/'.Request::segment(2).'/edit')}}" class="text-dark"><i class="fa fa-edit"></i> Edit</a></button>
      <button class="btn btn-round" class="text-danger"><a href="#" class="text-danger form-delete" data-id="{{Request::segment(2)}}"><i class="fa fa-trash"></i> Delete</a></button>
    </div>
  </div>
</div>

<section>
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">User: {{$data->first_name}} {{$data->last_name}}</h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <div class="card-body card-dashboard">
            @if($description)
            <p class="card-text">{{$description}}</p>
            @endif

            <form method="GET" action="{{url($segments[0])}}" enctype="multipart/form-data" >
              @method('GET')
              @csrf

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" readonly value="{{$data->email}}" class="form-control" placeholder="Email">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" readonly value="{{$data->first_name}}" class="form-control" placeholder="First Name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control"  readonly value="{{$data->last_name}}" placeholder="Last Name">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="text" readonly value="{{$data->dob}}" class="form-control" placeholder="Date of Birth">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Gender</label>
                    <input type="text" readonly value="{{($data->gender == 1)? 'Male': 'Female'}}" class="form-control" placeholder="Gender">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control"  readonly value="{{$data->phone}}" placeholder="Phone">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Roles</h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-body">
          <div class="card-body">
            <div id="pagination-list">
              <input type="text" class="search form-control round border-primary mb-1" placeholder="Search" />
              <ul class="list-group list">
                @foreach($roles as $item)
                <li class="list-group-item">
                  <span class="name">{{$item['name']}}</span>
                  @if(isset($item['assigned']) && $item['assigned'] == true)
                  <a href="#" data-name="{{$item['name']}}" class="revoke"><span class="badge badge-danger badge-pill float-right">&times;</span></a>
                  @else
                  <a href="#" data-name="{{$item['name']}}" class="assign"><span class="badge badge-success badge-pill float-right">+</span></a>
                  @endif
                </li>
                @endforeach
              </ul>
              <ul class="pagination pagination-separate pagination-flat"></ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<!--/ Default ordering table -->
<form method="POST" id="form-delete" action="" enctype="multipart/form-data" >
  @method('DELETE')
  @csrf
</form>
@endsection

@section('js')
<script src="{{asset('app-assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/extensions/listjs/list.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/extensions/listjs/list.pagination.min.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function() {

  $(document).on('click', '.form-delete', function() {

    var id = $(this).data('id');
    if(!id) return;

    swal({
      title: "Are you sure?",
      text: "Are you sure want to delete this data?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $('#form-delete').attr('action', '{{url($segments[0])}}/'+id);
        $('#form-delete').submit();
      }
    });
  });

  /********************************************
	*				Pagination					*
	********************************************/
	var paginationList = new List('pagination-list', {
		valueNames: ['name'],
		page: 10,
		plugins: [ListPagination({})]
  });


  $('ul.list-group').on('click', '.assign', function(evt) {
    var target = $(this);
    var url = '{{url($segments[0])}}/assign/{{$data->id}}';
    var role = $(this).data('name');
    $.ajax({
      type: "POST",
      url: url,
      data: {
        'role': role,
        "_token": "{{ csrf_token() }}",
      }
    }).done(function(response) {
      target.removeClass('assign');
      target.addClass('revoke');
      target.html('<span class="badge badge-danger badge-pill float-right">&times;</span>');
      toastr.success(response['message'], 'Success!');
    }).fail(function(err) {
      console.log(err);
      toastr.error(err['message'], 'Error!');
    });

  });

  $('ul.list-group').on('click', '.revoke', function(evt) {
    var target = $(this);
    var url = '{{url($segments[0])}}/revoke/{{$data->id}}';
    var role = $(this).data('name');
    $.ajax({
      type: "DELETE",
      url: url,
      data: {
        'role': role,
        "_token": "{{ csrf_token() }}",
      }
    }).done(function(response) {
      target.removeClass('revoke');
      target.addClass('assign');
      target.html('<span class="badge badge-success badge-pill float-right">+</span>');
      toastr.success(response['message'], 'Success!');
    }).fail(function(err) {
      toastr.error(err['message'], 'Error!');
      console.log(err);
    });

  });

});
</script>
@endsection