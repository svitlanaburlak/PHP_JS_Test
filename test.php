<?php

/**
 * Exo 1: Vous ne rappelez plus de l’endroit où vous avez enregistré le fichier universe-formula. La seule chose dont vous vous souvenez, c’est que vous l’avez mis quelque part dans un sous-répertoire de /tmp/documents. Implémentez la fonction locateUniverseFormula() qui devra retrouvez le fichier universe-formula et retourner son chemin complet (depuis la racine du système de fichiers). /tmp/documents peut contenir des sous-répertoires imbriqués les uns dans les autres et niverse-formula peut se trouver dans n’importe lequel de ces sous-répertoires. Si universe-formula n’existe pas, alors votre programme devra retourner NULL
 */

// function locateUniverseFormula($directory,$file) {

//     // List files and directories inside the specified path
//     $files = scandir($directory);

//     foreach($files as $value) {
//         //  pathinfo() Returns information about a file path
//         $path = realpath($directory.DIRECTORY_SEPARATOR.$value);

//         // is_dir — Tells whether the filename is a directory
//         // if its not it checks if the searched file name is equal to $value
//         if(!is_dir($path)) {

//             // if it is equal it will return the path to the file
//             if($file == $value){
//                 echo $path;
//                 break;

//             }  

//         // if it is a not a file, it will luanch the function to search inside the given directory
//         } else if($value != "." && $value != "..") {

//             locateUniverseFormula($path, $file);

//         } 
   
//     }

// }

// locateUniverseFormula("/tmp/documents", "universe-formula");
// locateUniverseFormula("/var/www/html", "exemple-1.json");

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

    // get content of the file in json
    $string = file_get_contents($file);

    // transform it into array
    $array = json_decode($string, true);

    // get array of rules
    $rules = $array["rules"];

    if ($array["condition"] === "OR") {
        
        foreach ($rules as $condition) {

            echo "( ";

            foreach($condition["rules"] as $rule) {
                echo $rule["id"] . " " . $rule["operator"] . " " . $rule["value"] . " ";

                // if it is not the last element of $condition["rules"]
                if($rule !== end($condition["rules"])) {
                echo $condition["condition"] . " ";  
                }
            }

            echo ") "; 
            if($condition !== end($rules)) {
                echo $array["condition"] . " ";  
            };
            
        }

    } else if ($array["condition"] === "AND") {
        // for each rule of the rules array it will print id, operator and value combined by the word of CONDITION.
        foreach($rules as $rule) {
            echo $rule["id"] . " " . $rule["operator"] . " " . $rule["value"] . " ";

            // if it is not the last element of rules
            if($rule !== end($rules)) {
            echo $array["condition"] . " ";  
            }
        
        } 
    }

    
   
    
    // $filter = true;
    // return $filter;
}

readJson("exemple-1.json");
