<?php
/**
 * View where can contain all the values of the menu
 * where the user will select the data ti need to for
 * access to the different sections in the platform
 **/
?>
<div id="data_menu" class="">
    <div style="padding-left: 50px; padding-top: 50px;">
        <?php echo anchor('companies/mainView',
                          img(array('src'=>'statics/img/inicio-icono.png',
                                    'width'=>'128px',
                                    'height'=>'128px')),
                           array('id'=>'', 'class'=>'')); ?>
    </div>
    <div id="data_menu_inside" style="background-color: #000000; ">
        <!--div id="notifications">
            <div class="barra_lateral">
                <span class="padding_left_one">
                    <?php echo anchor('#',
                                      'NOTIFICACIONES',
                                      array('id'=>'link_notificaciones', 'class'=>'no_text_decoration font_color_menu')); ?>
                </span>
            </div>
            <div id="options_notifications">
                <div class="margin_top_three">
                    <span class="padding_left_two">
                        <?php echo anchor('companies/crear_nota',
                                          'CREAR NOTIFICACION',
                                           array('id'=>'', 'class'=>'no_text_decoration font_color_menu')); ?>
                    </span>
                </div>
                <div class="separador_menu">&nbsp;</div>
                <div class="margin_bottom_one margin_top_minus_one">
                    <span class="padding_left_two">
                        <?php echo anchor('companies/lista_notas',
                                          'LISTA NOTIFICACION',
                                          array('id'=>'', 'class'=>'no_text_decoration font_color_menu')); ?>
                    </span>
                </div>
            </div>
        </div-->
        
        
         <div id="producto">
            <div class="barra_lateral">
                <span class="padding_left_one">
                 
                    <?php echo anchor('#',
                                      'CATEGORY',
                                      array('id'=>'link_producto', 'class'=>'no_text_decoration font_color_menu')); ?>
                                   
                </span>
            </div>
            <div id="options_producto">
                <div class="margin_top_three">
                    <span class="padding_left_two">
                        <?php echo anchor('companies/create_category',
                                          'CREATE CATEGORY',
                                          array('id'=>'', 'class'=>'no_text_decoration font_color_menu')); ?>
                    </span>
                </div>
                <div class="separador_menu">&nbsp;</div>
                <div class="margin_bottom_one margin_top_minus_one">
                    <span class="padding_left_two">
                        <?php echo anchor('companies/category_list',
                                          'CATEGORY LIST',
                                          array('id'=>'', 'class'=>'no_text_decoration font_color_menu')); ?>
                    </span>
                </div>
            </div>
        </div>
        
      
        
        <div id="agenda">
            <div class="barra_lateral">
                <span class="padding_left_one">
                    <?php echo anchor('#',
                                      'TUTORIALS',
                                      array('id'=>'link_agenda', 'class'=>'no_text_decoration font_color_menu')); ?>
                </span>
            </div>
            <div id="options_agenda">
                <div class="margin_top_three">
                    <span class="padding_left_two">
                        <?php echo anchor('companies/add_tutorial',
                                          'ADD TUTORIAL',
                                          array('id'=>'', 'class'=>'no_text_decoration font_color_menu')); ?>
                    </span>
                </div>
                <div class="separador_menu">&nbsp;</div>
                <div class="margin_bottom_one margin_top_minus_one">
                    <span class="padding_left_two">
                        <?php echo anchor('companies/tutorials_list',
                                          'TUTORIALS LIST',
                                          array('id'=>'', 'class'=>'no_text_decoration font_color_menu')); ?>
                    </span>
                </div>
               
            </div>
        </div>
		
		 <!--div id="albums">
            <div class="barra_lateral">
                <span class="padding_left_one">
                    <?php echo anchor('#',
                                      'SUGERENCIAS',
                                      array('id'=>'link_albums', 'class'=>'no_text_decoration font_color_menu')); ?>
                </span>
            </div>
            <div id="options_albums">
                <div class="margin_top_three">
                    <span class="padding_left_two">
                        <?php echo anchor('companies/crearAlbum',
                                          'SUGERENCIAS',
                                          array('id'=>'', 'class'=>'no_text_decoration font_color_menu')); ?>
                    </span>
                </div>
                
               
            </div>
        </div-->
        
       
        
        
       
        <div id="logout">
            <div class="barra_lateral">
                <span class="padding_left_one">
                    <?php echo anchor('companies/logout',
                                      'CERRAR SESION',
                                      array('id'=>'',
                                            'class'=>'no_text_decoration font_color_menu')); ?>
                </span>
            </div>
        </div>
    </div>
</div>
