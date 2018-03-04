<?php
if (!defined('ABSPATH')) {exit('No direct script access allowed');}
ob_start();
?>
    #rockfm_<?php echo $id;?> .rockfm-input2-wrap .rockfm-inp2-opt-label{
        <?php 
        //input
        ?>
        <?php if($input2['size']){?>
            font-size:<?php echo $input2['size'];?>px;
        <?php } ?>
        <?php if(intval($input2['bold'])===1){?>
            font-weight: bold;
        <?php } ?>
        <?php if(intval($input2['italic'])===1){?>
            font-style:italic;
        <?php } ?>
        <?php if(intval($input2['underline'])===1){?>
            text-decoration:underline;
        <?php } ?>
        <?php if(!empty($input2['color'])){?>
            color:<?php echo $input2['color'];?>;
        <?php } ?>
        <?php if(isset($input2['font_st']) && intval($input2['font_st'])===1){?>
        <?php 
            $font_temp=json_decode($input2['font'],true);
            if(isset($font_temp['family'])){
        ?>    
            font-family:<?php echo $font_temp['family'];?>;
            <?php
           //storing to global fonts
            Uiform_Form_Helper::form_store_fonts($font_temp);
            //end storing to global fonts
            ?>
            <?php } ?>
        <?php } ?>
    }
   
   #rockfm_<?php echo $id;?> .rockfm-label{
    <?php
    //label
    ?>
   display:block;
   <?php if($label['size']){?>
            font-size:<?php echo $label['size'];?>px;
        <?php } ?>
        <?php if(intval($label['bold'])===1){?>
            font-weight: bold;
        <?php }else{ ?>
            font-weight: normal;
        <?php }?>    
        <?php if(intval($label['italic'])===1){?>
            font-style:italic;
        <?php } ?>
        <?php if(intval($label['underline'])===1){?>
            text-decoration:underline;
        <?php } ?>
        <?php if(!empty($label['color'])){?>
            color:<?php echo $label['color'];?>;
        <?php } ?>
        <?php if(isset($label['font_st']) && intval($label['font_st'])===1){?>
        <?php 
            $font_temp=json_decode($label['font'],true);
            if(isset($font_temp['family'])){
        ?>    
            font-family:<?php echo $font_temp['family'];?>;
            <?php
           //storing to global fonts
            Uiform_Form_Helper::form_store_fonts($font_temp);
            //end storing to global fonts
            ?>
           <?php } ?> 
        <?php } ?>
        <?php 
         //shadow
         if(isset($label['shadow_st']) 
                 && intval($label['shadow_st'])===1
                 && !empty($label['shadow_color'])
                 ){
                $x_tmp=$label['shadow_x'].'px';
                $y_tmp=$label['shadow_y'].'px';
                $blur_tmp=$label['shadow_blur'].'px';
                $color_tmp=$label['shadow_color'];
             ?>
                text-shadow: <?php echo $x_tmp.' '.$y_tmp.' '.$blur_tmp.' '.$color_tmp;?>;
            <?php
            
         }
         ?>    
   }
   
   #rockfm_<?php echo $id;?> .rockfm-sublabel{
    <?php
    //sublabel
    ?>
   <?php if($sublabel['size']){?>
            font-size:<?php echo $sublabel['size'];?>px;
        <?php } ?>
        <?php if(intval($sublabel['bold'])===1){?>
            font-weight: bold;
        <?php } ?>
        <?php if(intval($sublabel['italic'])===1){?>
            font-style:italic;
        <?php } ?>
        <?php if(intval($sublabel['underline'])===1){?>
            text-decoration:underline;
        <?php } ?>
        <?php if(!empty($sublabel['color'])){?>
            color:<?php echo $sublabel['color'];?>;
        <?php } ?>
        <?php if(isset($sublabel['font_st']) && intval($sublabel['font_st'])===1){?>
        <?php 
            $font_temp=json_decode($sublabel['font'],true);
            if(isset($font_temp['family'])){
        ?>    
            font-family:<?php echo $font_temp['family'];?>;
            <?php
           //storing to global fonts
            Uiform_Form_Helper::form_store_fonts($font_temp);
            //end storing to global fonts
            ?>
           <?php } ?> 
        <?php } ?>
        <?php 
         //shadow
         if(isset($sublabel['shadow_st']) 
                 && intval($sublabel['shadow_st'])===1
                 && !empty($sublabel['shadow_color'])
                 ){
                $x_tmp=$sublabel['shadow_x'].'px';
                $y_tmp=$sublabel['shadow_y'].'px';
                $blur_tmp=$sublabel['shadow_blur'].'px';
                $color_tmp=$sublabel['shadow_color'];
             ?>
                text-shadow: <?php echo $x_tmp.' '.$y_tmp.' '.$blur_tmp.' '.$color_tmp;?>;
            <?php
            
         }
         ?>    
   }
   #rockfm_<?php echo $id;?> .rockfm-control-label{
    <?php
    if(isset($txt_block['block_st']) && intval($txt_block['block_st'])===1){
             switch (intval($txt_block['block_align'])) {
                        case 1:
                            //center
                           ?>
                            text-align: center;
                           <?php
                            break;
                        case 2:
                            //right
                            ?>
                            text-align: right;
                           <?php
                            break;
                        case 0:
                        default:
                            //left
                            ?>
                            text-align: left;
                           <?php
                            break;
                    }
         ?>
         <?php } ?>
   }
   #rockfm_<?php echo $id;?> .rockfm-wrap-label{
        <?php
        if(intval($txt_block['block_st'])===0){
           ?>
            display:none;
           <?php 
        }
           ?>
   }
   #rockfm_<?php echo $id;?> .rockfm-help-block{
   <?php if(isset($help_block['font_st']) && intval($help_block['font_st'])===1){?>
        <?php 
            $font_temp=json_decode($help_block['font'],true);
            if(isset($font_temp['family'])){
        ?>    
            font-family:<?php echo $font_temp['family'];?>;
            <?php
           //storing to global fonts
            Uiform_Form_Helper::form_store_fonts($font_temp);
            //end storing to global fonts
            ?>
           <?php } ?> 
        <?php } ?>
   }
   /*popover custom*/
   .popover_<?php echo $id;?> { 
        <?php if(!empty($validate['tip_bg'])){?>
            background:<?php echo $validate['tip_bg'];?>!important;
        <?php } ?>
        <?php if(!empty($validate['tip_col'])){?>
            color:<?php echo $validate['tip_col'];?>;
        <?php } ?>
        
   } 
   .popover_<?php echo $id;?> .popover-arrow:after{
        <?php if(!empty($validate['tip_bg'])){?>
            border-top-color:<?php echo $validate['tip_bg'];?>!important;
        <?php } ?>
   }
   
   <?php if(isset($input2['style_type']) && intval($input2['style_type'])===1){?>
   
   #rockfm_<?php echo $id;?> .rockfm-input2-wrap button.sfdc-btn {
        <?php if(!empty($input2['stl1']['bg1_color1']) && !empty($input2['stl1']['bg1_color2'])){?>
                background-image: linear-gradient(to bottom,<?php echo $input2['stl1']['bg1_color1'];?> 0%,<?php echo $input2['stl1']['bg1_color2'];?> 100%)!important;
        <?php } ?>
         <?php if(!empty($input2['stl1']['border_color'])){?>
                border-color:<?php echo $input2['stl1']['border_color'];?>!important;
        <?php } ?>        
   }
   
   #rockfm_<?php echo $id;?>  .rockfm-input2-wrap button.sfdc-btn:hover, #<?php echo $id;?> .rockfm-input2-wrap button.sfdc-btn:focus {
        <?php if(!empty($input2['stl1']['bg2_color1_h']) && !empty($input2['stl1']['bg2_color2_h'])){?>
                background-image: linear-gradient(to bottom,<?php echo $input2['stl1']['bg2_color1_h'];?> 0%,<?php echo $input2['stl1']['bg2_color2_h'];?> 100%)!important;
                background-position:0px 0px!important;
        <?php } ?>
         <?php if(!empty($input2['stl1']['border_color'])){?>
                border-color:<?php echo $input2['stl1']['border_color'];?>!important;
        <?php } ?>        
   }
   
   #rockfm_<?php echo $id;?> .rockfm-input2-wrap .sfdc-bs-caret {
         <?php if(!empty($input2['stl1']['icon_color'])){?>
                 color:<?php echo $input2['stl1']['icon_color'];?>!important;
        <?php } ?>        
   }
   
   #rockfm_<?php echo $id;?> .rockfm-input2-wrap .filter-option {
         <?php if(!empty($input2['color'])){?>
                 color:<?php echo $input2['color'];?>!important;
                 text-shadow:0 1px 0 <?php echo $input2['color'];?>!important;
        <?php } ?>
         <?php if(intval($input2['bold'])===1){?>
                 font-weight:bold;
        <?php }else{ ?>         
                 font-weight:normal;
        <?php }?>  
         <?php if(intval($input2['italic'])===1){?>
                 font-style:italic;
        <?php }  ?>         
        <?php if(intval($input2['underline'])===1){?>
                 text-decoration:underline;
        <?php }  ?>           
        <?php if(!empty($input2['size'])){?>
                 font-size:<?php echo $input2['size'];?>;
        <?php }  ?>          
   }
   
   #rockfm_<?php echo $id;?> .rockfm-input2-wrap .filter-option,
   #rockfm_<?php echo $id;?> .bootstrap-select.sfdc-btn-group .sfdc-dropdown-menu li a span.text {
        <?php if(isset($input2['font_st']) && intval($input2['font_st'])===1){?>
        <?php 
            $font_temp=json_decode($input2['font'],true);
            if(isset($font_temp['family'])){
        ?>    
            font-family:<?php echo $font_temp['family'];?>;
            <?php
           //storing to global fonts
            Uiform_Form_Helper::form_store_fonts($font_temp);
            //end storing to global fonts
            ?>
           <?php } ?> 
        <?php } ?>         
   }
   
   <?php }?>
   
   
   <?php include('formhtml_common_css1.php');?>
   <?php include('formhtml_addon_css.php');?>
   
<?php
$cntACmp = ob_get_contents();
 /* remove comments */
$cntACmp = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $cntACmp);
 /* remove tabs, spaces, newlines, etc. */
$cntACmp = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), ' ', $cntACmp);
ob_end_clean();
echo $cntACmp;
?>