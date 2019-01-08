<?php

namespace App\Observers;

class Roles extends Observer
{

  public function saving($model) {
    $model->name = strtolower($model->name);
    $model->guard_name = (!is_null($model->guard_name) && !empty($model->guard_name))? $model->guard_name: 'web';
  }

}