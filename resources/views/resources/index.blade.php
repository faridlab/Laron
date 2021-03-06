@extends('layouts.bootstrap')
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
    <a href="{{url(Request::segment(1).'/create')}}" class="btn btn-light text-success"><span data-feather="plus"></span> New</a>
    <div class="btn-group">
      <a href="#export" class="btn btn-light text-dark"><span data-feather="upload"></span></a>
      <a href="#import" class="btn btn-light text-dark"><span data-feather="download"></span></a>
    </div>
    <a href="{{url(Request::segment(1).'/trash')}}" class="btn btn-light text-danger"><span data-feather="trash"></span> Trash</a>
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
                  @foreach($structures as $field)
                  @if($field['display'])
                  <th>{{title_case($field['field'])}}</th>
                  @endif
                  @endforeach
                  <th class="sorting_disabled"> </th>
                </tr>
              </thead>
              <tbody class="table-borderless"></tbody>
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

  // DATATABLE
  var columns = <?=json_encode($columns)?>;
  columns.push({
    data: '',
    defaultContent: ''
  });
  var datatable = $('.default-ordering').DataTable( {
    order: [],
    "scrollX": true,
    columnDefs: [{ orderable: false, targets: -1 }],
    "processing": true,
    "serverSide": true,
    "ajax": {
      "url": "{{url()->current()}}",
      "data": {
        "_token": "{{ csrf_token() }}"
      }
    },
    createdRow: function ( row, data, index ) {
      $(row).find('td:last-child').addClass('float-right');
      $(row).find('td:last-child').append(`
        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested dropdown">
          <button type="button" class="btn btn-round"><a href="{{url(Request::segment(1))}}/${data['id']}" class="text-dark"><i class="fa fa-eye"></i> Detail</a></button>
          <div class="btn-group" role="group">
            <button id="btn-group-drop-/${data['id']}" type="button" class="btn btn-round dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu" aria-labelledby="btn-group-drop-/${data['id']}">
              <a href="{{url(Request::segment(1))}}/${data['id']}" class="dropdown-item"><i class="fa fa-eye"></i> Detail</a>
              <a href="{{url(Request::segment(1))}}/${data['id']}/edit" class="dropdown-item"><i class="fa fa-edit"></i> Edit</a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item text-danger form-delete" data-id="/${data['id']}"><i class="fa fa-trash"></i> Delete</a>
            </div>
          </div>
        </div>
      `);
    },
    "columns": columns
  });

});
</script>
@endsection
