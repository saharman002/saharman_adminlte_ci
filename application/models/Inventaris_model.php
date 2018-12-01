<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Inventaris_model extends CI_Model
{
    public $table = 'data_inventaris';
    public $id = 'id_inv';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by('merek DESC');
        return $this->db->get($this->table)->result();
    }
    


}
