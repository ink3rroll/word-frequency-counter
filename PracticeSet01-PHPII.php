
<?php

/**
*Return the total price of the items in the array.
*
*@param array $items It is the array that contains associative arrays of the items and their details.
*@return float $totalPrice The sum of the individual prices of the items in the array.
*/
function getTotalPrice(array $items): float {
    $totalPrice = 0;
    foreach ($items as $item) {
        $totalPrice += $item['price'];
     }

     return $totalPrice;
}


/**
 * Removes the spaces in the string and changes it to lower case.
 * @param string $str The original string.
 * @return string $string The modified version that has no spaces and in lowercase.
 */
function removeSpaceLowerCase(string $str): string {
    $string = str_replace(' ', '', $str);
    $string = strtolower($string);
    return $string;
}


/**
 * Displays a message whether the number is even or odd.
 * @param float $number The number that is even or odd.
 * @return void returns nothing. It only displays a message whether the number is even or odd.
 */
function isEvenOrOdd(float $number): void {
    if ($number % 2 == 0) {
        echo "\nThe number " . $number . " is even.";
    }
    else {
        echo "\nThe number " . $number . " is odd";
    }
}

// Declare the items array that contains the item details
$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
 ];

 // Display the total price
 echo "\nTotal price: $" . getTotalPrice($items);


 // Declare string to be manipulated
 $string = "This is a poorly written program with little structure and readability.";

// Display the modified version of the string
echo "\nModified string: " . removeSpaceLowerCase($string);

// Declare the number you wish to know if even or odd
$number = 42;

// Determine if the number is even or odd
isEvenOrOdd($number);


?>