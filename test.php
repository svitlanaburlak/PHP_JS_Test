<?php

/**
 * Exo 1: Vous ne rappelez plus de l’endroit où vous avez enregistré le fichier universe-formula. 
 * La seule chose dont vous vous souvenez, c’est que vous l’avez mis quelque part dans un sous-répertoire de /tmp/documents. 
 * Implémentez la fonction locateUniverseFormula() qui devra retrouvez le fichier universe-formula et retourner son chemin complet (depuis la racine du système de fichiers). 
 * /tmp/documents peut contenir des sous-répertoires imbriqués les uns dans les autres et niverse-formula peut se trouver dans n’importe lequel de ces sous-répertoires. 
 * Si universe-formula n’existe pas, alors votre programme devra retourner NULL
 */

function locateUniverseFormula($directory,$file) {

    // Lister les fichiers et répertoires dans le chemin spécifié
    $files = scandir($directory);

    foreach($files as $value) {
        //  pathinfo() retourne information concernant le chemin
        $path = realpath($directory.DIRECTORY_SEPARATOR.$value);

        // is_dir verifie si c'est un répertoire
        // si ce n'est pas un répertoire, elle verfie si sa valeur est égale au fichier qu'on cherche 
        if(!is_dir($path)) {

            // si égal, elle retourne le chemin de ce fichier
            if($file == $value){
                echo $path;
                break;

            }  

        // si ce n'est pas un fichier, elle recommence cette fonction pour chercher dans le répertoire donné
        } else if($value != "." && $value != "..") {

            locateUniverseFormula($path, $file);

        } 
   
    }

}

// locateUniverseFormula("/tmp/documents", "universe-formula");

/**
 * Exo 2: QueryBuilder est un composant d'interface utilisateur permettant de créer des requêtes et des filtres. Il nous renvoie un résultat sous format jSon ci-dessous deux exemples
 * Pouvez-vous écrire un programme en PHP qui permet de lire le json et sortir le filtre qui sera ajouté à une requête. http://jsfiddle.net/fr0z3nfyr/vwyLq21m/2/
 * Résultat attendu :
 * 1. Exemple 1 :
 * ( 6_var is_null AND 7_ct equal 2) OR ( 5_ct greater 2022-02-01 AND 6_var is_null )
 * 2. Exemple 2 :
 * 5_ct greater 2022-02-01 AND 4_ct is_null
 */
function readJson($file) {

    // récupérer le contenu du fichier en json
    $string = file_get_contents($file);

    // transformer le en tableau
    $array = json_decode($string, true);

    // obtenir un tableau de règles
    $rules = $array["rules"];

    // si une condition est OR
    if ($array["condition"] === "OR") {
        
        // un boucle pour vérfier chaque condition du tableau récupérer depuis un fichier JSON
        foreach ($rules as $condition) {

            echo "( ";

            foreach($condition["rules"] as $rule) {
                echo $rule["id"] . " " . $rule["operator"] . " " . $rule["value"] . " ";

                // si ce n'est pas le dernier element du tableau $condition["rules"]
                if($rule !== end($condition["rules"])) {
                echo $condition["condition"] . " ";  
                }
            }

            echo ") "; 
            if($condition !== end($rules)) {
                echo $array["condition"] . " ";  
            };
            
        }

    // si une condition est AND
    } else if ($array["condition"] === "AND") {
        // pour chaque règle du tableau $rules, elle affiche les id, operator et value separé par le mot de la conditon (AND)
        foreach($rules as $rule) {
            echo $rule["id"] . " " . $rule["operator"] . " " . $rule["value"] . " ";

            // si ce n'est pas le dernier element du tableau $rules
            if($rule !== end($rules)) {
            echo $array["condition"] . " ";  
            }
        
        } 
    }

}

readJson("exemple-2.json");
