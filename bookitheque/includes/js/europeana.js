// Fonction de récupération des critères de recherche
function search_europeana()
{
    var length = $("#search_year").val().length;

    if (($('#search_title').val() || $('#search_author').val()) && length <= 4)
    {
        //console.log("Résultats de la recherche :");
        $.ajax({
                type: "POST",
                url: "../bookitheque/silex/web/index_silex.php/search",
                data: {source: 'europeana', title: $('#search_title').val(), author: $('#search_author').val(), publisher: $('#search_publisher').val(), year: $('#search_year').val(), language: $('#search_language').val()},
                success: function(data) {
                                        console.log(data);

                                        // Recherche source Europeana
                                        europeana(data);
                                        
                                    },
                error: function(data) {console.log('Pas bien !');console.log(data)}
              });
    }
    else
        $('#search_error').text('Vous devez entrer des informations valides.');
}

function europeana(data)
{
    if ('#ebooks_list')
        $('#ebooks_list').remove();
    $('<div>').appendTo('#right').attr({'id':'ebooks_list'});
    var list = data.items;
    if (data.itemsCount != 0)
    {
        // Création du Slideshow
        var div_slide = $('<div>').appendTo('#ebooks_list').attr({'id':'slider'});
        $('<a>').appendTo(div_slide).attr({'class':'control_next'}).text('>');
        $('<a>').appendTo(div_slide).attr({'class':'control_prev'}).text('<');
        var ul = $('<ul>').appendTo(div_slide);
    
        // Ajout des livres dans le Slideshow
        for (var thing in list)
        {
            var elt = list[thing];
            var title = elt.title[0];
            var image = 'images/image-not-found.png';
            if (elt.edmPreview)
                image = elt.edmPreview[0];
            var link = elt.edmIsShownAt[0];
            var li = $('<li>').appendTo(ul);
            var a = $('<a>').appendTo(li).attr({'href':link}).append('<img src="'+image+'">');
            $('<div>').appendTo(a).attr({'class':'slideshow_infos'}).text(title);
        }
        $.getScript('../bookitheque/includes/js/slideshow.js', function () {console.log('Script chargé !')});
    }
    else
    {
       $('<div>').appendTo('#ebooks_list').attr({'class':'ebook'}).text("Il n'y a pas de livres numérisés pour cette recherche. Vous pouvez aussi effectuer votre recherche sur Amazon."); 
    }
}