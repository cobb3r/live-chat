<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Connection extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'resourceID' => [
                'type' => 'INT',
            ],
            'userID' => [
                'type' => 'INT',
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('userID', 'Users', 'id');
        $this->forge->createTable('Connection');
    }

    public function down()
    {
        $this->forge->dropTable('Connection');
    }
}
