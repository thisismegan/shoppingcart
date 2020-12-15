<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kurir_model extends MY_Model
{

    public function getDefaultValues()
    {
        return [
            'id' => '',
            'kurir' => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            'field' => 'kurir',
            'label' => 'Nama Kurir',
            'rules' => 'trim|required'

        ];

        return $validationRules;
    }
}

/* End of file Kurir_model.php */
