$(function () {

    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
    });

    $('#delete-modal-quiz').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        modal.find('.modal-title').text('Excluir questão #' + id);
        modal.find('#confirm').attr('href', 'delete.php?id=' + id);
    });

});
