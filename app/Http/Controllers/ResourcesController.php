<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Models\Resources;

class ResourcesController extends Controller
{
    protected $table_name = null;
    protected $model = null;
    protected $structures = array();
    protected $segments = [];

    protected $title = null;
    protected $description = null;
    protected $breadcrumbs = array(
      array(
        'link' => '/',
        'title' => 'Dashboard',
        'active' => false
      )
    );

    protected $options = array();
    protected $view = null;
    public $response = array();

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(Request $request, Resources $model)
    {
      try {
        $this->model = app("\\App\Models\\".studly_case($request->segment(1)));
      } catch (\Exception $e) {
        $this->model = $model;
      } finally {
        $this->registerPermissions($request);
        $this->model->setTable($request->segment(1));
        $this->table_name = $request->segment(1);
        $this->structures = $this->model->getStructure();
        $this->generateBreadcrumbs($request->segments());
        $this->segments = $request->segments();
        $this->response = array(
          'app' => config('app.name'),
          'version' => config('app.version', 1),
          'api_version' => config('api.version', 1),
          'status' => 'success',
          'code' => 200,
          'message' => null,
          'messages' => [],
          'errors' => [],
          'data' => [],
        );
      }
    }

    /**
     * Register role permissions
     * @return void
     */
    protected function registerPermissions(Request $request) {
      $this->middleware('permission:'.$request->segment(1).'@read|'.$request->segment(1).'@*|*@read|*', ['only' => ['index', 'show']]);
      $this->middleware('permission:'.$request->segment(1).'@create|'.$request->segment(1).'@*|*@create|*', ['only' => ['create','store']]);
      $this->middleware('permission:'.$request->segment(1).'@update|'.$request->segment(1).'@*|*@update|*', ['only' => ['edit','update']]);
      $this->middleware('permission:'.$request->segment(1).'@delete|'.$request->segment(1).'@*|*@delete|*', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      try {
        $columns = array();
        foreach ($this->structures as $field) {
          if($field['display']) $columns[] = array(
            "data" => $field['field']
          );
        }

        if(!$request->ajax()) {
          $data = $this->model->get();
          $this->view = view($this->table_name.'.index');
        }
      } catch(\Exception $e) {
        $this->view = view('resources.index');
      } finally {
        if($request->ajax()) {
          $data = $this->search($request);
          return response()->json($data);
        }
        return $this->view->with($this->respondWithData(array('data' => $data, 'columns' => $columns)));
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      try {
        $this->setTitle(title_case($this->title .' '.str_replace('_', ' ', str_singular($this->table_name))));
        $this->view = view($this->table_name.'.create');
      } catch (\Exception $e) {

      } finally {
        if(is_null($this->view)) $this->view = view('resources.create');
        return $this->view->with($this->respondWithData());
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {
        $validator = $this->model->validator($request);
        if ($validator->fails() && $request->ajax()) {
          $this->response['errors'] = $validator->errors();
          $this->response['code'] = 403;
          $this->response['message'] = $validator->errors()->first();
          return response()->json($this->response);
        }

        $validator->validate();
        foreach ($request->all() as $key => $value) {
          if(starts_with($key, '_')) continue;
          $this->model->setAttribute($key, $value);
        }
        $this->model->save();
        if($request->ajax()) {
          $this->response['message'] = title_case(str_singular($this->table_name)).' created!';
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
        return $this->view->with($this->respondWithData(array('data' => $data)));
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      try {
        $data = $this->model->find($id);
        $this->setTitle(title_case(str_singular($this->table_name)));
        $this->view = view($this->table_name.'.edit');
      } catch (\Exception $e) {

      } finally {
        if(is_null($this->view)) $this->view = view('resources.edit');
        foreach($this->structures as $key => $item) {
          $this->structures[$key]['value'] = $data->{$item['field']};
        }
        return $this->view->with($this->respondWithData(array('data' => $data)));
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      try {
        // Change rules of unique column
        $rules = $this->model->getRules();
        foreach ($rules as $key => $value) {
          if(str_contains($value, 'unique')) {
            $terms = explode('|', $value);
            foreach ($terms as $index => $term) {
              if(str_contains($term, 'unique')) $terms[$index] = $term .",$key,".$id;
            }
            $rules[$key] = implode('|', $terms);
          }
        }
        $this->model->setRules($rules);
        $this->model->validator($request)->validate();
        $model = $this->model::find($id);
        foreach ($request->all() as $key => $value) {
          if(starts_with($key, '_')) continue;
          $model->setAttribute($key, $value);
        }
        $model->save();
        return redirect($this->table_name.'/'.$id.'/edit')->with('success', title_case(str_singular($this->table_name)).' updated!');
      } catch (\Exception $e) {
        return redirect($this->table_name.'/'.$id.'/edit')->with('error', $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      try {
        $model = $this->model::find($id);
        $model->delete();
        if($request->ajax()) {
          $this->response['message'] = title_case(str_singular($this->table_name)).' deleted!';
          return response()->json($this->response);
        }
        return redirect($this->table_name)->with('success', title_case(str_singular($this->table_name)).' deleted!');
      } catch (\Exception $e) {
        if($request->ajax()) {
          $this->response['code'] = $e->getCode();
          $this->response['message'] = $e->getMessage();
          return response()->json($this->response, $e->getCode());
        }
        return redirect($this->table_name)->with('error', $e->getMessage());
      }
    }

    public function generateBreadcrumbs($segments = array()) {
      $hirarcies = array();
      if(count($segments) > 0) {
        foreach ($segments as $key => $segment) {
          $hirarcies[] = $segment;
          $this->breadcrumbs[] = array(
            'link' => implode("/", $hirarcies),
            'title' => title_case(str_replace('_', ' ', $segment)),
            'active' => isset($segments[$key +1])? false: true
          );
          if(!isset($segments[$key +1])) $this->setTitle(title_case(str_replace('_', ' ', $segment)));
        }
      }
    }

    public function setTitle($title) {
      $this->title = $title;
    }

    public function respondWithData($data = array()) {

      $result = array_merge(array (
          'title' => $this->title,
          'description' => $this->description,
          'breadcrumbs' => $this->breadcrumbs,
          'options' => $this->options,
          'structures' => $this->structures,
          'segments' => $this->segments
        ), $data);
      return $result;
    }

    public function search($request) {
      $query = $this->model->search($request);
      $data = array(
        "draw" => $request->get('draw'),
        "recordsTotal" => $this->model->count(),
        "recordsFiltered" => $query['count'],
        "data" => $query['data']
      );

      return $data;
    }
}
