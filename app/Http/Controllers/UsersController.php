<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resources;
use \App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

class UsersController extends ResourcesController
{

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
      $this->setTitle(title_case(str_singular($this->table_name)));
      $this->view = view($this->table_name.'.show');
    } catch (\Exception $e) {

    } finally {
      if(is_null($this->view)) $this->view = view('resources.show');
      foreach($this->structures as $key => $item) {
        $this->structures[$key]['value'] = $data->{$item['field']};
      }

      $user = User::find($id);
      $roles = Role::all()->toArray();
      $userRole = $user->roles->toArray();
      $roleNames = array_pluck($userRole, 'name');
      foreach ($roles as $key => $value) {
        if(in_array($value['name'], $roleNames)) {
          $roles[$key]['assigned'] = true;
        }
      }
      return $this->view->with($this->respondWithData(array('data' => $data, 'roles' => $roles)));
    }
  }

  public function assign($id, Request $request) {
    if(!is_null($request->get('role')) && !empty($request->get('role'))) {
      $this->response['data'] = $request->all();
      $user = User::find($id);
      $user->assignRole($request->get('role'));
      $this->response['message'] = 'Success assigned role!';
    } else {
      $this->response['code'] = 400;
      $this->response['message'] = 'Role name is required!';
    }
    return response()->json($this->response, $this->response['code']);
  }

  public function revoke($id, Request $request) {
    if(!is_null($request->get('role')) && !empty($request->get('role'))) {
      $this->response['data'] = $request->all();
      $user = User::find($id);
      $user->removeRole($request->get('role'));
      $this->response['message'] = 'Success revoked role!';
    } else {
      $this->response['code'] = 400;
      $this->response['message'] = 'Role name is required!';
    }
    return response()->json($this->response, $this->response['code']);
  }

}
