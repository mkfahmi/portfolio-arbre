<?php

function search_opendataparis($post)
{
    $q = $post['title'];
    $refine = '';
    
    if ($post['title'] == NULL)
        $q = $post['author'];
    elseif ($post['author'] != NULL)
        $refine = '&refine.auteur_personne_physique=' . $post['author'];
    if ($post['titre'] != NULL)
        $refine = $refine . '&refine.titre=' . $post['title'];
    if ($post['editor'] != NULL)
        $refine = $refine . '&refine.editeur=' . $post['publisher'];
    if ($post['year'] != NULL)
        $refine = $refine . '&refine.annee_d_edition=' . $post['year'];
    if ($post['language'] != "0")
        $refine = $refine . '&refine.langue=' . $post['language'];
        
        
    $q = preg_replace('/ /', '+', $q);
    $refine = preg_replace('/ /', '+', $qf);
        
    $requestUrl = 'http://opendata.paris.fr/api/records/1.0/search?dataset=liste_des_ouvrages_des_bibliotheques_en_janvier_2009&q='.$q.'&facet=support_regroupe&facet=titre&facet=auteur_personne_physique&facet=support&facet=editeur&facet=annee_d_edition&facet=langue&facet=genre_ou_theme&refine.support_regroupe=imprimés'.$refine.'&pretty_print=true';

    // Requête cURL pour récupérer les données de l'API
    $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, $requestUrl);
    curl_setopt($curl, CURLOPT_COOKIESESSION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $return = curl_exec($curl);
    curl_close($curl);
    
    return (json_decode($return));
}

?>