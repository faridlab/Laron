@extends('layouts.robust')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/sweetalert.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-content-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-overlay-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/users.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/icomoon.css')}}">
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

  <!--
  <div class="content-header-right text-md-right col-4">
    <div class="btn-group">
      <button class="btn btn-round"><a href="{{url(Request::segment(1).'/'.Request::segment(2).'/edit')}}" class="text-dark"><i class="fa fa-edit"></i> Edit</a></button>
      <button class="btn btn-round" class="text-danger"><a href="#" class="text-danger form-delete" data-id="{{Request::segment(2)}}"><i class="fa fa-trash"></i> Delete</a></button>
    </div>
  </div>
  -->
</div>

<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" id="base-pillEle41" data-toggle="pill" href="#pillEle41" aria-expanded="true">
      Overview
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="base-user-profile-cards-with-cover-image" data-toggle="pill" href="#user-profile-cards-with-cover-image" aria-expanded="false">
      Instagram
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="base-pillEle43" data-toggle="pill" href="#pillEle43" aria-expanded="false">
      Facebook
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link">
      <span class="badge badge-pill badge-glow badge-default badge-info">1</span> Disabled</a>
  </li>
</ul>

<div class="tab-content pt-1">

  <!-- Overview -->
  <section role="tabpanel" class="tab-pane active row" id="pillEle41" aria-expanded="true" aria-labelledby="base-pillEle41">
    <div class="row">
      <div class="col-4">
        <div class="card profile-card-with-cover box-shadow-2">
          <div class="card-img-top img-fluid bg-cover height-200" style="background-color: #BCD4E9;"></div>
          <div class="card-profile-image">
            <img src="{{$data->photo}}" width="111px" class="rounded-circle img-border box-shadow-4" alt="Card image">
          </div>
          <div class="profile-card-with-cover-content text-center">
            <div class="card-block">
              <h4 class="card-title"><strong>{{$data->first_name}} {{$data->last_name}}</strong></h4>
              <ul class="list-inline list-inline-pipe">
                <li>{{$data->email}}</li>
                <!-- <li>{{$data->phone}}</li> -->
              </ul>
              <h6 class="card-subtitle text-muted"><small>{{$data->address}}</small></h6>
            </div>

            <div class="card-block mt-1 my-1">
              <button type="button" class="btn mr-1"><a href="{{url(Request::segment(1).'/'.Request::segment(2).'/edit')}}"
                  class="text-dark"><i class="fa fa-edit"></i> Edit</a></button>
              <button type="button" class="btn mr-1"><a href="#" class="text-danger form-delete" data-id="{{Request::segment(2)}}"><i
                    class="fa fa-trash"></i> Delete</a></button>
            </div>
          </div>
        </div>

        <div class="card box-shadow-2 p-1 card-interests">
          <div class="card-block">
            <h4 class="card-title"><strong>Interests</strong></h4>
            @foreach($interests as $interest)
            @if($interest->selected)
            <a id="interest-{{$interest->id}}" data-id="{{$interest->id}}" data-kolid="{{$data->id}}" class="badge badge-pill badge-glow badge-success remove-interest">{{$interest->name}}
              <i class="fa fa-close text-danger"></i></a>
            @else
            <a id="interest-{{$interest->id}}" data-id="{{$interest->id}}" data-kolid="{{$data->id}}" class="badge badge-pill badge-light text-dark add-interest">{{$interest->name}}
              <i class="fa fa-plus text-success"></i></a>
            @endif
            @endforeach
          </div>
        </div>

      </div>

      <div class="col-8">

        <!-- Basic Tables start -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Rate Cards</h4>
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
                <div class="table-responsive">
                  <table class="table mb-0">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Channel</th>
                        <th>Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($ratecards as $key => $rate)
                      <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$data->first_name}} {{$data->last_name}}</td>
                        <td>{{$rate->channel}}</td>
                        <td>{{number_format($rate->price)}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Basic Tables end -->
        <form id="form-ratecard">
          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <label for="form-ratecard-platform">Rate Card</label>
                <select class="form-control" id="form-ratecard-platform" required>
                  <option value="">-- Platform --</option>
                  <option value="instagram">Instagram</option>
                  <option value="facebook">Facebook</option>
                  <option value="twitter">Twitter</option>
                  <option value="other">Other</option>
                </select>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="form-ratecard-price">Price</label>
                <input type="number"  id="form-ratecard-price" class="form-control" required >
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-success btn-lg btn-block btn-ratecard-submit">
            <i class="fa fa-plus"></i>
            <i class="fa fa-circle-o-notch spinner hidden"></i>
            Add Rate Card</button>
        </form>
      </div>
    </div>
  </section>

  <!-- Instagram -->
  <section class="tab-pane fade" id="user-profile-cards-with-cover-image" aria-labelledby="base-user-profile-cards-with-cover-image">

    <div id="user-profile">
      @foreach($profiles as $profile)
      <div class="row">
        <div class="col-12">
          <div class="card profile-with-cover">
            <div class="card-img-top img-fluid bg-cover height-200" style="background-color: #BCD4E9;"></div>
            <div class="media profil-cover-details w-100">
              <div class="media-left pl-2">
                <a href="#" class="profile-image">
                  <img src="{{$profile['photo']}}" class="rounded-circle img-border height-100" alt="{{$profile['fullname']}}">
                </a>
              </div>
              <div class="media-body pt-1 px-2">
                <div class="row">
                  <div class="col">
                    <h3 class="card-title">{{$profile['fullname']}}</h3>
                  </div>
                  <div class="col text-right">
                    <button type="button" class="btn btn-success update-profile-btn" data-kolid="{{$profile['kol_id']}}" data-channel="{{$profile['channel']}}" data-username="{{$profile['username']}}"><i class="fa fa-refresh"></i> Update</button>
                  </div>
                </div>
              </div>
            </div>
            <nav class="navbar navbar-light navbar-profile align-self-end">
              <button class="navbar-toggler d-sm-none" type="button" data-toggle="collapse" aria-expanded="false"
                aria-label="Toggle navigation"></button>
              <nav class="navbar navbar-expand-lg">
                <div class="collapse navbar-collapse">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="#"><strong>{{number_format($profile['rate'])}} E.R</strong></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"><strong>{{number_format_short($profile['posts_count'])}} Posts</strong></a>
                    </li>
                    <li class="nav-item ml-1">
                      <a class="nav-link" href="#"><strong>{{number_format_short($profile['followers_count'])}} Followers</strong></a>
                    </li>
                    <li class="nav-item ml-1">
                      <a class="nav-link" href="#"><strong>{{number_format_short($profile['following_count'])}} Following</strong></a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>

            <h6 class="card-subtitle text-muted mb-1"><small>Updated at {{$profile['updated_at']}}</small></h6>

            <!-- POSTS -->
            @if(count($profile['posts']))
            <div class="row">
              @foreach($profile['posts'] as $post)
              <div class="col-xl-6 col-md-6 col-12">
                <div class="card profile-card-with-cover">
                  <div class="card-content">
                    <!--<img class="card-img-top img-fluid" src="../../../app-assets/images/carousel/18.jpg" alt="Card cover image">-->
                    <div class="card-img-top img-fluid bg-cover height-200" style="background: url('{{$post['photo']}}') 0 30%;"></div>
                    <div class="text-center mt-1 p-1">
                      <div class="profile-details">
                        <!-- <span>{{$post['caption']}}</span> -->
                        <ul class="list-inline clearfix mt-1">
                          <li class="mr-3">
                            <h4 class="block">{{number_format($post['likes'])}}</h4> Likes</li>
                          <li>
                            <h4 class="block">{{number_format($post['comments'])}}</h4> Comments</li>
                          <!-- <li>
                            <h4 class="block">645</h4> Following</li> -->
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            @endif
        </div>
      </div>
      @endforeach
    </div>

    <form id="form-platform">
      <div class="form-group">
        <label for="form-platform-select">Platform</label>
        <select class="form-control" id="form-platform-select" required>
          <option value="">-- Platform --</option>
          <option value="instagram">Instagram</option>
          <option value="facebook">Facebook</option>
          <option value="twitter">Twitter</option>
          <option value="other">Other</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-plus"></i> Add Profile</button>
    </form>

  </section>

  <div class="tab-pane fade" id="pillEle43" aria-labelledby="base-pillEle43">
    <p>Biscuit ice cream halvah candy canes bear claw ice cream
      cake chocolate bar donut. Toffee cotton candy liquorice.
      Oat cake lemon drops gingerbread dessert caramels. Sweet
      dessert jujubes powder sweet sesame snaps.</p>
  </div>
</div>

<!--/ Default ordering table -->
<form method="POST" id="form-delete" action="" enctype="multipart/form-data">
  @method('DELETE')
  @csrf
</form>
@endsection

@section('js')
<script src="{{asset('app-assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
<script>
  $(document).ready(function () {

    $(document).on('click', '.form-delete', function () {

      var id = $(this).data('id');
      if (!id) return;

      swal({
          title: "Are you sure?",
          text: "Are you sure want to delete this data?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $('#form-delete').attr('action', '{{url($segments[0])}}/' + id);
            $('#form-delete').submit();
          }
        });
    });

    // INTEREST Add
    $('.card-interests').on('click', '.add-interest', function (evt) {
      var $dom = $(this);
      var params = {
        kol_id: $(this).data('kolid'),
        interest_id: $(this).data('id'),
        "_token": "{{ csrf_token() }}",
      };

      $.post("{{url('kols/add_or_restore_interest')}}", params)
        .done(function (data) {
          // removeClass add-interest
          $dom.removeClass('badge-light text-dark add-interest');
          $dom.find('i').removeClass('fa-plus text-success');
          // addClass remove-interest
          $dom.addClass('badge-glow badge-success remove-interest');
          $dom.find('i').addClass('fa-close text-danger');
        });
    });

    // INTEREST Remove
    $('.card-interests').on('click', '.remove-interest', function (evt) {
      var $dom = $(this);
      var params = {
        kol_id: $(this).data('kolid'),
        interest_id: $(this).data('id'),
        "_token": "{{ csrf_token() }}",
        "_method": 'DELETE'
      };

      $.post("{{url('kols/remove_interest')}}", params)
        .done(function (data) {
          // removeClass remove-interest
          $dom.removeClass('badge-glow badge-success remove-interest');
          $dom.find('i').removeClass('fa-close text-danger');
          // addClass add-interest
          $dom.addClass('badge-light text-dark add-interest');
          $dom.find('i').addClass('fa-plus text-success');
        });
    });

    $('form#form-platform').on('submit', function (evt) {
      evt.preventDefault();
      var channel = $('#form-platform-select').val();

      swal({
          text: 'Input username (ex: faridlab)',
          content: "input",
          button: {
            text: "Sync",
            closeModal: false,
          },
        })
        .then(username => {
          if (!username) throw null;
          return fetch(`http://{{ env('SCRAPPER_HOST') }}:{{ env('SCRAPPER_PORT') }}/${channel}/u/${username}`);
        })
        .then(results => {
          return results.json();
        })
        .then(params => {
          params['kol_id'] = {{$data->id}};
          params["_token"] = "{{ csrf_token() }}",

            $.post("{{url('kols/profiles')}}/" + channel, params)
            .done(function (response) {
              swal("Profile Created", response['message'], "success");
            });
        })
        .catch(err => {
          if (err) {
            swal("Oops!", "The AJAX request failed!", "error");
          } else {
            swal.stopLoading();
            swal.close();
          }
        });
      return false;
    });

    $('.update-profile-btn').on('click', function() {
      var channel = $(this).data('channel');
      var username = $(this).data('username');
      swal({
          text: `Are you sure want to update ${username} from ${channel}?`,
          // content: "input",
          button: {
            text: "Update",
            closeModal: false,
          },
        })
      .then((confirmed) => {
        if (!confirmed) throw null;
        return fetch(`http://{{ env('SCRAPPER_HOST') }}:{{ env('SCRAPPER_PORT') }}/${channel}/u/${username}`);
      })
      .then(results => {
        return results.json();
      })
      .then(params => {
        params['kol_id'] = {{$data->id}};
        params["_token"] = "{{ csrf_token() }}",

        $.post("{{url('kols/profiles')}}/" + channel, params)
        .done(function (response) {
          swal("Profile Updated", response['message'], "success");
        });
      })
      .catch(err => {
        if (err) {
          swal("Oops!", "The AJAX request failed!", "error");
        } else {
          swal.stopLoading();
          swal.close();
        }
      });

    });

    $('form#form-ratecard').on('submit', function (evt) {
      evt.preventDefault();
      var channel = $('#form-ratecard-platform').val();
      var price = $('#form-ratecard-price').val();

      $('.btn-ratecard-submit').attr('disabled', true);
      $('.btn-ratecard-submit .fa-plus').addClass('hidden');
      $('.btn-ratecard-submit .spinner').removeClass('hidden');

      var params = {};
      params['channel'] = channel;
      params['price']   = price;
      params['kol_id']  = {{$data->id}};
      params["_token"]  = "{{ csrf_token() }}",

      $.post("{{url('kols/ratecard')}}/" + channel, params)
      .done(function (response) {
        swal("Rate Card Created", response['message'], "success");
        $('.btn-ratecard-submit').attr('disabled', false);
        $('.btn-ratecard-submit .fa-plus').removeClass('hidden');
        $('.btn-ratecard-submit .spinner').addClass('hidden');
      });

      return false;

    });

  });
</script>
@endsection
