<?php

namespace App\Observers;

class Permissions extends Observer
{

  public function saving($model) {
    $model->guard_name = (!is_null($model->guard_name) && !empty($model->guard_name))? $model->guard_name: 'web';
  }

}