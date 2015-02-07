<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/**

 **/
class Companies extends MX_Controller {

    /**
     
     **/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Company', '', TRUE);
        $this->load->library(array('session'));
        $this->load->helper(array('form', 'html', 'companies', 'url'));
    }
	
	public function index(){

        $content = $this->load->view('companies/index', '', TRUE);
        $this->load->view('main/template', array('aside'=>'',
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/login.js')));
		
	}
	
	/*
	*metodo para crear usuarios 
	*administradores
	*autor: jalomo <jalomo@hotmail.es>
	*/
	public function crear_admin(){
	
        $this->load->view('companies/registro_admin');
  
	}
	
	/**
     *metodo para guardar el registro del
	 *administrador
     * 
     **/
    public function guarda_admin()
    {
        $post = $this->input->post('Registro');
        if($post)
        {
            $pass = encrypt_password($post['adminUsername'],
                                     $this->config->item('encryption_key'),
                                     $post['adminPassword']);
            $post['adminPassword'] = $pass;
            $post['adminStatus'] = 1;
			$post['adminFecha']=date('Y-m-d');
            $id = $this->Company->save_admin($post);
            echo $id;
        }
        else{
        }
    }
	
	/*
	*metodo para checar el login y la contraseña
	*/
	public function checkDataLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if(isset($username) && isset($password) && !empty($password) && !empty($username))
        {
            $pass = encrypt_password($username,
                                     $this->config->item('encryption_key'),
                                     $password);
            $total = $this->Company->count_results_users($username, $pass);
            if($total == 1)
            {
                echo "1";
            }
            else{
                echo "0";
            }
        }
        else{
            redirect('companies');
        }
    }
	
	/*
	*metodo para inicio de session
	*/
	public function mainView()
    {
        $post = $this->input->post('Login');
        if(isset($post) && !empty($post))
        {
            $pass = encrypt_password($post['adminUsername'],
                                     $this->config->item('encryption_key'),
                                     $post['adminPassword']);
            $dataUser = $this->Company->get_all_data_users_specific($post['adminUsername'], $pass);

            $array_session = array('id'=>$dataUser->adminId);
            $this->session->set_userdata($array_session);

            if($this->session->userdata('id'))
            {
				redirect('companies/historial_secciones');
                /*$aside = $this->load->view('companies/left_menu', '', TRUE);
                $content = $this->load->view('companies/main_view', '', TRUE);
                $this->load->view('main/template', array('aside'=>$aside,
                                                         'content'=>'',
														 'included_js'=>array('statics/js/modules/menu.js')));*/
            }
            else{
            }
        }
        else{
        }
    }
	
	/*
	*metodo donde el usuario crea las 
	*notificaciones.
	*/
	public function historial_secciones(){
	 if($this->session->userdata('id'))
        {	
		
        $data['categorias']=$this->Company->get_categorias(1);
        $content = $this->load->view('companies/historial_secciones', $data);
        
		}
        else{
            redirect('companies');
        }											   
		
	}
	
    /*
    * metodo para ordenar una seccion.
    * autor: jalomo <jalomo@hotmail.es>
    */
    public function ordena_categoria(){
        $post=$this->input->post('data');
        
        if (!empty($post)) {
            $data = $this->input->post('data');
            $orden = 1;
            $array_elementos = explode(',', $data); // separamos por comas y guardamos en un array
            foreach ($array_elementos as $elemento) {
                // recordamos que los elementos se guardaban como "elemento-1", "elemento-2", etc
                $elemento_id = explode('-', $elemento); // en $elemento_id[1] tendríamos la id
                $id = $elemento_id[1];
                $this->Company->reordenar($id, $orden); // reordenamos
                $orden++; // aumentamos 1 al orden
            }
        }
    
    }
	
    /*
    * metodo para modificar el nombre una seccion.
    * autor: jalomo<jalomo@hotmail.es>
    */
    public function modifica_seccion(){
        $texto=$this->input->post('texto');
        echo $texto;
     if($this->session->userdata('id'))
        {   
        
            $id=$this->input->post('id');
            $texto=$this->input->post('texto');
            if($this->input->post('id') && $this->input->post('texto')) {
                $data['seccionNombre']=$texto;
                $this->Company->update_seccion_nombre($data, $id);
            }
            echo $texto;
        
        }
        else{
             echo $texto;
        }                                              
        
    }

    /*
    * metodo para guardar una seccion
    * autor: jalomo <jalomo@hotmail.es>
    */
    public function save_seccion(){
        if($this->session->userdata('id'))
        {   
            $post=$this->input->post('save');
            $this->Company->save_register('secciones', $post);
        } 
    }

    /*
    * metodo para guardar un campo .
    * autor: jalomo <jalomo@hotmail.es>
    */
    public function save_campo(){
        if($this->session->userdata('id'))
        {   
            $post=$this->input->post('save');
            $this->Company->save_register('secciones', $post);
        } 
    }

	
}
