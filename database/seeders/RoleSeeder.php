<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Shared\Constants\Role as RoleName;
use App\Shared\Constants\TableName;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        if (!Schema::hasTable(TableName::ROLE)) {
            return;
        }
        $this->initialRolesIfNotExists();
    }

    private function initialRolesIfNotExists()
    {
        foreach (RoleName::ALL_ROLE as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }
    }
}
