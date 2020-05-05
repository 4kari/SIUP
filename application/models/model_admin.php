<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class model_admin extends CI_Model {
	public function getuserdata()
	{
        $query="SELECT u.nama_user, u.username, l.level_user as level, u.gambar
        FROM user u, level l
        where u.level = l.id
        ";
        return $this->db->query($query)->result_array();
    }
}