<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Countries_model extends CI_Model
{
    public function get_all_country()
    {
        $this->db->order_by('country_name', 'asc');
        $query = $this->db->get('countries');
        return $query->result();
    }

    public function add_country($new_country_data)
    {
        $this->db->insert('countries', $new_country_data);
    }

    public function delete_country($country_id)
    {
        $this->db->where('id', $country_id);
        $this->db->delete('countries');
    }

    public function update_country($country_id, $new_country_data)
    {
        $this->db->where('id', $country_id);
        $this->db->update('countries', $new_country_data);
    }
}