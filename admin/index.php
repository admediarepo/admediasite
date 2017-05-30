<?php ob_start(); ?>
<?php require_once '../core/init.php'; ?>
<?php require_once 'includes/loginVerify.php'; ?>
<?php
    define('INCLUDE',true);
    $_GET['page'] = (isset($_GET['page']) && !empty($_GET['page'])) ? htmlentities(trim($_GET['page'])) : 'default';
    $page = $_GET['page'];
    $blackListFiles = [ 'login','index','logout','ajax/projectdelete', 'recovery' ];
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once 'includes/header.php'; ?>
    <!-- JS Scripts-->
<?php require_once 'includes/scripts.php'; ?>
</head>

<body>
    <div id="wrapper">
<?php require_once 'includes/navtop.php'; ?>
        <!--/. NAV TOP  -->
<?php require_once 'includes/navside.php'; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">           
                <?php 
                        if(file_exists($page.'.php') && !in_array($page, $blackListFiles)){
                            require_once($page.'.php');
                        } else { ?>
                            <h1>Esta Pagina não existe!</h1>
                <?php   } ?>
                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
    </div>
    <!-- /. WRAPPER  -->

<script type="text/javascript">
  $(document).ready(function(){
      function removeImage(id, typeOfImage = 'aditional') {
          var data = {};
          if(typeOfImage =='aditional'){
              data = { id: id, typeOfImage: 'ADITIONAL_IMAGE' };
          }else{
            if(typeOfImage =='main'){
              data = { id: id, typeOfImage: 'MAIN_IMAGE' };
            }
          }
           $.ajax({
            url: "ajax/projectdelete", 
            data: data,
            type: 'POST', 
            success: function(data1) {
              console.log(data1);
              var dataParse = $.parseJSON(data1);
               if(dataParse.success == true){
                  alertMessage('success', 'Successo!', 'Imagem Eliminada com successo!');
                  if(typeOfImage =='aditional'){
                      $('.preview-imgs[attr-image-id="'+id+'"]').remove();
                  }else{
                    if(typeOfImage =='main'){
                     $('.preview-imgs[attr-project-id="'+id+'"]').remove();
                    }
                  }

               }
            },
            error: function (request, status, error) {
                  alertMessage('danger', 'Error!', request.responseText);
              }
         });

      }
      $('.img-remove').click(function(){
          var attr_image_id = $(this).attr('attr-image-id');
          var attr_project_id = $(this).attr('attr-project-id');
          if(typeof attr_image_id !== typeof undefined && attr_image_id !== false){
            removeImage(attr_image_id, 'aditional');
          }else{
            if(typeof attr_project_id !== typeof undefined && attr_project_id !== false){
              removeImage(attr_project_id, 'main');
            }
          }
          
      });
  });

    </script>
  </body>
</html>
