<!-- jQuery Js -->
<script src="../assets/js/jquery.min.js"></script>

<!-- Bootstrap Js -->
<script src="../assets/js/bootstrap.min.js"></script>

<script src="../assets/js/custom.js"></script>

<script src="../assets/js/jquery.metisMenu.js"></script>

<script src="../assets/js/jquery.dropotron.min.js"></script>
<script src="../assets/js/bootstrap-notify.min.js"></script>

<script type="text/javascript">

   /* function func(id) {
    
        var project = document.getElementById('project-' + id);

        var project = {
            id: project.children[1].innerHTML,
            title: project.children[0].innerHTML,
            desc: project.children[3].innerHTML,
            sum: project.children[2].innerHTML,
            type: project.children[4].innerHTML,
        }

        var modalFormEdit = `  
        <div class="form-group">
            <p class="help-block">Title:</p>
            <input class="form-control" type="text" name="title" placeholder="Insert project title..." required="required" value="` +project.title + `">
        </div>

        <div class="form-group">
            <p class="help-block">Summary:</p>
            <textarea name="sum" class="form-control" rows="2" cols="50" minlength="20" required="required">` +project.sum+ `</textarea>
        </div>
        <div class="form-group">
            <p class="help-block">Main Image:</p>
            <input class="form-control" type="file" name="image_main" required="required">
        </div>
        <div class="form-group">
         <p class="help-block">Adicional Images:</p>
          <input class="form-control" type="file" name="images" multiple="true">
        </div>
        <div class="form-group">
            <p class="help-block">Description:</p>
            <textarea name="desc" class="form-control" rows="8" cols="50" minlength="50">` + project.desc + `</textarea> 
        </div>`;
    

        var selectDropdown = ` <div class="form-group">
            <p class="help-block">Description:</p>
            <select name="type" class="form-control">
               
            </select>
        </div>`;


        var bodyForm = document.getElementById('modal-form-data');
        bodyForm.innerHTML = modalFormEdit;
        $('#editmodal').modal('show');
    }  */

    /*function alert(tipo, title = "Sucesso!", message, div = '#alertAdMedia', desaparecer = true) {
        var message = '<div id="message" class="alert alert-' + tipo + '"><strong>' + title
                + '</strong> ' + message + '</div></div>';
        $(div).prepend(message);
        if (desaparecer) {
            setTimeout(function () {
                $('#message').fadeOut(1000, function () {
                    $('#message').remove();
                });
            }, 2200);
        }
    } */
    function alertMessage(tipo, title = "Sucesso!", message, div = '#alertAdMedia', desaparecer = true) {
        $.notify({
            title: title,
            icon: 'fa fa-warning',
            message: message
        },{
            // settings
            type: tipo,
            delay: 2000,
            placement: {
                from: "top",
                align: "center"
            },
            fadeOut: {
                delay: Math.floor(Math.random() * 500) + 1000
            },
            allow_dismiss: true
        });
}
</script>