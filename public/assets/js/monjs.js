$(function() {

    $('#my_form').on('submit', function(e) {
        e.preventDefault();

        var $form = $(this);
        var formdata = (window.FormData) ? new FormData($form[0]) : null;
        var data = (formdata !== null) ? formdata : $form.serialize();

        var url = $('#my_form').attr('action');

        	console.log(url);
        $.ajax({
            type: 'post',
            url: url,
            contentType: false, // obligatoire pour de l'upload
            processData: false, // obligatoire pour de l'upload
            // dataType: 'json', // selon le retour attendu
            cache: false,
            data: data,
            success: function(res) {
                $('#result').html(res);
                $('#image_preview').remove().fadeOut(1600);
                $form[0].reset();
            }
        });
    });

    $('#my_form').find('input[name="url_picture"]').on('change', function(e) {
        var files = $(this)[0].files;

        if (files.length > 0) {
            // On part du principe qu'il n'y qu'un seul fichier
            // étant donné que l'on a pas renseigné l'attribut "multiple"
            var file = files[0],
                $image_preview = $('#image_preview');

            // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
            $image_preview.find('.thumbnail').removeClass('hidden');
            $image_preview.find('img').attr('src', window.URL.createObjectURL(file));
            $image_preview.find('h4').html(file.name);
            $image_preview.find('.caption p:first').html(file.size + ' bytes');
        }
    });

    // Bouton "Annuler"
    $('#image_preview').find('button[type="button"]').on('click', function(e) {
        e.preventDefault();

        $('#my_form').find('input[name="image"]').val('');
        $('#image_preview').find('.thumbnail').addClass('hidden');
    })


});