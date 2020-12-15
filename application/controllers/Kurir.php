<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
        $role = $this->session->userdata('role');

        if ($role != 'admin') {
            redirect(base_url());
            return;
        }
    }


    public function index($page = null)
    {
        $data['title'] = 'Admin: Kurir ';
        $data['content'] = $this->kurir->paginate($page)->get();
        $data['total_rows'] = $this->kurir->count();
        $data['pagination'] = $this->kurir->makePagination(base_url('kurir'), 2, $data['total_rows']);

        $data['page'] = 'pages/kurir/index';

        $this->view($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('kurir'));
        }

        $keyword = $this->session->userdata('keyword');
        $data['title'] = 'Admin: Kurir ';
        $data['content'] = $this->kurir->like('title', $keyword)->paginate($page)->get();
        $data['total_rows'] = $this->kurir->like('title', $keyword)->count();
        $data['pagination'] = $this->kurir->makePagination(base_url('kurir/search'), 3, $data['total_rows']);

        $data['page'] = 'pages/kurir/index';

        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('kurir'));
    }

    public function create()
    {
        if (!$_POST) {
            $input = (object) $this->kurir->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->category->validate()) {

            $data['title'] = 'Tambah Kurir';
            $data['input'] = $input;
            $data['form_action'] = 'kurir/create';
            $data['page'] = 'pages/kurir/form';

            $this->view($data);
            return;
        }

        if ($this->category->create($input)) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi kesalahan suatu kesalahan');
        }

        redirect(base_url('kurir'));
    }

    public function edit($id)
    {
        $data['content'] = $this->kurir->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf, Data tidak ditemukan');
            redirect(base_url('kurir'));
        }

        if (!$_POST) {
            $data['input'] = $data['content'];
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!$this->kurir->validate()) {

            $data['title'] = 'Ubah Kurir';
            $data['form_action'] = "kurir/edit/$id";
            $data['page'] = 'pages/kurir/form';

            $this->view($data);
            return;
        }

        if ($this->category->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data berhasil diperbaharui');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('kurir'));
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('kurir'));
        } else {

            $content = $this->kurir->where('id', $id)->first();

            if (!$content) {
                $this->session->set_flashdata('warning', 'Maaf, Data tidak ditemukan');
                redirect(base_url('kurir'));
            }
            if ($this->kurir->where('id', $id)->delete()) {
                $this->session->set_flashdata('success', 'Data berhasil dihapus');
            } else {
                $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
            }

            redirect(base_url('kurir'));
        }
    }

    public function unique_kurir()
    {
        $kurir   = $this->input->post('kurir');
        $id     = $this->input->post('id');

        $kurir = $this->kurir->where('kurir', $kurir)->first();

        if ($kurir) {
            if ($id == $kurir->id) {
                return true;
            }
            $this->load->library('form_validation');
            $this->form_validation->set_message('unique_kurir', '%s sudah digunakan');
            return false;
        }

        return true;
    }
}
