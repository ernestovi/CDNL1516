<?php
# Configuration

$fichier_xml = "https://picasaweb.google.com/data/feed/base/user/117590660096025980525/albumid/6202229851688075025?alt=rss&kind=photo&hl=en_US"; # Placez ici l'adresse du flux
$nombre_limite = 20; # Nombre maximum d'éléments à afficher

# Affichage du Flux
$raw = file_get_contents($fichier_xml);
if ($raw) {

    if(eregi("<item>(.*)</item>",$raw,$rawitems)){

        $items = explode("<item>", $rawitems[0]);
        $nb = count($items);
        $maximum = (($nb-1) < $nombre_limite) ? ($nb-1) : $nombre_limite;

        for ($i=0;$i<$maximum;$i++) {

            eregi("<title>(.*)</title>",$items[$i+1], $title);
            eregi("<link>(.*)</link>",$items[$i+1], $link);
            echo "- <a href=\"".$link[1]."\" target=\"_blank\">".$title[1]."</a><br />";


        }

    }

}
?>
