<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ZohoClients extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'hub_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'app_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'callbox' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'https' => [
                'type' => 'INT',
                'constraint' => '1',
                'unsigned' => true,
                'null' => false,
                'default' => '0',
            ],
            'user' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'errno' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'error_message' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('app_id', 'zoho', 'app_id');
        $this->forge->createTable('zoho__clients');
    }

    public function down()
    {
        $this->forge->dropTable('zoho__clients');
    }
}
