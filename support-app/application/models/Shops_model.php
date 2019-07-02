<?php
/**
 * Created by PhpStorm.
 * User: kamran
 * Date: 5/1/18
 * Time: 20:14
 */

class Shops_model extends CI_Model
{
    public function get_all_shop()
    {
        $this->db->order_by('shop_name', 'asc');
        $query = $this->db->get('shops');
        return $query->result();
    }

    public function add_shop($new_shop_data)
    {
        $this->db->insert('shops', $new_shop_data);
    }

    public function delete_shop($shop_id)
    {
        $this->db->where('id', $shop_id);
        $this->db->delete('shops');
    }

    public function update_shop($shop_id, $new_shop_data)
    {
        $this->db->where('id', $shop_id);
        $this->db->update('shops', $new_shop_data);
    }
}