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
@endsection
