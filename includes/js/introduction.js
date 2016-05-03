/* Apparition des éléments à l'entrée */
$('h1', 'header').css('display', 'none');
$('h2', 'header').css('display', 'none');
$('#arbre').css('display', 'none');
$('div', '#feuilles').css('opacity', '0');
$('div', '#centres_interet').css('display', 'none');
$('div', '#savoir_plus').css('display', 'none');
$('#contact').css('opacity', '0');

$('h1', 'header').fadeIn(1500, function () {
    $('h2', 'header').fadeIn(800);
});

$('#arbre').fadeIn(1500, function () {
    $('div', '#feuilles').animate({opacity:1},800);
    $('div', '#centres_interet').fadeIn(800);
    $('div', '#savoir_plus').fadeIn(800);
    $('#contact').animate({opacity:1},800);
});

/* Légende des feuilles */
function legende_choix(leaf) {
    var legende;
    var leaf_id = $(leaf).attr('id');
    
    switch(leaf_id) {
            
        // COMPETENCES
        case 'f_1':
            legende = "PHP";
            break;
        case 'f_2':
            legende = "Langage C";
            break;
        case 'f_7':
            legende = "SQL (MySQL)";
            break;
        case 'f_8':
            legende = "NoSQL (MongoDB)";
            break;
        case 'f_9':
            legende = "CSS";
            break;
        case 'f_10':
            legende = "HTML";
            break;
        case 'f_11':
            legende = "JavaScript";
            break;
        case 'f_12':
            legende = "jQuery";
            break;
        case 'f_13':
            legende = "Silex (Micro-framework PHP)";
            break;
        case 'f_14':
            legende = "Wordpress";
            break;

        // LANGUES
        case 'f_3':
            legende = "Anglais : niveau intermédiaire (TOEIC : 730)";
            break;
        case 'f_15':
            legende = "Français : langue maternelle";
            break;
        case 'f_16':
            legende = "Arabe : langue maternelle";
            break;
            
        // FORMATION
        case 'f_4':
            legende = "Prép'ETNA : prépa intégrée au cycle d'ingénierie informatique de l'ETNA (Architecte logiciel, Développeur d'applications)";
            break;
        case 'f_17':
            legende = "Baccalauréat Scientifique spécialité Maths, Mention Bien (Lycée St Louis-St Clément)";
            break;
        case 'f_18':
            legende = "UPMC - Faculté de médecine : PAES (Première Année Commune aux Études de Santé)";
            break;
        
        // EXPERIENCE & PROJETS
        case 'f_5':
            legende = "Bookithèque : web application qui centralise les moyens d'accès aux livres (emprunt en bibliothèque, lecture et achat en ligne)";
            break;
        case 'f_6':
            legende = "Méli-mélo connaissances : conception d'un site de partage d'exposés à 14 ans, puis améliorations en suivant les évolutions des langages";
            break;
        case 'f_19':
            legende = "Open Law : refonte du site de Open Law et gestion d'une base de données relationnelle";
            break;
        case 'f_20':
            legende = "Tivipedia : adaptation de l'application mobile Tivipedia de Tivine Technologies en site web et analyse sémantique du flux de données Twitter";
            break;
        case 'f_21':
            legende = "Bénévolat de correction orthographique : travail bénévole de correction orthographique de cours et d'articles au sein du site zcorrecteurs.fr";
            break;
        default:
            legende = "Passez au-dessus des feuilles de l'arbre.";
    }
    return (legende);
}

/* Agrandissement des feuilles au passage au-dessus */
$('div', '#feuilles').hover(
    function () {
        $('img', this).stop().attr('src', 'images/feuille3.svg');
        $(this).stop().effect( 'bounce', 1000 );
        var legende = legende_choix($(this));
        $('h3', '#legende').stop().text(legende).show("fade", 400);
    },
    function() {
        $('img', this).stop().attr('src', 'images/feuille1.svg');
        $('h3', '#legende').stop().hide("fade", 50);
    }
);

/* Apparition du nom des centres d'intérêt en passant dessus */
$('div', '#centres_interet').hover(
    function() {
        $('p', this).toggle('puff', 300);
    },
    function() {
        $('p', this).toggle('puff', 300);
    }
);

/* Apparition du nom de en savoir plus en passant dessus */
$('div', '#savoir_plus').hover(
    function() {
        $('p', this).toggle('puff', 300);
    },
    function() {
        $('p', this).toggle('puff', 300);
    }
);

/* Apparition du champ de texte quand on est dans le champ du mail dans le footer */
$('#email').focus(function() {
    if ($('#contact_hidden').css('display') == 'none')
        $('#contact_hidden').slideToggle(500);
});

$('#contact').blur(
    function() {
        $('#contact_hidden').slideToggle(500);
});