<?php

/**
 * OstiumCMS
 * A simple, fast and extensible Content Management System
 * for website made by Wolestech (Software Development Agency)
 *
 * @copyright   Copyright (c) 2016-2017, Wolestech | Adnan Zaki
 * @license     MIT License | https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 */

class Attribute_data extends CI_Model
{
    public function get_category()
    {
        $query = $this->db->get('os_kategori')->result();
        return $query;
    }

    /**
     * Data kategori yang akan dikirim ke server
     *
     * @return array
     */
    protected function category_value()
    {
        $nama = $this->input->post('namaKategori');
        $slug = $this->input->post('slugKategori');
        $desk = $this->input->post('deskripsiKategori');
        $data = [
            'nama_kategori'        => $nama,
            'slug_kategori'        => $slug,
            'deskripsi_kategori'   => $desk
        ];

    return $data;
    }

    /**
     * Tambah data kategori
     *
     * @return void
     */
    public function insert_category()
    {
        $data = $this->category_value();
        $this->db->insert('os_kategori', $data);
    }

    /**
     * Hapus kategori
     *
     * @param int $id
     * @return void
     */
    public function delete_category($id)
    {
        $this->db->delete('os_kategori', ['id_kategori' => $id]);
    }

    /**
     * Ambil data kategori yang akan diedit
     *
     * @param int $id
     * @return void
     */
    public function edit_category($id)
    {
        return $this->db->get_where('os_kategori', ['id_kategori' => $id])->result();
    }

    /**
     * Update data kategori...
     *
     * @param int $id
     * @return void
     */
    public function update_category($id)
    {
        $data = $this->category_value();
        $this->db->where('id_kategori', $id);
        $this->db->update('os_kategori', $data);
    }
}
