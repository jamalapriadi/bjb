$(function()
{
    // Confirm deleting resources
    $("form[data-confirm]").submit(function()
    {
        if (!confirm($(this).attr("data-confirm")))
        {
            return false;
        }
    });

    $('.delete').click(function()
    {
        $(this).prev().submit()
    });

    $('.collapse').on('show.bs.collapse', function()
    {
        $(this)
            .parent()
            .find(".glyphicon-plus")
            .removeClass("glyphicon-plus")
            .addClass("glyphicon-minus");
    }).on('hide.bs.collapse', function()
    {
        $(this)
            .parent()
            .find(".glyphicon-minus")
            .removeClass("glyphicon-minus")
            .addClass("glyphicon-plus");
    });
});