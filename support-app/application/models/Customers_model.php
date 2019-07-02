<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_model extends CI_Model
{
    public function get_all_customers()
    {
//        $query = $this->db->join('modules','modules.id = customers.module_id')->join('countries','countries.id = customers.country_id')->join('statuses','statuses.id = customers.status_id')->join('problems','problems.id = customers.problem_id')->get('customers')->result();
        $sql = "SELECT
                    customer.id,
                    customer.order_id,
                    module.`code`,
                    module.`module_name`,
                    module_version.`module_version`,
                    country.`country_name`,
                    statuss.`status_name`,
                    problem.`id` as problem_id,
                    problem.`problem_name`,
                    process.`status`,
                    process.`color`,
                    source_shop.`code` as source_shop_code,
                    source_shop.`shop_name` as source_shop_name,
                    source_shop_version.`shop_version` as source_shop_version,
                    target_shop.`code` as target_shop_code,
                    target_shop.`shop_name` as target_shop_name,
                    target_shop_version.`shop_version` as target_shop_version
                FROM
                    customers AS customer
                LEFT JOIN modules AS module
                ON
                    customer.`module_id` = module.`id`
                LEFT JOIN modules_versions AS module_version
                ON
                    customer.module_versions_id = module_version.`id`
                LEFT JOIN countries AS country
                ON
                    customer.`country_id` = country.`id`
                LEFT JOIN statuses AS statuss
                ON
                    customer.`status_id` = statuss.`id`
                LEFT JOIN problems AS problem
                ON
                    customer.`problem_id` = problem.`id`
                LEFT JOIN processes AS process
                ON
                    customer.`process_id` = process.`id`
                LEFT JOIN shops AS source_shop
                ON
                    customer.`source_shop_id` = source_shop.`id`
                LEFT JOIN shops AS target_shop
                ON
                    customer.`target_shop_id` = target_shop.`id`
                LEFT JOIN shops_versions AS source_shop_version
                ON
                    customer.`source_shop_version_id` = source_shop_version.`id`
                LEFT JOIN shops_versions AS target_shop_version
                ON
                    customer.`target_shop_version_id` = target_shop_version.`id`";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_one_ticket($ticket_id){
        $sql = "SELECT
                    customer.id,
                    customer.order_id,
                    module.`code`,
                    module.`module_name`,
                    module_version.`module_version`,
                    country.`country_name`,
                    statuss.`status_name`,
                    problem.`problem_name`,
                    process.`status`,
                    process.`color`,
                    source_shop.`code` as source_shop_code,
                    source_shop.`shop_name` as source_shop_name,
                    source_shop_version.`shop_version` as source_shop_version,
                    target_shop.`code` as target_shop_code,
                    target_shop.`shop_name` as target_shop_name,
                    target_shop_version.`shop_version` as target_shop_version
                FROM
                    customers AS customer
                LEFT JOIN modules AS module
                ON
                    customer.`module_id` = module.`id`
                LEFT JOIN modules_versions AS module_version
                ON
                    customer.module_versions_id = module_version.`id`
                LEFT JOIN countries AS country
                ON
                    customer.`country_id` = country.`id`
                LEFT JOIN statuses AS statuss
                ON
                    customer.`status_id` = statuss.`id`
                LEFT JOIN problems AS problem
                ON
                    customer.`problem_id` = problem.`id`
                LEFT JOIN processes AS process
                ON
                    customer.`process_id` = process.`id`
                LEFT JOIN shops AS source_shop
                ON
                    customer.`source_shop_id` = source_shop.`id`
                LEFT JOIN shops AS target_shop
                ON
                    customer.`target_shop_id` = target_shop.`id`
                LEFT JOIN shops_versions AS source_shop_version
                ON
                    customer.`source_shop_version_id` = source_shop_version.`id`
                LEFT JOIN shops_versions AS target_shop_version
                ON
                    customer.`target_shop_version_id` = target_shop_version.`id`
                WHERE customer.id = {$ticket_id}";
        $query = $this->db->query($sql);
        return $query->result();
    }


    public function get_one_ticket_issue($ticket_id){
        $sql = "SELECT
                    customer_problem.*,
                    customer.order_id,
                    problem.problem_name
                FROM
                    customer_problem AS customer_problem
                INNER JOIN customers AS customer
                ON
                    customer.id = customer_problem.customer_id
                INNER JOIN problems AS problem
                ON
                    problem.id = customer_problem.problem_id
                WHERE customer_problem.customer_id = {$ticket_id}";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_last_added_ticket_issue($ticket_id){
        $sql = "SELECT
                    customer_problem.*,
                    customer.order_id,
                    problem.problem_name
                FROM
                    customer_problem AS customer_problem
                INNER JOIN customers AS customer
                ON
                    customer.id = customer_problem.customer_id
                INNER JOIN problems AS problem
                ON
                    problem.id = customer_problem.problem_id
                WHERE customer_problem.customer_id = {$ticket_id}
                ORDER BY customer_problem.id DESC LIMIT 1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_module_version($module_id)
    {
        $this->db->select('module_version');
        $this->db->from('modules_versions');
        $this->db->where('module_id',$module_id);
        return $query=$this->db->get();
    }

    public function get_shop_version($shop_id)
    {
        $this->db->select('shop_version');
        $this->db->from('shops_versions');
        $this->db->where('shop_id',$shop_id);
        return $query=$this->db->get();
    }

    public function add_customer($new_ticket_data)
    {
        $this->db->insert('customers', $new_ticket_data);
    }

    public function delete_customer($ticket_id)
    {
        $this->db->where('id', $ticket_id);
        $this->db->delete('customers');
    }

    public function get_one_customer_for_update($customer_id)
    {

    }

    public function update_customer($customer_id)
    {

    }
}