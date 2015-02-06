<link href="<?php echo base_url();?>statics/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript">

$(document).ready(function(){
     $("#options_agenda").show();

   $(".eliminar").click(function(event){
        event.preventDefault();
        $.confirm({
                    'title'     : 'Delete tutorial',
                    'message'   : 'Desea eliminar el tutorial seleccionado?',
                    'buttons'   : {
                                    'Eliminar' : {
                                        'class' : 'blue',
                                        'action': function(){
                                            id = $(event.currentTarget).attr('flag');
                                            url = $("#delete"+id).attr('href');
                                            $("#eliminar"+id).slideUp();
                                            $.get(url);
                                        }
                                    },
                                    'Cancelar' : {
                                        'class' : 'gray',
                                        'action': function(){} //do nothing
                                    }
                                  }
                  });
    });

});    


function exito(responseText)
{
    
    $("#successMessage").fadeIn(1500);
    $("#successMessage").fadeOut(3500);

   
}
</script>
<div id="files_bodys">
    <div id="container">
        <div class="color_font_two margin_top_one margin_left_one">
            <div class="border_bottom_title">
                <span class="font_size_title_section">
                    TUTORIAL LIST
                </span>
            </div>
        </div>
    </div>
    <div id="content_admin">
        <div class="ocultar font_message_error font_color_two" id="errorMessage"></div>
        <div class="ocultar font_message_success font_color_three" id="successMessage">
            Tus datos han sido guardados exitosamente.
        </div>

                <div class="container" style="padding-top: 1em;">
                  <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($tutoriales!=0):?>
                    <?php foreach($tutoriales as $tutorial):?>
                    <tr id="eliminar<?php echo $tutorial->tutoriald; ?>">
                      <td>
                        <?php echo img(array('src'=>$tutorial->tutorialImage,
                                    'width'=>'50px',
                                    'height'=>'50px'))?></td>
                      <td>
                        <?php echo $tutorial->tutorialNombre;?>
                      </td>
                      <td>
                        <?php echo $this->Company->get_name_tuto($tutorial->tutoriaIdCategoria);?>
                      </td>
                      <td>

                          <?php echo anchor('companies/edit_tutorial/'.$tutorial->tutoriald,
                                                 'edit',
                                                  array('id'=>'edit'.$tutorial->tutoriald, 'class'=>' no_text_decoration btn btn-primary', 'flag'=>$tutorial->tutoriald)); ?>

                          <?php echo anchor('companies/delete_tutorial/'.$tutorial->tutoriald,
                                                 'delete',
                                                  array('id'=>'delete'.$tutorial->tutoriald, 'class'=>'eliminar no_text_decoration btn btn-danger', 'flag'=>$tutorial->tutoriald)); ?>

                        
                    </tr>
                  <?php endforeach;?>
                <?php endif;?>
                    
                  </tbody>
                  </table>
                </div>



    </div>
</div>
