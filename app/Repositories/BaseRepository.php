<?php

declare(strict_types=1);

namespace App\Repositories;

use Carbon\Carbon;

class BaseRepository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function modelInstance()
    {
        return $this->model;
    }

    public function all()
    {
        return $this->model::all();
    }

    public function findById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function isExistsById($id)
    {
        return $this->model->where('id', $id)->exists();
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($data, string $key = 'id')
    {
        $data['updated_at'] = Carbon::now();
        return $this->model->where($key, $data['id'])->update($data);
    }

    public function updateById($data, int $id, string $key = 'id')
    {
        $data['updated_at'] = Carbon::now();
        return $this->model->where($key, $id)->update($data);
    }

    public function updateByIds($data, $ids)
    {
        $data['updated_at'] = Carbon::now();
        return $this->model->whereIn('id', $ids)->update($data);
    }

    public function insert($data)
    {
        return $this->model->insert($data);
    }
}
