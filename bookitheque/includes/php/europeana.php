<?php

function search_europeana($post)
{
    $wskey = "4BGmpDusu";
    $query = $post['title'];
    $qf = '';
    
    if ($post['title'] == NULL)
        $query = $post['author'];
    elseif ($post['author'] != NULL)
        $qf = '&qf=' . $post['author'];
    if ($post['year'] != NULL)
        $qf = $qf . '&qf=YEAR:' . $post['year'];
    if ($post['language'] != "0")
        $qf = $qf . '&qf=LANGUAGE:' . $post['language'];
        
    $query = preg_replace('/ /', '+', $query);
    $qf = preg_replace('/ /', '+', $qf);
        
    $requestUrl = 'http://www.europeana.eu/api/v2/search.json?wskey='.$wskey.'&query='.$query.$qf.'&qf=TYPE:TEXT&start=1&rows=24&profile=standard';

    // Requête cURL pour récupérer les données de l'API
    $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, $requestUrl);
    curl_setopt($curl, CURLOPT_COOKIESESSION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    
    $return = curl_exec($curl);
    curl_close($curl);
    
    return (json_decode($return));
}

?>