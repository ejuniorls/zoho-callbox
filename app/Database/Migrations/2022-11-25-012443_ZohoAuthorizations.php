<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ZohoAuthorizations extends Migration
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
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
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
        $this->forge->addForeignKey('client_id', 'zoho__clients', 'id');
        $this->forge->createTable('zoho__authorizations');
    }

    public function down()
    {
        $this->forge->dropTable('zoho__authorizations');
    }
}
