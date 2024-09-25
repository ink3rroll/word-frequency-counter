<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <h1>Word Frequency Counter</h1>
    <form action="process.php" method="post">
        <label for="text">Paste your text here:</label><br>
        <textarea id="text" name="text" rows="10" cols="50" required></textarea><br><br>
        
        <label for="sort">Sort by frequency:</label>
        <select id="sort" name="sort">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select><br><br>
        
        <label for="limit">Number of words to display:</label>
        <input type="number" id="limit" name="limit" value="10" min="1"><br><br>
        
        <input type="submit" value="Calculate Word Frequency">
    </form>
    
    <?php



function removeWordFromArray(array $wordsArray, string $wordToRemove): array {
    return array_filter($wordsArray, function($word) use ($wordToRemove) {
        return $word !== $wordToRemove;
    });
}




function wordFrequencies(array $wordsArray): array {
    $wordFrequency = [];
    foreach($wordsArray as $word) {
        if (array_key_exists($word, $wordFrequency)) {
            $wordFrequency[$word] = $wordFrequency[$word] + 1;
        }

        else {
            $wordFrequency[$word] = 1;
        }
         
    }

    return $wordFrequency;
}


function tokenizeWords(string $str): array {
    $newString = "";

    // remove punctuations
    for ($i = 0; $i < strlen($str); $i++) {
        if (ctype_alpha($str[$i]) or $str[$i] == ' ') {
            $newString .= $str[$i];
        }
    }

    // seperate words into array
    $wordsArray = explode(" ", $newString);

    // make the words lowercase
    foreach ($wordsArray as &$word) {
        $word = strtolower($word);
    }

    // remove common stop words
    $stop_words = [
        'a',
        'about',
        'above',
        'after',
        'again',
        'against',
        'all',
        'am',
        'an',
        'and',
        'any',
        'are',
        "aren't",
        'as',
        'at',
        'be',
        'because',
        'been',
        'before',
        'being',
        'below',
        'between',
        'both',
        'but',
        'by',
        "can't",
        'cannot',
        'could',
        "couldn't",
        'did',
        "didn't",
        'do',
        'does',
        "doesn't",
        'doing',
        "don't",
        'down',
        'during',
        'each',
        'few',
        'for',
        'from',
        'further',
        'had',
        "hadn't",
        'has',
        "hasn't",
        'have',
        "haven't",
        'having',
        'he',
        "he'd",
        "he'll",
        "he's",
        'her',
        'here',
        "here's",
        'hers',
        'herself',
        'him',
        'himself',
        'his',
        'how',
        "how's",
        'i',
        "i'd",
        "i'll",
        "i'm",
        "i've",
        'if',
        'in',
        'into',
        'is',
        "isn't",
        'it',
        "it's",
        'its',
        'itself',
        "let's",
        'me',
        'more',
        'most',
        "mustn't",
        'my',
        'myself',
        'no',
        'nor',
        'not',
        'of',
        'off',
        'on', 'once', 'only', 'or', 'other', 'ought', 'our', 'ours', 'ourselves', 'out', 'over', 'own', 'same', "shan't", 'she', "she'd", "she'll", "she's", 'should', "shouldn't", 'so', 'some', 'such', 'than', 'that', "that's", 'the', 'their', 'theirs', 'them', 'themselves', 'then', 'there', "there's", 'these', 'they', "they'd", "they'll", "they're", "they've", 'this', 'those', 'through', 'to', 'too', 'under', 'until', 'up', 'very', 'was', "wasn't", 'we', "we'd", "we'll", "we're", "we've", 'were', "weren't", 'what', "what's", 'when', "when's", 'where', "where's", 'which', 'while', 'who', "who's", 'whom', 'why', "why's", 'with', "won't", 'would', "wouldn't", 'you', "you'd", "you'll", "you're", "you've", 'your', 'yours', 'yourself', 'yourselves', 'zero', ''];

        foreach ($stop_words as $stop_word) {
            $wordsArray = removeWordFromArray($wordsArray, $stop_word);
        }

    return $wordsArray;
}













$string = $_POST["text"];
$sorting = $_POST["sort"];
$limit = $_POST["limit"];

echo "<h2>Text: </h2><section>" . $string . "</section>";

$result = tokenizeWords($string);

$result = wordFrequencies($result);
$index = 0;

if ($sorting == "asc"){
    asort($result);
}

else {
    arsort($result);
}

echo "<table><tr><th>Words</th><th>Frequency</th></tr>";
foreach ($result as $k => $v) {
    if ($index >= $limit){
        break;
    }
    $index++;
    echo "<tr>" . "<td>" . $k . "</td>" . "<td>" . $v . "</td>";
}
echo "</table>";



?>
</body>
</html>
