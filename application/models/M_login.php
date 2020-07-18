<?

class M_login extends CI_Model{

	function cek_login($where){
		return $thus->db->get_where('users',$where);
	}
}
?>