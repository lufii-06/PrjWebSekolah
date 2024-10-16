<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'unique' => true,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'level' => [
                'type'       => 'ENUM("Admin","Guru", "Pimpinan","Pengguna")',
                'null' => false,
                'default' =>    'Admin'
            ],
            'status' => [
                'type'       => 'ENUM("Active", "Non Active")',
                'null' => false,
                'default' =>    'Non Active'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');

        $seeder = \Config\Database::seeder();
        $seeder->call('UserSeeder');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}