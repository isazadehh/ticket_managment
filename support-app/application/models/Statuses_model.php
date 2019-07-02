<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statuses_model extends CI_Model
{
    public function get_all_status()
    {
        $this->db->order_by('status_name', 'asc');
        $query = $this->db->get('statuses');
        return $query->result();
    }

    public function add_status($new_status_data)
    {
        $this->db->insert('statuses', $new_status_data);
    }

    public function delete_status($status_id)
    {
        $this->db->where('id', $status_id);
        $this->db->delete('statuses');
    }

    public function update_status($status_id, $new_status_data)
    {
        $this->db->where('id', $status_id);
        $this->db->update('statuses', $new_status_data);
    }
}