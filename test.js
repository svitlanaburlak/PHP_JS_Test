/**
 * Exo 1
 * Fonction retourne la température la plus proche de zéro qui appartient au tableau
 */
 function closestToZero(array) {
    // Si « ts » est vide, retournez 0 (zéro)
    if(!array.length){
        return 0;
    }
    
    // definir la valeur de la variable closest comme éqal à 0
    let closest = 0;
    
    // une boucle pour vérifier chaque nombre dans le tableau 
    for (let i = 0; i < array.length ; i++) {
        //lors de la première itération elle attribue la valeur de array[0] comme la valeur de closest
        if (closest === 0) {
            closest = array[i];
        // lors de la prochaine itération, elle verifie si la valeur de array[i] est positive
        // et si sa valeur est inférieure ou égale à la valeur absolue de closest
        } else if (array[i] > 0 && array[i] <= Math.abs(closest)) {
            // si la condition est vraie, la valeur array[i] devient la valuer de closest
            closest = array[i];
        // ou lors de la prochaine itération, elle verifie si la valeur de array[i] est negative
        // et si sa valeur est inférieure ou égale à la valeur absolue de closest
        } else if (array[i] < 0 && Math.abs(array[i]) < Math.abs(closest)) {
            // si la condition est vraie, la valeur array[i] devient la valuer de closest
            closest = array[i];
        }
    }
    
    // elle retourne la valuer de closest lors l'itération dans le tableau est terminée
    return closest;
}

let items = [7,-10, 13, 8, 4, -7.2, -12, -3.7, 3.5, -9.6, 6.5, -1.7, -6.2, 7];


/**
 * Exo 2:
 */

// str doit être une chaîne de caractères mais pas un tableau
function something(str, separator){
    // Array.isArray() est la méthode statique détermine si la valeur transmise est un tableau.
    if(separator && !Array.isArray(str)){
        // si separator n'est pas faux(null)
        // si str n'est pas un tabelau, elle l'a divisé en un tableau 
        // elle divise une chaîne de caractères en un tableau de sous-chaînes et renvoie le tableau 
        var arr =str.split(separator);

        // Array.from() est la méthode statique qui crée une nouvelle tabelau à partir d'un objet itérable ou semblable à un tableau.
        return Array.from(new Set(arr));
    }
    // si separator est faux/null ou str est un tableau elle retourne faux
    else return false;
}

//! MA REPONSE Cette fonction prend comme des paramètres une chaîne de caractères et un séparateur (caractère). Il vérifie si l'argument (str) donnés est une chaîne de caractères et pas un tableau. S'il s'agit d'un tableau, elle renverra faux. S'il s'agit d'une chaîne de caractères, la fonction split() la transforme en tableau en utilisant un séparateur pour définir/séparer chaque élément du tableau. La fonction new Set() prend ce tableau et le transforme en une collection de valeurs itérables. La fonction Array.from() crée un tableau à partir de cette collection. Après cela, cette fonction retourne le tableau de résultats.