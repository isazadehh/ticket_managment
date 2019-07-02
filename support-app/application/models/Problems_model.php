<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Problems_model extends CI_Model
{
    public function get_all_problem()
    {
//        $this->db->order_by('problem_name', 'asc');
//        $query = $this->db->get('problems');
        $sql = "select problem.*, status.color, status.status from problems as problem left join processes as status on problem.process_id = status.id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function add_problem($new_problem_data)
    {
        $this->db->insert('problems', $new_problem_data);
    }

    public function delete_problem($problem_id)
    {
        $this->db->where('id', $problem_id);
        $this->db->delete('problems');
    }

    public function update_problem($problem_id, $new_problem_data)
    {
        $this->db->where('id', $problem_id);
        $this->db->update('problems', $new_problem_data);
    }
}