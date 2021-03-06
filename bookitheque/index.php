<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="includes/css/style.css">
        <link rel="stylesheet" href="includes/css/slideshow.css">
        <link rel="stylesheet" media="screen and (max-width: 1024px)" href="includes/css/smallscreen.css" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        
        <link rel="icon" type="image/png" href="images/logo.png">
        
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAcczUJeyF1bSAT_hDzirxAtZo0Z_o3kXY"></script>
        <script src="http://code.jquery.com/jquery.min.js"></script>
        <script src="includes/js/geolocation.js"></script>
    </head>
    
    <body>
        
        <header class="first_header" id="header">
            <h1 class="first_title" id="title">Bookithèque</h1>
            <h2 class="first_description" id="description">Toute votre lecture à portée de main</h2>
        </header>
        
        <div class="search_bar_class" id="search_bar">
            <p id="search_error"></p>
            <input id="search_title" class="input" type="text" placeholder="Titre">
            <input id="search_author" class="input" type="text" placeholder="Auteur"><br>
            
            <div id="plus">
                <input id="search_publisher" class="input" type="text" placeholder="Éditeur">
                <input id="search_year" class="input" type="number" placeholder="Année d'édition"><br>
                <label for="search_language">Langue</label>
                <select id="search_language">
                    <option value="0" name="français">Indifférent</option>
                    <option value="fr" name="français">Français</option>
                    <option value="en" name="anglais">Anglais</option>
                    <option value="de" name="allemand">Allemand</option>
                    <option value="es" name="espagnol">Espagnol</option>
                    <option value="ar" name="arabe">Arabe</option>
                    <option value="la" name="latin">Latin</option>
                </select>
            </div>
            
            <button id="search_go" class="button">Go !</button>
            <button id="search_plus" class="button" value="+">+</button>
        </div>
        <div id="contenu">
            
            <div id="right">
                <div id="amazon">
                    <button class="button_amazon" onclick="document.location.href=search_amazon()">Chercher sur Amazon</button>
                </div>

                <div id="ebooks_list">
                </div>
                
                <div class="map">
                    <div class="map_canvas"></div>
                </div>

            </div>
            
            <div id="left">
            </div>
            
        </div>
    
        <footer>
            <p id="copyright">
                Code Breakers - Copyright 2015
            </p>
            
            <div id="networks">

                <a id="fb" href="https://www.facebook.com/">
                    <svg enable-background="new 0 0 56.693 56.693" height="56.693px" id="Layer_1" version="1.1" viewBox="0 0 56.693 56.693" width="56.693px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path d="M28.347,5.157c-13.6,0-24.625,11.027-24.625,24.625c0,13.6,11.025,24.623,24.625,24.623c13.6,0,24.625-11.023,24.625-24.623  C52.972,16.184,41.946,5.157,28.347,5.157z M34.864,29.679h-4.264c0,6.814,0,15.207,0,15.207h-6.32c0,0,0-8.307,0-15.207h-3.006  V24.31h3.006v-3.479c0-2.49,1.182-6.377,6.379-6.377l4.68,0.018v5.215c0,0-2.846,0-3.398,0c-0.555,0-1.34,0.277-1.34,1.461v3.163  h4.818L34.864,29.679z"/>
                    </svg>
                </a>
                <a href="https://www.twitter.com/">
                    <svg enable-background="new 0 0 56.693 56.693" height="56.693px" id="Layer_1" version="1.1" viewBox="0 0 56.693 56.693" width="56.693px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path d="M28.348,5.157c-13.6,0-24.625,11.027-24.625,24.625c0,13.6,11.025,24.623,24.625,24.623c13.6,0,24.623-11.023,24.623-24.623  C52.971,16.184,41.947,5.157,28.348,5.157z M40.752,24.817c0.013,0.266,0.018,0.533,0.018,0.803c0,8.201-6.242,17.656-17.656,17.656  c-3.504,0-6.767-1.027-9.513-2.787c0.486,0.057,0.979,0.086,1.48,0.086c2.908,0,5.584-0.992,7.707-2.656  c-2.715-0.051-5.006-1.846-5.796-4.311c0.378,0.074,0.767,0.111,1.167,0.111c0.566,0,1.114-0.074,1.635-0.217  c-2.84-0.57-4.979-3.08-4.979-6.084c0-0.027,0-0.053,0.001-0.08c0.836,0.465,1.793,0.744,2.811,0.777  c-1.666-1.115-2.761-3.012-2.761-5.166c0-1.137,0.306-2.204,0.84-3.12c3.061,3.754,7.634,6.225,12.792,6.483  c-0.106-0.453-0.161-0.928-0.161-1.414c0-3.426,2.778-6.205,6.206-6.205c1.785,0,3.397,0.754,4.529,1.959  c1.414-0.277,2.742-0.795,3.941-1.506c-0.465,1.45-1.448,2.666-2.73,3.433c1.257-0.15,2.453-0.484,3.565-0.977  C43.018,22.849,41.965,23.942,40.752,24.817z"/>
                    </svg>
                </a>
                <a href="https://www.google.com/">
                    <svg enable-background="new 0 0 56.693 56.693" height="56.693px" id="Layer_1" version="1.1" viewBox="0 0 56.693 56.693" width="56.693px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g>
                            <path d="M23.761,27.96c0.629,0,1.16-0.248,1.57-0.717c0.645-0.732,0.928-1.936,0.76-3.215c-0.301-2.287-1.932-4.186-3.637-4.236   h-0.068c-0.604,0-1.141,0.246-1.551,0.715c-0.637,0.725-0.903,1.871-0.736,3.146c0.299,2.283,1.965,4.256,3.635,4.307H23.761z"/>
                            <path d="M25.622,34.847c-0.168-0.113-0.342-0.232-0.521-0.355c-0.525-0.162-1.084-0.246-1.654-0.254h-0.072   c-2.625,0-4.929,1.592-4.929,3.406c0,1.971,1.972,3.518,4.491,3.518c3.322,0,5.006-1.145,5.006-3.404   c0-0.215-0.025-0.436-0.076-0.656C27.642,36.222,26.837,35.675,25.622,34.847z"/>
                            <path d="M28.347,5.157c-13.601,0-24.625,11.023-24.625,24.623s11.025,24.625,24.625,24.625c13.598,0,24.623-11.025,24.623-24.625   S41.944,5.157,28.347,5.157z M26.106,43.179c-0.982,0.283-2.041,0.428-3.154,0.428c-1.238,0-2.43-0.143-3.54-0.424   c-2.15-0.541-3.74-1.57-4.48-2.895c-0.32-0.574-0.482-1.184-0.482-1.816c0-0.652,0.156-1.312,0.463-1.967   c1.18-2.51,4.283-4.197,7.722-4.197c0.035,0,0.068,0,0.1,0c-0.279-0.492-0.416-1.002-0.416-1.537c0-0.268,0.035-0.539,0.105-0.814   c-3.606-0.084-6.306-2.725-6.306-6.207c0-2.461,1.965-4.855,4.776-5.824c0.842-0.291,1.699-0.439,2.543-0.439h7.713   c0.264,0,0.494,0.17,0.576,0.42c0.084,0.252-0.008,0.525-0.221,0.68l-1.725,1.248c-0.104,0.074-0.229,0.115-0.357,0.115h-0.617   c0.799,0.955,1.266,2.316,1.266,3.848c0,1.691-0.855,3.289-2.41,4.506c-1.201,0.936-1.25,1.191-1.25,1.729   c0.016,0.295,0.854,1.252,1.775,1.904c2.152,1.523,2.953,3.014,2.953,5.508C31.14,40.04,29.163,42.292,26.106,43.179z    M43.528,29.948c0,0.334-0.273,0.605-0.607,0.605h-4.383v4.385c0,0.336-0.271,0.607-0.607,0.607h-1.248   c-0.336,0-0.607-0.271-0.607-0.607v-4.385H31.69c-0.332,0-0.605-0.271-0.605-0.605v-1.25c0-0.334,0.273-0.607,0.605-0.607h4.385   v-4.383c0-0.336,0.271-0.607,0.607-0.607h1.248c0.336,0,0.607,0.271,0.607,0.607v4.383h4.383c0.334,0,0.607,0.273,0.607,0.607   V29.948z"/>
                        </g>
                    </svg>
                </a>
                
            </div>
        </footer>
        
        <script src="includes/js/animations.js"></script>
        <script src="includes/js/europeana.js"></script>
        <script src="includes/js/opendataparis.js"></script>
        <script src="includes/js/amazone.js"></script>
        <script src="includes/js/animation_init.js"></script>
        <script src="includes/js/search.js"></script>
        
    </body>
    
</html>