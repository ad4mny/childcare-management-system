<?php

class PaymentModel extends CI_Model
{
    public function getPaymentListModel()
    {
        $this->db->select('*');
        $this->db->from('payments');
        $this->db->join('childrens', 'childrens.childrenid = payments.childid');
        $this->db->where('payments.parentid', $_SESSION['userid']);
        $this->db->order_by('date', 'DESC');
        return $this->db->get()->result_array();
    }
}
