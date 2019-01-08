<?php

namespace App\Observers;

class Users extends Observer
{

  public function saving($model) {
    $model->password = bcrypt($model->password);
  }

  public function saved($model) {

  }

}