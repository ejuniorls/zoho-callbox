<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Zoho extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'app_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'client_id' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'client_secret' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'install_uri' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'redirect_uri' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'hapikey' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('app_id', true);
        $this->forge->createTable('zoho');
    }

    public function down()
    {
        $this->forge->dropTable('zoho');
    }
}
