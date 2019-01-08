<?php

namespace App\Observers;

class Observer
{

    public function retrieved($model) {

    }

    public function creating($model) {
        $this->saving($model);
    }

    public function created($model) {
        $this->saved($model);
    }

    public function updating($model) {
        $this->saving($model);
    }

    public function updated($model) {
        $this->saved($model);
    }

    public function saving($model) {

    }

    public function saved($model) {

    }

    public function restoring($model) {

    }

    public function restored($model) {

    }

    public function deleting($model) {

    }

    public function deleted($model) {

    }

    public function forceDeleted($model) {

    }
}
