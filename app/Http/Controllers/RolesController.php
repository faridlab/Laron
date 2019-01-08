<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

class RolesController extends ResourcesController
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

      $role = Role::find($id);
      $permissions = Permission::all()->toArray();
      $rolePermissions = $role->permissions->toArray();
      $permissionNames = array_pluck($rolePermissions, 'name');
      foreach ($permissions as $key => $value) {
        if(in_array($value['name'], $permissionNames)) {
          $permissions[$key]['permitted'] = true;
        }
      }
      return $this->view->with($this->respondWithData(array('data' => $data, 'permissions' => $permissions)));
    }
  }

  public function assign($id, Request $request) {
    if(!is_null($request->get('permission')) && !empty($request->get('permission'))) {
      $this->response['data'] = $request->all();
      $role = Role::find($id);
      $role->givePermissionTo($request->get('permission'));
      $this->response['message'] = 'Success assigned permission!';
    } else {
      $this->response['code'] = 400;
      $this->response['message'] = 'Permission name is required!';
    }
    return response()->json($this->response, $this->response['code']);
  }

  public function revoke($id, Request $request) {
    if(!is_null($request->get('permission')) && !empty($request->get('permission'))) {
      $this->response['data'] = $request->all();
      $role = Role::find($id);
      $role->revokePermissionTo($request->get('permission'));
      $this->response['message'] = 'Success revoked permission!';
    } else {
      $this->response['code'] = 400;
      $this->response['message'] = 'Permission name is required!';
    }
    return response()->json($this->response, $this->response['code']);
  }

}
