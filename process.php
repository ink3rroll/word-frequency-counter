<?php



function removeWordFromArray(array $wordsArray, string $wordToRemove): array {
    return array_filter($wordsArray, function($word) use ($wordToRemove) {
        return $word !== $wordToRemove;
    });
}

function wordFrequencies(array $wordsArray): array {
    $wordFrequency = [];
    foreach($wordsArray as $word) {
        $wordFrequency[$word] = $wordFrequency[$word] + 1; 
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
        'on',
        'once',
        'only',
        'or',
        'other',
        'ought',
        'our',
        'ours',
        'ourselves',
        'out',
        'over',
        'own',
        'same',
        "shan't",
        'she',
        "she'd",
        "she'll",
        "she's",
        'should',
        "shouldn't",
        'so',
        'some',
        'such',
        'than',
        'that',
        "that's",
        'the',
        'their',
        'theirs',
        'them',
        'themselves',
        'then',
        'there',
        "there's",
        'these',
        'they',
        "they'd",
        "they'll",
        "they're",
        "they've",
        'this',
        'those',
        'through',
        'to',
        'too',
        'under',
        'until',
        'up',
        'very',
        'was',
        "wasn't",
        'we',
        "we'd",
        "we'll",
        "we're",
        "we've",
        'were',
        "weren't",
        'what',
        "what's",
        'when',
        "when's",
        'where',
        "where's",
        'which',
        'while',
        'who',
        "who's",
        'whom',
        'why',
        "why's",
        'with',
        "won't",
        'would',
        "wouldn't",
        'you',
        "you'd",
        "you'll",
        "you're",
        "you've",
        'your',
        'yours',
        'yourself',
        'yourselves',
        'zero',
        ''];

        foreach ($stop_words as $stop_word) {
            $wordsArray = removeWordFromArray($wordsArray, $stop_word);
        }

    return $wordsArray;
}

$string = "for being a judge on Street Dance Competition during Science Month 2024 with the theme “Integrated Approach in Science and Technology for Sustainable Future” held at Palawan State University Field.";

$new = tokenizeWords($string);

foreach ($new as $word) {
    echo $word ."\n";
}

$new = wordFrequencies($new);
print_r($new);


?>