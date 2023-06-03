<?php

declare(strict_types=1);

namespace App\Shared\Helpers;

class JsonFileHelper
{
    public static function loadJsonFile(string $fileName)
    {
        return file_get_contents(base_path("json/{$fileName}"));
    }

    public static function getDataJsonFile(string $fileName)
    {
        return json_decode(JsonFileHelper::loadJsonFile($fileName), true);
    }
}
