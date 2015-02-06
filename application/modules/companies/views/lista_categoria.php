<link href="<?php echo base_url();?>statics/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript">

$(document).ready(function(){
     $("#options_producto").show();

   $(".eliminar").click(function(event){
        event.preventDefault();
        $.confirm({
                    'title'     : 'Delete category',
                    'message'   : 'Desea eliminar la categoria seleccionada?',
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
                    CATEGORY LIST
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
                      <th>Name in English</th>
                      <th>Name in Spanish</th>
                      
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($categorias!=0):?>
                    <?php foreach($categorias as $categoria):?>
                    <tr id="eliminar<?php echo $categoria->categoriaId; ?>">
                      <td>
                        <?php echo img(array('src'=>$categoria->categoriaImagen,
                                    'width'=>'50px',
                                    'height'=>'50px'))?></td>
                      <td>
                        <?php echo $categoria->categoriaNombreEspanol;?>
                      </td>
                      <td>
                        <?php echo $categoria->categoriaNombreIngles;?>
                      </td>
                      <td>

                          <?php echo anchor('companies/delete_categoria/'.$categoria->categoriaId,
                                                 'delete',
                                                  array('id'=>'delete'.$categoria->categoriaId, 'class'=>'eliminar no_text_decoration btn btn-danger', 'flag'=>$categoria->categoriaId)); ?>

                        
                    </tr>
                  <?php endforeach;?>
                <?php endif;?>
                    
                  </tbody>
                  </table>
                </div>



    </div>
</div>
