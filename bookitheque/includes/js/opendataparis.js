// Fonction de récupération des critères de recherche
function search_opendataparis()
{
    var length = $("#search_year").val().length;

    if (($('#search_title').val() || $('#search_author').val()) && length <= 4)
    {
        //console.log("Résultats de la recherche :");
        $.ajax({
                type: "POST",
                url: "../bookitheque/silex/web/index_silex.php/search",
                data: {source: 'opendataparis', title: $('#search_title').val(), author: $('#search_author').val(), publisher: $('#search_publisher').val(), year: $('#search_year').val(), language: $('#search_language').val()},
                success: function(data) {
                                        console.log(data);

                                        // Recherche source OpenDataParis
                                        opendataparis(data);
                                        
                                    },
                error: function(data) {console.log('Pas bien !');console.log(data)}
              });
    }
    else
    {
        $('#search_error').text('Vous devez entrer des informations valides.');
    }
}

function opendataparis(data)
{
    // Effacement de tout ce qu'il y avait dans la div left
    $('#left').html('');
    
    var montitre = '';
    var tab_param = data.records;
    //console.log('tab_param : ', tab_param);
    
    if ($.isEmptyObject(tab_param))
        $('#left').text("Il n'y a pas de livres en bibliothèque pour cette recherche. Vous pouvez aussi effectuer votre recherche sur Amazon.");
    else
    {
        $(tab_param).each(function () {
            var result = $(this)[0]['fields'];
    
            var bibliotheque = $('<div>').addClass('bibliotheque').appendTo('#left');
            var bibli = $('<div>').addClass('bibli').appendTo(bibliotheque);
            var Titre = $('<h2>').appendTo(bibli);
            var Auteur = $('<h4>').appendTo(bibli);
            var Editeur = $('<h4>').appendTo(bibli);
            var Genre = $('<h4>').appendTo(bibli);
            montitre = '';
    
            var lol = 1;
            for (var x = 0;  x <= result.titre.length; x++) 
            {
                if (result.titre[x] == '/')
                    lol = 0;
            }
            if (lol == 0) 
            {
                for (var x = 0; result.titre[x] != '/'; x++)
                    montitre += result.titre[x];
                Titre.text(montitre);
            }
            else
                Titre.text(result.titre);
            if (result.auteur_personne_physique)
                Auteur.text(result.auteur_personne_physique);
            if (result.editeur && result.annee_d_edition)
                Editeur.text(result.editeur + " " + result.annee_d_edition);
            if (result.support)
                Genre.text(result.support);
            lol = 1;
            
            // Affichage des bibliothèques
            var $bibli_list = $('<div>').addClass('bibli_list');
            parse_bibliotheques(result, $bibli_list);
            bibliotheque.append($bibli_list);
        });
    }
}

function parse_bibliotheques(result, $bibli_list)
{
    $.getJSON('/includes/js/bibliotheques.json', function (tab_bibli) {
        //console.log(tab_bibli);
        var title_bibli = $('<h3>').appendTo($bibli_list).text('Aucune bibliothèque ne propose ce livre.');
        var delay = 200;
        for (var param in result)
        {
            for (var bibli in tab_bibli)
            {
                if (param == tab_bibli[bibli]['id'])
                {
                    title_bibli.text('Disponible dans les bibliothèques suivantes :');
                    $('<h4>').appendTo($bibli_list).text(tab_bibli[bibli]['Nom']);
                    codeAddress(tab_bibli[bibli]['Adresse'], tab_bibli[bibli]['Nom'], delay);
                    delay += 2000;
                    //console.log('MATCH : ', param);
                }
            }
        }
    });
}
