<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Sortable - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
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

    

   
   
  });

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
           
          respuesta=$.ajax({
                  url : '<?php echo base_url();?>index.php/companies/modifica_seccion',
                  data : {id:id,texto:texto},
                  cache: false,
                  contentType: false,
                  processData : false,
                  type : "POST",
                  async : false
                  }).responseText;
           
     });
  </script>
</head>
<body>
 

  

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
                  Contenido del panel
                  
                </div>
              </div>

          </div>

      <?php endforeach;?>  
      <?php endif;?>  
     
   </div> 


 

 
</body>
</html>