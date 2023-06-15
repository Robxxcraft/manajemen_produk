<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $client = \Config\Services::curlrequest();
        $url = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';
        $currentDate = date('dmy');
        $currentDate2 = date('d-m-y');
        $hour = date('H')+1;

        $response = $client->request('POST', $url, [
            'multipart' => [
                'username' => 'tesprogrammer'.$currentDate.'C'.$hour,
                'password' => md5('bisacoding-'.$currentDate2),
            ],
        ]);
        $resBody = json_decode($response->getBody());
        
        foreach ($resBody->data as $produk) {
            $data = [
                'nama_produk' => $produk->nama_produk,
                'harga' => $produk->harga,
                'kategori' => $produk->kategori,
                'status' => strtolower(str_replace(' ', '_', $produk->status)),
            ];

            $this->db->table('produk')->insert($data);
        }
    }
}
