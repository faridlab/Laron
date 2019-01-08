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
</div>

<section>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit {{$title}}</h4>
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

            <form method="POST" action="{{url(Request::segment(1).'/'.Request::segment(2))}}" enctype="multipart/form-data" >
              @method('PUT')
              @csrf
              <input type="hidden" name="id" value="{{$data['id']}}" />
              <div class="form-group">
                <label for="form-method"  data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Method</label>
                <select class="form-control" name="method" id="form-method" aria-describedby="methodHelp" required>
                  <option value="">-- Method --</option>
                  <option value="*">All (*)</option>
                  <option value="get">GET</option>
                  <option value="post">POST</option>
                  <option value="put">PUT</option>
                  <option value="patch">PATCH</option>
                  <option value="delete">DELETE</option>
                  <option value="options">OPTIONS</option>
                </select>
                <small id="methodHelp" class="form-text text-muted">Method tell how users access the application.</small>
                @if ($errors->has('method'))
                <small class="form-text text-danger">
                  {{ $errors->first('method') }}
                </small>
                @endif
              </div>

              <div class="form-group">
                <label for="exampleInputRoute">Route</label>
                <input type="text" name="route" value="@old('route')" class="form-control" id="exampleInputRoute" aria-describedby="routeHelp" placeholder="ex: *, users/{id} etc" required>
                <small id="routeHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                @if ($errors->has('route'))
                <small class="form-text text-danger">
                  {{ $errors->first('route') }}
                </small>
                @endif
              </div>

              <div class="btn-group">
                <button type="button" class="btn btn-round">
                  <a href="{{url(Request::segment(1).'/'.Request::segment(2))}}" class="text-dark">
                    <i class="fa fa-close"></i> Cancel
                  </a>
                </button>
                <button type="button" class="btn btn-round">
                  <a href="#" class="text-danger form-delete" data-id="{{Request::segment(2)}}">
                    <i class="fa fa-trash"></i> Delete
                  </a>
                </button>
                <button class="btn btn-round text-success"><i class="fa fa-check"></i> Save</button>
              </div>
            </form>
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
<script>
$(document).ready(function() {
  var data = <?=json_encode($data)?>;
  $('select[name="method"]').val(data['method']);
  $('input[name="route"]').val(data['route']);
  console.log(data);


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

});
</script>
@endsection