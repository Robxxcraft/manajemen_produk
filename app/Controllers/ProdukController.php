<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Produk;

class ProdukController extends BaseController
{
    public function index()
    {
        $produkModel = new Produk();
        
        if ($this->request->getVar('filter')) {
            $data = $produkModel->orderBy('id_produk', 'DESC')->where('status', $this->request->getVar('filter'))->findAll();
        } else {
            $data = $produkModel->orderBy('id_produk', 'DESC')->findAll();
        }
        return view('produk/kelola', ['produks' => $data]);
    }

    public function create_form()
    {
        helper(['form']);
        return view('produk/tambah');
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'nama_produk' => [
                'rules' => 'required|min_length[3]|is_unique[produk.nama_produk]',
                'errors' => [
                    'required' => 'Nama Produk harus diisi',
                    'min_length' => 'Nama Produk minimal 3 huruf',
                    'is_unique' => 'Nama Produk tidak boleh sama',
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga harus diisi',
                    'numeric' => 'Harga harus berupa angka',
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori harus diisi',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status harus dipilih',
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $produk = new Produk();
            $produk->insert([
                'nama_produk' => $this->request->getVar('nama_produk'),
                'harga' => $this->request->getVar('harga'),
                'kategori' => $this->request->getVar('kategori'),
                'status' =>  $this->request->getVar('status'),
            ]);
        } else {
            return redirect()->to(base_url('/produk/tambah'))->withInput()->with('errors', $this->validator);
        }

        return redirect()->to(base_url('produk'))->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit_form($id)
    {
        helper(['form']);        
        $produkModel = new Produk();
        $data = $produkModel->where('id_produk', $id)->find();
        return view('produk/edit', ['produk' => $data[0]]);
    }

    public function update($id)
    {
        helper(['form']);
        $rules = [
            'nama_produk' => [
                'rules' => "required|min_length[3]|is_unique[produk.nama_produk,id_produk,$id]",
                'errors' => [
                    'required' => 'Nama Produk harus diisi',
                    'min_length' => 'Nama Produk minimal 3 huruf',
                    'is_unique' => 'Nama Produk tidak boleh sama',
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga harus diisi',
                    'numeric' => 'Harga harus berupa angka',
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori harus diisi',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status harus dipilih',
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $produk = new Produk();
            $produk->update($id, [
                'nama_produk' => $this->request->getVar('nama_produk'),
                'harga' => $this->request->getVar('harga'),
                'kategori' => $this->request->getVar('kategori'),
                'status' =>  $this->request->getVar('status'),
            ]);
        } else {
            return redirect()->to(base_url('produk/tambah'))->withInput()->with('errors', $this->validator);
        }

        return redirect()->to(base_url('produk'))->with('success', 'Produk berhasil diubah');
    }

    public function destroy()
    {
        $id = (int) $this->request->getVar('id');
        $produk = new Produk();
        $produk->where('id_produk', $id)->delete();
        return redirect()->to(base_url('produk'))->with('success', 'Produk berhasil dihapus');
    }
}
