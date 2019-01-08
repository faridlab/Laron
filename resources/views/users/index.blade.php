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
      <li class="breadcrumb-item active">{{$breadcrumb['title']}}</li>
      @else
      <li class="breadcrumb-item"><a href="{{url($breadcrumb['link'])}}">{{$breadcrumb['title']}}</a></li>
      @endif
      @endforeach
    </ol>
  </div>
  <div class="content-header-right text-md-right col-4">
    <div class="btn-group">
      <button class="btn btn-round"><a href="{{url(Request::segment(1).'/create')}}" class="text-dark"><i class="fa fa-plus"></i> New</a></button>
      <button class="btn btn-round"><a href="#filter" class="text-dark"><i class="fa fa-filter"></i> Filter</a></button>
      <button class="btn btn-round"><a href="#export" class="text-dark"><i class="fa fa-upload"></i> Export</a></button>
      <button class="btn btn-round"><a href="{{url(Request::segment(1).'/trash')}}" class="text-danger"><i class="fa fa-trash"></i> Trash</a></button>
    </div>
  </div>
</div>

<!-- Default ordering table -->
<section>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{{$title}}</h4>
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
            <table class="table table-striped default-ordering" style="width:100%">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th class="sorting_disabled"> </th>
                </tr>
              </thead>
              <tbody class="table-borderless">
                @foreach($data as $item)
                <tr>
                  <td>{{$item->first_name}} {{$item->last_name}}</td>
                  <td>{{$item->email}}</td>
                  <td class="float-right">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested dropdown">
                      <button type="button" class="btn btn-round"><a href="{{url(Request::segment(1).'/'.$item->id)}}" class="text-dark"><i class="fa fa-eye"></i> Detail</a></button>
                      <div class="btn-group" role="group">
                        <button id="btn-group-drop-{{$item->id}}" type="button" class="btn btn-round dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="btn-group-drop-{{$item->id}}">
                          <a href="{{url(Request::segment(1).'/'.$item->id)}}" class="dropdown-item"><i class="fa fa-eye"></i> Detail</a>
                          <a href="{{url(Request::segment(1).'/'.$item->id)}}/edit" class="dropdown-item"><i class="fa fa-edit"></i> Edit</a>
                          <div class="dropdown-divider"></div>
                          <a href="#" class="dropdown-item text-danger form-delete" data-id="{{$item->id}}"><i class="fa fa-trash"></i> Delete</a>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
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
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
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

  @if (session('success'))
    swal("Success!", "{{session('success')}}", "success");
  @endif

  @if (session('info'))
    swal("Info!", "{{session('info')}}", "info");
  @endif

  @if (session('warning'))
    swal("Warning!", "{{session('warning')}}", "warning");
  @endif

  @if (session('error'))
    swal("Error!", "{{session('error')}}", "error");
  @endif

  $('.default-ordering').DataTable( {
    order: [],
    "scrollX": true,
    columnDefs: [{ orderable: false, targets: -1 }]
  });

});
</script>
@endsection