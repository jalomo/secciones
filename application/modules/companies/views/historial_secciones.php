<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Sortable - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script src="<?php echo base_url();?>statics/css/bootstrap/js/bootstrap.js"></script>
  <script src="<?php echo base_url();?>statics/js/libraries/form.js"></script>
  <link href="<?php echo base_url();?>statics/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
  </style>
  <script>
  $(function() {
     $( ".sortable" ).sortable({

          update: function(event, ui) {
              $(".ajax-loader").show();
                  var orden = $(this).sortable('toArray').toString();
                  $.ajax({
                      url: '<?php echo base_url();?>index.php/companies/ordena_categoria',
                      data: {"data": orden},
                      type: 'post'
                  }).done(function(data) {
              });
              $(".ajax-loader").hide();
          }
      });
   // $( ".sortable" ).disableSelection();

    
   $("#form_seccion").submit(function(){
        var band = 0;

        if($("#seccionNombre").val() == ''){
            $("#seccionNombre").css('border', '1px solid #FF0000');
            band++;
        }
        else{
            $("#seccionNombre").css('border', '1px solid #ADA9A5');
        }

        if(band != 0)
        {
            $("#errorMessage").text("Por favor, verifique los campos marcados.").show();
            return false;
        }
        else{
            $("#errorMessage").hide();
            var opt = {
                success : newSeccion
            }
            $(this).ajaxSubmit(opt);
            return false;
        }
    });
   
   
  });

function newSeccion(){
  location.reload();  
}

    $(document).on("click", ".edita_seccion", function(e) {
    //   console.log("inside";   <-- here it is
         id = $(e.currentTarget).attr('id');
         $(this).addClass("glyphicon-floppy-disk");
         $(this).addClass("save_seccion");

           //$(this).removeClass("edita_seccion");
         $(this).removeClass('edita_seccion');
         $(this).removeClass("glyphicon-edit");
          texto=$('#s-'+id).text();
           $('#s-'+id).empty();
           $('#s-'+id).html('<input type="text" value="'+texto+'" id="t-'+id+'"/>');

          
           
     });

    $(document).on("click", ".save_seccion", function(e) {
    //   console.log("inside";   <-- here it is
         id = $(e.currentTarget).attr('id');
         $(this).removeClass("glyphicon-floppy-disk");
         $(this).removeClass("save_seccion");

           //$(this).removeClass("edita_seccion");
         $(this).addClass('edita_seccion');
         $(this).addClass("glyphicon-edit");
          texto=$('#t-'+id).val();
           $('#s-'+id).empty();
           $('#s-'+id).append(texto);
           
         
          html_response = $.ajax({
                      url : '<?php echo base_url();?>index.php/companies/modifica_seccion',
                      data : {id:id,texto:texto},
                      type: "POST",
                      dataType: "html",
                      async: false,
                      success: function(data){
                        
                      }
                      }).responseText;
           
     });


    $(document).on("click", ".add_campo", function(e) {
    //   console.log("inside";   <-- here it is
         id = $(e.currentTarget).attr('id');
         $(".campo_id").val(id);
           
     });

  </script>
</head>
<body>
 

  

<div align="center">
  <span class="glyphicon glyphicon-list " data-toggle="modal" data-target="#myModal"></span>
</div>

<div id="load_proyectos" class="sortable" align="center" style=" display: block; bottom: 0px; top: 350px; height:200px; width:900px; margin-left:200px;">
    <?php if($categorias!=0):?>
       <?php foreach($categorias as $categoria):?>
        
            <div id="elemento-<?php echo $categoria->seccionId; ?>" class="ui-state-default">
              
                <div class="panel panel-default">
                <div class="panel-heading">
                  
                    <span class="glyphicon glyphicon-edit edita_seccion" id="<?php echo $categoria->seccionId;?>"></span>
                   
                  
                  <h3 class="panel-title" id="s-<?php echo $categoria->seccionId;?>"><?php echo $categoria->seccionNombre;?></h3>
                </div>
                <div class="panel-body">

                   <span data-toggle="modal" data-target="#myCampo" class="glyphicon glyphicon-plus-sign add_campo" id="<?php echo $categoria->seccionId;?>"></span>
                  Contenido de los campos
                  
                </div>
              </div>

          </div>

      <?php endforeach;?>  
      <?php endif;?>  
     
   </div> 


 

<!-- Modal seccion -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <?php echo form_open_multipart('companies/save_seccion', array('id'=>'form_seccion','role'=>'form')); ?>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Crear nueva seccion</h4>
          </div>
          <div class="modal-body">
             <input type="text" class="form-control" id="" placeholder="Nombre de la seccion" name="save[seccionNombre]" id="seccionNombre"/>
          </div>
          <input type="hidden"  name="save[seccionClienteId]" value="1"/>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        <?php echo form_close(); ?>  
    </div>
  </div>
</div>


<!-- Modal campo -->
<div class="modal fade" id="myCampo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <?php echo form_open_multipart('companies/save_campo', array('id'=>'form_campo','role'=>'form')); ?>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Crear nuevo campo</h4>
          </div>
          <div class="modal-body">
             <input type="text" class="form-control" id="" placeholder="Nombre de la seccion" name="campo[campoNombre]" id="campoNombre"/>
             <input type="text" class="campo_id" name="campo[campoSeccionId]"/>
             <input type="text" class="" name="campo[campoClienteId]" value="1"/>
          </div>
          <input type="hidden"  name="save[seccionClienteId]" value="1"/>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        <?php echo form_close(); ?>  
    </div>
  </div>
</div>
 
</body>
</html>