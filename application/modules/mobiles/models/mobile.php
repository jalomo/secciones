<?php
/**
 
 **/
class Mobile extends CI_Model {

    /**
     
     **/
    public function __construct(){
        parent::__construct();
    }
	
	/*
	* metodo para obtener volcado de las categorias.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_categorias(){

		$query=$this->db->get('categorias');
		if($query->num_rows()>0){

			 $resultado=$query->result();
				
				$response=array();
				foreach($resultado as $pregunta):
					$res=array();
					$res['categoriaId']=$pregunta->categoriaId;
					$res['categoriaNombreIngles']=$pregunta->categoriaNombreIngles;
					$res['categoriaNombreEspanol']=$pregunta->categoriaNombreEspanol;
					$res['categoriaImagen']=$pregunta->categoriaImagen;
					$res['categoriaNumero']=51;
					array_push($response, $res);
					
				endforeach;
				return json_encode($response);
			
		}else{
			return 0;
		}
	}

	/*
	* metodo para obtener los tutoriales de una categoria.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_tuto_id_categoria($id_categoria){
		$this->db->where('tutoriaIdCategoria',$id_categoria);
		$query=$this->db->get('tutoriales');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;
		}
	}

	/*
	* metodo para retornas los tutoriales de una cadena de ids .
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_tutoriales($cadena){

		
		   $response=array();
			//$cadena='30,10,20,60';
		  	$aux=explode(',', $cadena);

		  	foreach($aux as $value=>$valor):
		  		
		  	$res=array();
		  	$pregunta=$this->get_tutorial_id($valor);
			$res['tutoriald']=$pregunta->tutoriald;
			$res['tutorialNombre']=$pregunta->tutorialNombre;
			$res['tutorialLink']=$pregunta->tutorialLink;
			$res['tutorialImage']=$pregunta->tutorialImage;
			$res['tutoriaIdCategoria']=$pregunta->tutoriaIdCategoria;
			array_push($response, $res);

		  	endforeach;
  

			
		

		return json_encode($response);
	}

	/*
	* metodo para obtener un tutorial por medio de su id.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_tutorial_id($id_tuto){
		$this->db->where('tutoriald',$id_tuto);
		$query=$this->db->get('tutoriales');
		if($query->num_rows()>0){
			
			return $query->row();
		}else{
			return 0;
		}
	}

	/*
	* metodo para buscar una palabra de la tabla palabras
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function like_palabra($palabra){
		$this->db->select('palabraIdTutorial');
		$this->db->like('palabraTexto', $palabra); 
		$query=$this->db->get('palabras');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;
		}
	}

	
}
