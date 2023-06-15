<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProduk extends Migration
{
    public function up()
    {
        $this->db->create('manajemen_produk');
        $this->forge->addField([
            'id_produk' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique' => true,
            ],
            'harga' => [
                'type' => 'BIGINT',
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['tidak_bisa_dijual', 'bisa_dijual'],
                'default' => 'tidak_bisa_dijual',
            ],
        ]);
        $this->forge->addKey('id_produk', true);
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
