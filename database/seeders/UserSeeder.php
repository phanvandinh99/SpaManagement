<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Shared\Constants\Role;
use App\Shared\Constants\TableName;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Schema::hasTable(TableName::USER)) {
            return;
        }
        $this->initialUsersIfNotExists();
    }


    private function initialUsersIfNotExists()
    {
        // This is dump data
        $listUserNeedCreate = [
            // Admin
            [
                "id" => 1,
                "email" => "Admin@gmail.com",
                "password" => "123456",
                "full_name" => "Quản Trị",
                "birthday" => "2000/01/01",
                "gender" => "nam",
                "phone_number" => "0971234567",
                "address" => "Đà Nẵng",
                "role" => Role::ADMIN
            ],
            [
                "id" => 2,
                "email" => "Admin2@gmail.com",
                "password" => "123456",
                "full_name" => "Quản Trị 2",
                "birthday" => "2000/01/01",
                "gender" => "Nữ",
                "phone_number" => "0365242565",
                "address" => "Huế",
                "role" => Role::ADMIN
            ],
            // User
            [
                "id" => 3,
                "email" => "Minh@gmail.com",
                "password" => "123456",
                "full_name" => "Nhật Minh",
                "birthday" => "1999/12/11",
                "gender" => "nam",
                "phone_number" => "0971010281",
                "address" => "Đà Nẵng",
                "role" => Role::USER
            ],
            [
                "id" => 4,
                "email" => "Dinh@gmail.com",
                "password" => "123456",
                "full_name" => "Phan Văn Định",
                "birthday" => "1999/02/30",
                "gender" => "nam",
                "phone_number" => "0971010282",
                "address" => "Huế",
                "role" => Role::USER
            ],
        ];

        foreach ($listUserNeedCreate as $userJson) {
            if ($this->userRepository->countByEmail($userJson['email'])) {
                continue;
            }

            $user = new User();
            $user->email = $userJson['email'];
            $user->password = Hash::make($userJson['password']);
            $user->full_name = $userJson['full_name'];
            $user->birthday = Carbon::parse($userJson['birthday']);
            $user->gender = $userJson['gender'];
            $user->phone_number = $userJson['phone_number'];
            $user->address = $userJson['address'];

            $user->assignRole($userJson['role']);
            $user->save();
        }
    }
}
