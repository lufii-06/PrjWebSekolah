<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                "username" => 'admin',
                "password" => password_hash('12345', PASSWORD_DEFAULT),
                "level" => "Admin",
                "status" => "Active",
            ],
            [
                "username" => 'pimpinan',
                "password" => password_hash('12345', PASSWORD_DEFAULT),
                "level" => "Pimpinan",
                "status" => "Active",
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}