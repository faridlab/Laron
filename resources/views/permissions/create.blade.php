@extends('layouts.robust')

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

            <form method="POST" action="{{url($segments[0])}}" enctype="multipart/form-data" >
              @method('POST')
              @csrf

              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Permission</label>
                    <input type="text" name="name" class="form-control" placeholder="ex: users@create" required />
                    <small id="form-help-name" class="form-text text-muted"><strong>users@create</strong> read as permission for <i>Users</i> model at event <i>create</i></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Guard Name <small class="text-muted">&mdash; Optional</small></label>
                    <input type="text" name="guard_name" class="form-control" placeholder="ex: web" />
                    <small id="form-help-name" class="form-text text-muted">Left blank by default it will be filled with <i>web</i></small>
                  </div>
                </div>
              </div>
              <div class="btn-group">
                <button class="btn btn-round text-danger"><i class="fa fa-close"></i> Cancel</button>
                <button class="btn btn-round text-success"><i class="fa fa-check"></i> Create</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Default ordering table -->
@endsection

@section('js')
<script>
$(document).ready(function() {

});
</script>
@endsection