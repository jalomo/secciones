<?php
/**

 **/
class Company extends CI_Model{

    /**

     **/
    public function __construct()
    {
        parent::__construct();
    }
	
	/*
	* metodo para guardar en una tabla.
	* $table=nombre de la tabla
	* $data= campos ej: $data['nombre']
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_register($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
	
	/*
	* metodo para obtener datos de una tabla.
	* table= nombre de la tabla
	* $d_table= nombre del campo 
	* $id= id de busqueda
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_datos_result($table, $id_table, $id){
		$this->db->where($id_table,$id);
		$query=$this->db->get($table);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;
		}
	}

	/*
	* metodo para obtener datos de una tabla.
	* table= nombre de la tabla
	* $d_table= nombre del campo 
	* $id= id de busqueda
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_datos_row($table, $id_table, $id){
		$this->db->where($id_table,$id);
		$query=$this->db->get($table);
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return 0;
		}
	}
	
	/*
	* metodo para obtener las secciones.
	* autor: jalomo <jalomo@hotmailes>
	*/
	public function get_categorias($id_cliente){

		$query=$this->db->query(" SELECT *
        FROM secciones
		where seccionClienteId=$id_cliente
        ORDER BY seccionLugar ASC
		
		");
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;	
		}	
	}

	/*
	* metodo para ordenar las categorias.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function reordenar($id, $orden) {

     $query=$this->db->query("UPDATE secciones
        SET  	seccionLugar = $orden
        WHERE seccionId = $id");		
		
 
    if ($query) return true;
    return false;
	}


	/*
	* metodo para modificar una seccion
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function update_seccion_nombre($data, $id){
        $this->db->update('seccion', $data, array('seccionId'=>$id));
    }


	/*
	*Metodo para guardar la informacion
	* del registro del administrador
	*autor jalomo <jalomo@hotmail.es>
	*/
	public function save_admin($data){
		$this->db->insert('admin', $data);
        return $this->db->insert_id();
	}

	/*
	* 
	*/
	public function count_results_users($user, $pass)
    {
        $this->db->where('adminUsername', $user);
        $this->db->where('adminPassword', $pass);
        $total = $this->db->count_all_results('admin');
        return $total;
    }
	
	/*
	*
	*/
	public function get_all_data_users_specific($username, $pass)
    {
        $this->db->where('adminUsername', $username);
        $this->db->where('adminPassword', $pass);
        $data = $this->db->get('admin');
        return $data->row();
    }
	

}
