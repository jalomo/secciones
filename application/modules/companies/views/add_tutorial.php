<link href="<?php echo base_url();?>statics/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<link href="<?php echo base_url();?>statics/css/tag/bootstrap-tag-cloud.css" rel="stylesheet">
<script src="<?php echo base_url();?>statics/css/tag/bootstrap-tag-cloud.js"></script>

<script type="text/javascript">

$(document).ready(function(){
     $("#options_agenda").show();

    $("#save_cat").submit(function(){
        var band = 0;

        if($("#tutorialNombre").val() == ''){
            $("#tutorialNombre").css('border', '1px solid #FF0000');
            band++;
        }
        else{
            $("#tutorialNombre").css('border', '1px solid #ADA9A5');
        }

         if($("#tutorialLink").val() == ''){
            $("#tutorialLink").css('border', '1px solid #FF0000');
            band++;
        }
        else{
            $("#tutorialLink").css('border', '1px solid #ADA9A5');
        }

         if($("#image").val() == ''){
            $("#image").css('border', '1px solid #FF0000');
            band++;
        }
        else{
            $("#image").css('border', '1px solid #ADA9A5');
        }

        if(band != 0)
        {
            $("#errorMessage").text("Por favor, verifique los campos marcados.").show();
            return false;
        }
        else{
            $("#errorMessage").hide();
            var opt = {
                success : exito
            }
            $(this).ajaxSubmit(opt);
            return false;
        }
    });

/*
* metodo para agragar un intput text para agregar una palabra.
* autor: jalomo <jalomo@hotmail.es>
*/
$("#add_palabra").click(function(event){
        event.preventDefault();
        
        sum=$("#suma").val();
        $("#suma").val(parseInt(sum) +1);
        total = $("#suma").val();
        $('.load_input').append('<input type="text" class="form-control" style="width:100px;" placeholder="word" name="palabra'+total+'"/> ');
        
    });

});    


function exito(responseText)
{
    
    $("#successMessage").fadeIn(1500);
    $("#successMessage").fadeOut(3500);

   
}
</script>

<div id="files_bodys">
    <!--div id="container">
        <div class="color_font_two margin_top_one margin_left_one">
            <div class="border_bottom_title">
                <span class="font_size_title_section">
                    CREATE CATEGORY
                </span>
            </div>
        </div>
    </div-->
    <div id="content_admin">
        <div class="ocultar font_message_error font_color_two" id="errorMessage"></div>
        <div class="ocultar font_message_success font_color_three" id="successMessage">
            Tus datos han sido guardados exitosamente.
        </div>


        <div class="panel panel-default">
  		<div class="panel-heading" align="center"><h4> ADD TUTORIAL</h4></div>
  		<div class="panel-body">

        <?php echo form_open_multipart('companies/save_tutorial', array('id'=>'save_cat','role'=>'form')); ?>
            

            <div class="form-group">
                <label for="">Category:</label>
                
                <select name="save[tutoriaIdCategoria]" id="tutoriaIdCategoria" class="form-control">
                    <?php foreach($categorias as $categoria):?>
                    <option value="<?php echo $categoria->categoriaId;?>"><?php echo $categoria->categoriaNombreIngles;?></option>
                    <?php endforeach?>
                </select>
              </div>

             <div class="form-group">
			    <label for="">Name:</label>
			    <input type="text" class="form-control"  placeholder="Name in Spanish" name="save[tutorialNombre]" id="tutorialNombre">
			  </div>

			  <div class="form-group">
			    <label for="">Link:</label>
			    <input type="text" class="form-control"  placeholder="http://www.example.com/tutorial_example" name="save[tutorialLink]" id="tutorialLink">
			  </div>

			  <div class="form-group">
			    <label for="ejemplo_archivo_1">Image</label>
			    <input type="file"  name="image" id="image">
			    <p class="alert alert-warning">image size must be 400px x  200px</p>
			  </div>



               <div class="form-group">
                <label for="ejemplo_archivo_1">Words</label>

                <span class="glyphicon glyphicon-plus" id="add_palabra" style="cursor:pointer"></span>

                <input type="text" class="form-control" style="width:100px;" placeholder="word" name="palabra1"/> 

                <div class="load_input"></div>
                <p class="alert alert-warning">keywords to search the tutorial</p>
              </div>
			  
              <input type="hidden"  id="suma" value="1" name="suma"/>
			  
			  <button type="submit" class="btn btn-primary">Save</button>
      
        <?php echo form_close(); ?>


        </div>
		</div>


    </div>
</div>
