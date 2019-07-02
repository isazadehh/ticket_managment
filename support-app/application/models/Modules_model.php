<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modules_model extends CI_Model
{
    public function get_all_module()
    {
        $this->db->order_by('module_name', 'asc');
        $query = $this->db->get('modules');
        return $query->result();
    }

    public function add_module($new_module_data)
    {
        $this->db->insert('modules', $new_module_data);
    }

    public function delete_module($module_id)
    {
        $this->db->where('id', $module_id);
        $this->db->delete('modules');
    }

    public function update_module($module_id, $new_module_data)
    {
        $this->db->where('id', $module_id);
        $this->db->update('modules', $new_module_data);
    }

}