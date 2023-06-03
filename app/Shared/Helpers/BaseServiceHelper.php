<?php

declare(strict_types=1);

namespace App\Shared\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class BaseServiceHelper
{
    public static function getInsertPayloads(array | Collection $payloads, string $key)
    {
        if (gettype($payloads) === 'array') {
            $payloads = collect($payloads);
        }

        return collect($payloads)->filter(function ($item) use ($key) {
            return !array_key_exists($key, $item) || $item[$key] === null;
        })
            ->map(function ($item) {
                $res = $item;
                $res['created_at'] = Carbon::now();
                return $res;
            })->values()->toArray();
    }

    public static function getUpsertPayloads(array | Collection $payloads, string $key)
    {
        if (gettype($payloads) === 'array') {
            $payloads = collect($payloads);
        }

        return collect($payloads)->filter(function ($item) use ($key) {
            return array_key_exists($key, $item) && $item[$key] !== null;
        })
            ->map(function ($item) {
                $res = $item;
                $res['updated_at'] = Carbon::now();
                return $res;
            })
            ->values()->toArray();
    }
}
