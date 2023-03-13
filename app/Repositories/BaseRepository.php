<?php

namespace App\Repositories;

abstract class BaseRepository {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function show($id) {
        return $this->model->find($id);
    }

    public function update($id, $fields) {
        return $this->model->update($id, $fields);
    }

    public function remove($id) {
        return $this->model->delete($id);
    }

    public function store($id, $fields) {
        return $this->model->store($id, $fields);
    }
}
