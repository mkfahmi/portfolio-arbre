function search_amazon() {
    $("#amazon").css("display", "block");
    var save1 = document.getElementById("search_title").value;
    var save2 = document.getElementById("search_author").value;
    var save3 = document.getElementById("search_publisher").value;
    var save4 = document.getElementById("search_year").value;
    var save = "";
    if (save1 != "")
        save += "+" + save1;
    if (save2 != "")
        save += "+" + save2;
    if (save3 != "")
        save += "+" + save3;
    if (save4 != "")
        save += "+" + save4;
    //else
     //   return;
    var link_part_1 = "http://www.amazon.fr/s/ref=nb_sb_noss_1?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&url=search-alias%3Daps&field-keywords=";
    var link_part_2 = "&rh=i%3Aaps%2Ck%3A";
    var key = "";
    if (save != "") {
        for (var i = 0; save[i]; i++)        
            {
                if (save[i] == " ")
                    {
                        key += "+";
                        if (save[i+1] == " ")
                            {
                                i++;
                                while (save[i] == " ")
                                    i++;
                            }
                    }
                else if (save[i] == "'")
                    key += "%27";
                else
                    key += save[i];
            }
    }
    var link = link_part_1 + key + link_part_2 + key;
    return (link);
}