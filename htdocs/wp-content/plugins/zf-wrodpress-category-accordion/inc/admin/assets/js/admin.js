(function ($) {

    $('.zfa_choose_ids').on('click', function (event) {
        event.preventDefault();
        var action = $(this).data('action');
        var id = $(this).data('id');
        var cat_type_id = $(this).data('cattype');
        var cat_type = $('#' + cat_type_id).val();

        tb_show('Choose IDs', 'admin.php?zfa_choose_ids=1&element_id='+id+'&cat_type=' + cat_type);
    });

})(jQuery);