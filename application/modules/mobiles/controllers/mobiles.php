<?php if(! defined('BASEPATH')) exit('No script access allowed');

class Mobiles extends MX_Controller {

    /**
     * Construct where can declare all the files will
     * be used in all the class
     **/
    public function __construct(){
        parent::__construct();
        $this->load->model('Mobile', '', TRUE);
        $this->load->helper(array('mobiles'));
    }

  /*
   * metodo para obtener el json de las categorias.
   * autor: jalomo <jalomo@hotmail.es>
  */
  public function get_categorias(){
  	$res=$this->Mobile->get_categorias();
  	echo $res;

  }
	

  /*
   * metodo para obtener los tutoriales de una categoria en espesifico.
   *  autor: jalomo <jalomo@hotmail.es>
  */	
  public function get_tutorial_categoria($id=null){
  	if(isset($id)){
  		$res=$this->Mobile->get_tuto_id_categoria($id);
  		echo json_encode($res);
  	}else{
  		echo 0;
  	}
  }

  /*
   * metodo para mostrar los tutoriales de una cadena string.
   * ejemlo:  12,30,51,10
  */
  public function get_tutos(){

  	$cadena = $this->input->post('cadena');
  	if(isset($cadena)){
  		$res=$this->Mobile->get_tutoriales($cadena);
  		echo $res;
  	}else{
  		echo 0;
  	}
  }

  /*
   * metodo para la busquda de tutoriles por medio de palabras claves
  */
  public function buscar_tuto(){
    /*$cadena = $this->input->post('palabras');
    $aux=trim($cadena);
    if($aux!=''){
      $res=$this->Mobile->get_tutoriales('29,30,32');
      echo $res;
    }else{
      echo '[{"tutoriald":"0","tutorialNombre":"0","tutorialLink":"0","tutorialImage":"0","tutoriaIdCategoria":"0"}]';
    }*/
    $res=$this->Mobile->like_palabra('o');
    echo json_encode($res);
  }	
	
}
