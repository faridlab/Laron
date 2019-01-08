<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Interests;
use \App\Models\KolInterests;
use \App\Models\Kols;
use \App\Models\Profiles;
use \App\Models\ProfilePosts;
use \App\Models\Ratecards;

class KolsController extends ResourcesController
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    try {
      $data = Kols::list();
      $this->view = view($this->table_name.'.index');
    } catch(\Exception $e) {
      $this->view = view('resources.index');
    } finally {
      return $this->view->with($this->respondWithData(array('data' => $data)));
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    try {
      $data = $this->model->find($id);
      $interests = Interests::kolInterests($id);
      $profiles = Profiles::kolProfiles($id);
      $ratecards = Ratecards::where('kol_id', $id)->get();
      // dd($ratecards);
      $this->setTitle(title_case(str_singular($this->table_name)));
      $this->view = view($this->table_name.'.show');
    } catch (\Exception $e) {

    } finally {
      if(is_null($this->view)) $this->view = view('resources.show');
      foreach($this->structures as $key => $item) {
        $this->structures[$key]['value'] = $data->{$item['field']};
      }
      return $this->view->with($this->respondWithData(array('data' => $data, 'interests' => $interests, 'profiles' => $profiles, 'ratecards' => $ratecards)));
    }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function addOrRestoreInterest(Request $request, KolInterests $model)
  {
    try {
      $validator = $model->validator($request);
      if ($validator->fails() && $request->ajax()) {
        $this->response['errors'] = $validator->errors();
        $this->response['code'] = 403;
        $this->response['message'] = $validator->errors()->first();
        return response()->json($this->response);
      }

      $validator->validate();
      $interest = $model::onlyTrashed()
                ->where('kol_id', $request->kol_id)
                ->where('interest_id', $request->interest_id)
                ->first();

      if(!is_null($interest)) {
        $interest->restore();
        $this->response['message'] = title_case(str_singular($this->table_name)).' restored!';
      } else {
        foreach ($request->all() as $key => $value) {
          if(starts_with($key, '_')) continue;
          $model->setAttribute($key, $value);
        }
        $model->save();
        $this->response['message'] = title_case(str_singular($this->table_name)).' created!';
      }
      if($request->ajax()) {
        return response()->json($this->response);
      }
      return redirect($this->table_name)->with('success', title_case(str_singular($this->table_name)).' created!');
    } catch (\Exception $e) {
      if($request->ajax()) {
        $this->response['code'] = $e->getCode();
        $this->response['message'] = $e->getMessage();
        return response()->json($this->response, $e->getCode());
      }
      return redirect($this->table_name)->with('error', $e->getMessage());
    }
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function addOrUpdateProfiles(Request $request, $channel, Profiles $model)
  {
    try {
      $request->merge(array('channel' => $channel));
      $validator = $model->validator($request);
      if ($validator->fails() && $request->ajax()) {
        $this->response['errors'] = $validator->errors();
        $this->response['code'] = 403;
        $this->response['message'] = $validator->errors()->first();
        return response()->json($this->response);
      }


      $validator->validate();

      $profile = Profiles::updateOrCreate(
                  array(
                    'kol_id' => $request->kol_id,
                    'username' => $request->username,
                    'channel' => $channel
                  ),
                  array(
                    'kol_id' => $request->kol_id,
                    'username' => $request->username,
                    'channel' => $channel,
                    'fullname' => $request->fullname,
                    'website' => $request->website,
                    'bio' => $request->bio,
                    'posts' => $request->posts,
                    'followers' => $request->followers,
                    'following' => $request->following,
                    'photo' => $request->photo,
                  )
                );

      // ProfilePosts
      foreach (array_reverse($request->get('feeds')) as $feed) {
        ProfilePosts::updateOrCreate(
          array(
            'profile_id' => $profile->id,
            'post_url' => $feed['post_url']
          ),
          array(
            'photo' => $feed['photo'],
            'post_url' => $feed['post_url'],
            'caption' => $feed['caption'],
            'likes' => $feed['likes'],
            'comments' => $feed['comments'],
            'shares' => $feed['shares']
          )
        );
      }

      $this->response['code'] = 200;
      $this->response['message'] = 'KOL Profile has been created!';

      if($request->ajax()) {
        return response()->json($this->response);
      }
      return redirect($this->table_name)->with('success', title_case(str_singular($this->table_name)).' created!');
    } catch (\Exception $e) {
      if($request->ajax()) {
        $this->response['code'] = $e->getCode();
        $this->response['message'] = $e->getMessage();
        return response()->json($this->response, $e->getCode());
      }
      return redirect($this->table_name)->with('error', $e->getMessage());
    }
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function addOrUpdateRatecards(Request $request, $channel, Ratecards $model)
  {
    try {
      $request->merge(array('channel' => $channel));
      $validator = $model->validator($request);
      if ($validator->fails() && $request->ajax()) {
        $this->response['errors'] = $validator->errors();
        $this->response['code'] = 403;
        $this->response['message'] = $validator->errors()->first();
        return response()->json($this->response);
      }

      $validator->validate();
      Ratecards::create([
        'kol_id' => $request->get('kol_id'),
        'channel' => $request->get('channel'),
        'price' => $request->get('price')
      ]);

      $this->response['code'] = 200;
      $this->response['message'] = 'Rate card has been created!';

      if($request->ajax()) {
        return response()->json($this->response);
      }
      return redirect($this->table_name)->with('success', title_case(str_singular($this->table_name)).' created!');
    } catch (\Exception $e) {
      if($request->ajax()) {
        $this->response['code'] = $e->getCode();
        $this->response['message'] = $e->getMessage();
        return response()->json($this->response, $e->getCode());
      }
      return redirect($this->table_name)->with('error', $e->getMessage());
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function removeInterest(Request $request)
  {
    try {
      $model = KolInterests::where('kol_id', $request->kol_id)->where('interest_id', $request->interest_id)->first();
      $model->delete();
      if($request->ajax()) {
        $this->response['data'] = $model;
        $this->response['message'] = title_case(str_singular('Interest')).' deleted!';
        return response()->json($this->response);
      }
      return redirect($this->table_name)->with('success', title_case(str_singular('Interest')).' deleted!');
    } catch (\Exception $e) {
      if($request->ajax()) {
        $this->response['code'] = $e->getCode();
        $this->response['message'] = $e->getMessage();
        return response()->json($this->response, $e->getCode());
      }
      return redirect($this->table_name)->with('error', $e->getMessage());
    }
  }

}
