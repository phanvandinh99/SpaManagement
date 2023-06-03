<?php

declare(strict_types=1);

namespace App\Services;

use App\Shared\Helpers\BaseServiceHelper;

class BaseService
{
    private $baseRepository;

    public function __construct($baseRepository)
    {
        $this->baseRepository = $baseRepository;
    }

    public function getById($id)
    {
        return $this->baseRepository->findById($id);
    }

    public function getAll()
    {
        return $this->baseRepository->all();
    }

    public function create($payload)
    {
        return $this->baseRepository->store($payload);
    }

    public function createAll($payloads)
    {
        foreach ($payloads as $payload) {
            $this->baseRepository->store($payload);
        }
    }

    public function update($payload)
    {
        return $this->baseRepository->update($payload);
    }

    public function updateAll($payloads)
    {
        foreach ($payloads as $payload) {
            $this->baseRepository->update($payload);
        }
    }

    public function createOrUpdateAll($payloads, $primaryKey = 'id')
    {
        foreach ($payloads as $payload) {
            $this->createOrUpdate($payload, $primaryKey);
        }
    }

    public function createOrUpdate($payload, $primaryKey = 'id')
    {
        if (!array_key_exists($primaryKey, $payload) || !$payload[$primaryKey]) {
            $this->baseRepository->store($payload);
        } else {
            $this->baseRepository->update($payload);
        }
    }

    public function insert($payloads, $key = "id")
    {
        $payloadsInsert = BaseServiceHelper::getInsertPayloads($payloads, $key);
        $this->baseRepository->modelInstance()->insert($payloadsInsert);
    }

    public function upsert($payloads, $key = "id", $columnKeys = ["id"], $columnsUpsert = null)
    {
        $payloadsUpsert = BaseServiceHelper::getUpsertPayloads($payloads, $key);
        $this->baseRepository->modelInstance()->upsert($payloadsUpsert, $columnKeys, $columnsUpsert);
    }

    public function insertOrUpsert($payloads, $key = "id")
    {
        $this->insert($payloads, $key);
        $this->upsert($payloads, $key, [$key]);
    }
}
