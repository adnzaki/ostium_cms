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

class Posts_data extends CI_Model
{
    /**
     * Ambil data total baris dari tabel post
     * @param string $status
     * @param int $date
     * @param int $category
     * @return mixed
     */
    public function get_total_post($status = '', $date = 0, $category = 0)
    {
        if(! empty($status))
        {
            $this->db->where('status_post', $status);
        }

        if($date !== 0)
        {
            $year = substr($date, 0, 4);
            $month = substr($date, 4, 2);
            $this->db->like('tanggal_post', $year . '-' . $month, 'after');
        }

        if($category !== 0)
        {
            $this->db->join('os_kategori_post', 'os_post.id_post = os_kategori_post.id_post');
            $this->db->where('id_kategori', $category);
        }

        $keyword = $this->input->get('cari-post');
        $this->db->like('judul_post', $keyword);

        return $this->db->count_all_results('os_post');
    }

    /**
     * Ambil data total baris dari tabel komentar
     * @return mixed
     */
    public function get_total_comment()
    {
        return $this->db->count_all('os_komentar');
    }

    /**
     * Ambil atribut post dari database
     * @return mixed
     */
    public function get_post_attribute($table)
    {
        $get_data = $this->db->get($table);
        return $get_data->result();
    }

    /**
     * Get user id from its user_login data
     *
     * @return array
     */
    public function get_user()
    {
        $query = $this->db->get_where('os_user', ['user_login' => $this->session->userdata('username')]);
        return $query->result();
    }

    /**
     * Ambil data post dan draft terbaru
     * @param int $limit
     * @param string $key
     * @return mixed
     */
    public function get_recent_post($limit, $key)
    {
        $this->db->select('*');
        $this->db->from('os_post');
        $this->db->join('os_user', 'os_post.penulis_post = os_user.id_user');
        $this->db->where('status_post', $key);
        $this->db->order_by('os_post.id_post', 'DESC');
        $this->db->limit($limit, 0);
        $get_data = $this->db->get();
        return $get_data;
    }

    /**
     * Ambil data seluruh post dan draft
     * @param string $status
     * @param int $date
     * @param int $category
     * @param int $total
     * @param int $offset
     * @return mixed
     */
    public function get_all_post($status = '', $date = 0, $category = 0, $total, $offset)
    {
        $this->db->select('*');
        $this->db->from('os_post');
        $this->db->join('os_user', 'os_post.penulis_post = os_user.id_user');

        if(! empty($status))
        {
            $this->db->where('status_post', $status);
        }

        if($date !== 0)
        {
            $year = substr($date, 0, 4);
            $month = substr($date, 4, 2);
            $this->db->like('tanggal_post', $year . '-' . $month, 'after');
        }

        if($category !== 0)
        {
            $this->db->join('os_kategori_post', 'os_post.id_post = os_kategori_post.id_post');
            $this->db->where('id_kategori', $category);
        }

        $keyword = $this->input->get('cari-post');
        $this->db->like('judul_post', $keyword);
        $this->db->order_by('os_post.tanggal_post', 'DESC');
        $this->db->limit($total, $offset);
        $get_data = $this->db->get();

        return $get_data;
    }

    /**
     * Ambil kategori untuk ditampilkan bersama daftar post
     *
     * @param int $id_post
     * @return void
     */
    public function get_category($id_post)
    {
        $this->db->select('nama_kategori')->from('os_kategori_post')
            ->join('os_kategori', 'os_kategori_post.id_kategori = os_kategori.id_kategori')
            ->join('os_post', 'os_kategori_post.id_post = os_post.id_post')
            ->where('os_post.id_post', $id_post);
        return $this->db->get();
    }

    /**
     * Mengambil tanggal yang ada pada tabel post
     *
     * @return array
     */
    public function get_post_date()
    {
        $this->db->distinct();
        $this->db->order_by('tanggal_post', 'DESC');
        $get = $this->db->get('os_post');
        return $get->result();
    }

    /**
     * Ambil beberapa data dari post yang baru saja dibuat
     *
     * @return array
     */
    public function get_simple_data()
    {
        $this->db->select('id_post, status_post, permalink')->from('os_post')
            ->order_by('id_post', 'DESC')->limit(1);
        $result = $this->db->get()->result();
        $data = [];
        foreach ($result as $res)
        {
            $data = [
                'id' => $res->id_post,
                'status' => $res->status_post,
                'permalink' => $res->permalink
            ];
        }

        return $data;
    }

    /**
     * Mengambil data dari form
     * @return array
     */
    protected function common_data()
    {
        $data = [
            'judul'     => $this->input->post('judul_post'),
            'author'    => $this->input->post('user'),
            'tag_name'  => $this->input->post('tag-name'),
            'tag_slug'  => $this->input->post('tag-slug'),
            'isi_post'  => $this->input->post('isi_post'),
            'tanggal'   => date('Y-m-d H:i:s'),
            'gambar'    => $this->input->post('gambar-fitur'),
            'permalink' => $this->input->post('permalink'),
            'visibilitas' => $this->input->post('visibilitas')
        ];

        return $data;
    }

    /**
     * Data yang selalu diinput ke database
     * @return array
     */
    protected function insert_value()
    {
        $input = $this->common_data();
        $data = [
            'judul_post'      => $input['judul'],
            'penulis_post'    => $input['author'],
            'tag_post'        => $input['tag_name'],
            'tag_slug'        => $input['tag_slug'],
            'isi_post'        => $input['isi_post'],
            'gambar_fitur'    => $input['gambar'],
            'permalink'       => $this->validate_permalink($input['permalink'], 'add')
        ];

        return $data;
    }

    /**
     * Simpan data ke database
     * @return void
     */
    public function insert_post()
    {
        $input  = $this->common_data();
        $data   = $this->insert_value();
        if(empty($input['judul']))
        {
            $data['status_post'] = "draft";
            $data['judul_post'] = "Tanpa Judul";
        }
        else
        {
            $data['status_post'] = "publik";
        }
        $data['visibilitas_post']   = $input['visibilitas'];
        $data['tanggal_post']       = $input['tanggal'];
        $this->db->insert('os_post', $data);
        $this->insert_category($this->db->insert_id());
        $this->insert_tag();
    }

    /**
     * Simpan draft....
     * @return void
     */
    public function insert_draft()
    {
        $input  = $this->common_data();
        $data   = $this->insert_value();
        $data['status_post']        = "draft";
        $data['visibilitas_post']   = $input['visibilitas'];
        $data['tanggal_post']       = $input['tanggal'];
        $this->db->insert('os_post', $data);
        $this->insert_category($this->db->insert_id());
        $this->insert_tag();
    }

    /**
     * Mengecek apakah post ada atau tidak
     * @param int $id
     * @return bool
     */
    public function post_exists($id)
    {
        $get_data = $this->db->get_where('os_post', array('id_post' => $id));
        if($get_data->num_rows() === 0)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    /**
     * Mengambil post yang akan diedit
     * @param int $id
     * @return array()
     */
    public function edit_post($id)
    {
        $get_data = $this->db->get_where('os_post', array('id_post' => $id));
        return $get_data->result();
    }

    /**
     * Update data posting
     * @param int $id
     * @return void
     */
    public function update_post($id)
    {
        $input  = $this->common_data();
        $data   = $this->insert_value();
        if(empty($input['judul']))
        {
            $data['status_post'] = "draft";
            $data['judul_post'] = "Tanpa Judul";
        }
        else
        {
            $data['status_post'] = $this->input->post('status-post');
        }
        $data['visibilitas_post'] = $input['visibilitas'];
        $data['permalink'] = $this->validate_permalink($input['permalink'], 'edit');
        $this->db->where('id_post', $id);
        $this->db->update('os_post', $data);
        $this->update_category($id);
        $this->insert_tag();
    }

    /**
     * Publish draft
     * @param int $id
     * @return void
     */
    public function publish_draft($id)
    {
        $input  = $this->common_data();
        $data   = $this->insert_value();
        if($judul === '')
        {
            $judul     = "Tanpa Judul";
            $status    = "draft";
        }
        $data['status_post']    = "publik";
        $data['tanggal_post']   = $input['tanggal'];
        $data['permalink'] = $this->validate_permalink($input['permalink'], 'edit');
        $this->db->where('id_post', $id);
        $this->db->update('os_post', $data);
        $this->update_category($id);
        $this->insert_tag();
    }

    /**
     * Update kategori
     *
     * @param int $id
     * @return void
     */
    protected function update_category($id)
    {
        $this->db->delete('os_kategori_post', ['id_post' => $id]);
        $this->insert_category($id);
    }

    /**
     * Fungsi untuk menyimpan kategori post
     *
     * @param int $id
     * @return void
     */
    protected function insert_category($id)
    {
        $value = $this->input->post('kategori');
        $kat_array = explode(",", $value);
        for($i = 0; $i < sizeof($kat_array); $i++)
        {
            $data = [
                'id_post'       => $id,
                'id_kategori'   => $kat_array[$i]
            ];
            $this->db->insert('os_kategori_post', $data);
        }
    }

    /**
     * Tambah tag ke dalam tabel os_tag
     * jika tag yang diinput belum ada
     *
     * @return void
     */
    public function insert_tag()
    {
        $tag_name = $this->input->post('tag-name');
        $tag_slug = $this->input->post('tag-slug');
        $name_array = explode(", ", $tag_name);
        $slug_array = explode(", ", $tag_slug);
        for($i = 0; $i < sizeof($name_array); $i++)
        {
            if(! $this->tag_exists($slug_array[$i]))
            {
                $data = [
                    'nama_tag'  => $name_array[$i],
                    'slug_tag'  => $slug_array[$i]
                ];
                $this->db->insert('os_tag', $data);
            }
        }
    }

    /**
     * Mengecek apakah tag sudah ada atau belum
     *
     * @oaram string $slug
     * @return bool
     */
    protected function tag_exists($slug)
    {
        $get = $this->db->get_where('os_tag', ['slug_tag' => $slug]);
        if($get->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Fungsi ini digunakan untuk memvalidasi permalink yang diinput oleh user
     * Jika terdapat permalink yang sama dengan permalink yang sudah ada,
     * misalnya "budak", maka secara otomatis sistem akan menambahkan inisial
     * angka di belakangnya menjadi "budak-2" dan seterusnya.
     * Ini digunakan untuk menghindari terjadinya kesamaan antar permalink,
     * karena setiap permalink adalah "Unique Title" sehingga harus berbeda satu sama lain
     *
     * @param string $link
     * @param string $event
     * @return string
     */
    protected function validate_permalink($link, $event)
    {
        $event === 'add' ? $start = 0 : $start = 1;
        $param = "permalink REGEXP '" . $link . "-[0-9]$' OR permalink='" . $link . "'";
        $query = $this->db->select('permalink')->from('os_post')
            ->where($param)->order_by('permalink', 'DESC')->offset($start)->get();
        $valid_link = "";
        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
            if(in_assoc_array($link, $data))
            {
                $exist_link = array_values($data);
                $last_item  = $exist_link[0]['permalink'];
                $value_arr  = explode("-", $last_item);
                $init_char  = $value_arr[count($value_arr) - 1];

                if(preg_match('/[0-9]/', $init_char) === 1)
                {
                    $init_char = intval($init_char + 1);
                    $len = count($value_arr) - 1;
                    for($i = 0; $i < $len; $i++)
                    {
                        $valid_link .= $value_arr[$i] . "-";
                    }
                    $valid_link .= $init_char;
                }
                else
                {
                    $valid_link = $link . "-2";
                }
            }
        }
        else
        {
            $valid_link = $link;
        }

        return $valid_link;
    }

    /**
     * Hapus post...
     * @param int $id
     * @return void
     */
    public function delete_post($id)
    {
        $this->db->delete('os_post', ['id_post' => $id]);
        $this->db->delete('os_kategori_post', ['id_post' => $id]);
    }

    /**
     * Fungsi untuk mengecek apakah kategori
     * yang ada pada list checkbox merupakan kategori yang ada di
     * tabel os_kategori_post atau bukan
     *
     * @param int $post
     * @param int $kategori     *
     * @return bool
     */
    public function is_post_category($post, $kategori)
    {
        $clause = [
            'id_post'       => $post,
            'id_kategori'   => $kategori
        ];
        $get = $this->db->get_where('os_kategori_post', $clause);
        if($get->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

}
