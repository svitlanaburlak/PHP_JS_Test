/**
 * Exo 2:
 */

// str must not be array but string, separator ??
function something(str, separator){
    // The Array.isArray() static method determines whether the passed value is an Array.
    if(separator && !Array.isArray(str)){
        // str not array so we split it into an array
        // splits a string into an array of substrings, and returns the array:
        var arr =str.split(separator);

        // The Array.from() static method creates a new, shallow-copied Array instance from an iterable or array-like object.
        return Array.from(new Set(arr));
    }
    else return false;
}

// This function takes as parameters a string and separator(character). It checks if given string arguments is string and not array. If it is array it will return false. If it is string split() function transform it into array using separator to define/separate each element of array.  New Set() function takes this array and transform it into collection of iterable values. Array.from() function creates an array from this collection. After it return obtained array. 


/**
 * Exo 1
 * From a collection of numbers inside an array, returns the closest value to zero.
 */
 function closestToZero(array) {
    // Si « ts » est vide, retournez 0 (zéro)
    if(!array.length){
        return 0;
    }
    
    // define that closest to 0 is variable closest
    let closest = 0;
    
    // loop that verify each number in the array 
    for (let i = 0; i < array.length ; i++) {
        // during first iteration it assign the value of array[0] as closest
        if (closest === 0) {
            closest = array[i];
        // during next iteration it checks value of array[i] if it positive
        // and if its value is smaller or equal to the absolute value of closest
        } else if (array[i] > 0 && array[i] <= Math.abs(closest)) {
            // if condition is true, value array[i] becomes closest
            closest = array[i];
        // during next iteration it checks value of array[i] if it negative
        // and if its absolute value is smaller than absolute value of closest
        } else if (array[i] < 0 && Math.abs(array[i]) < Math.abs(closest)) {
            // if condition is true, value array[i] becomes closest
            closest = array[i];
        }
    }
    
    // it returns the value of closest after iteration through array is finished
    return closest;
}

let items = [7,-10, 13, 8, 4, -7.2, -12, -3.7, 3.5, -9.6, 6.5, -1.7, -6.2, 7];