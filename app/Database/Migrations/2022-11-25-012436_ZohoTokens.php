<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ZohoTokens extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'client_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'access_token' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'refresh_token' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'expires_in' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('client_id', 'zoho__clients', 'id');
        $this->forge->createTable('zoho__tokens');
    }

    public function down()
    {
        $this->forge->dropTable('zoho__tokens');
    }
}
