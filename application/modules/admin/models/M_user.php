<?php if(!defined('BASEPATH')) exit('No script allowed access');

class M_user extends CI_Model{
	function get_user_info($username) {
        $sql = "SELECT 
                a.*, 
                b.BU_SHORT_NAME, b.image AS BU_IMAGE, b.HAVE_CHANNEL,
                c.DEPARTEMENT_NAME, c.DEPT_NAME, d.SECTION_NAME  
                FROM tbl_user a 
                LEFT JOIN tbl_bu b ON a.id_bu = b.id_bu 
                LEFT JOIN tbl_user_department c ON a.ID_DEPARTEMENT = c.ID_DEPARTEMENT
                LEFT JOIN tbl_user_section d ON a.ID_SECTION = d.ID_SECTION
                WHERE a.USER_ID = ?  ";
        $query = $this->db->query($sql, array($username));
        return ($query->num_rows()>0) ? $query->row() : false;
    }

    function login($username){
        $sql = "SELECT 
                a.*, 
                b.BU_SHORT_NAME, b.image AS BU_IMAGE, b.HAVE_CHANNEL,
                c.DEPARTEMENT_NAME,c.DEPT_NAME, d.SECTION_NAME  
                FROM tbl_user a 
                LEFT JOIN tbl_bu b ON a.id_bu = b.id_bu 
                LEFT JOIN tbl_user_department c ON a.ID_DEPARTEMENT = c.ID_DEPARTEMENT
                LEFT JOIN tbl_user_section d ON a.ID_SECTION = d.ID_SECTION
                WHERE a.USER_ID ='".$username."'";
        $query = $this->db->query($sql);
        return $query;
    }
}