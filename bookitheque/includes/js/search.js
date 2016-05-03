$('#search_go').click(search);

function search()
{
    if (($('#search_title').val() || $('#search_author').val()) && length <= 4)
    {
        search_europeana();
        search_opendataparis();
        search_amazon();
        map_initialize();
        animate_change();
        //codeAddress("Ivry sur Seine");
    }
    else
        $('#search_error').text('Vous devez entrer des informations valides.');
}