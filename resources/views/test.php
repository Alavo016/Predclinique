<?php
// Définition des données
$donnees = array(
    "Simvastatin" => "Quo occaecati voluptate dolorum quis soluta rerum tenetur.",
    "Metformin" => "Harum ducimus deleniti fugit est mollitia et.",
    "Omeprazole" => "Harum laudantium voluptates quam qui sit iusto occaecati aperiam."
);

// Affichage des données
foreach ($donnees as $medicament => $posologie) {
    echo "Médicament : $medicament<br>";
    echo "Posologie : $posologie<br><br>";
}
