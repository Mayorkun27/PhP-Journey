<?php
    // A regular expression is a sequence of characters that forms a search pattern. They  can be used to perform all types of text search and text replace operations.

    // In PHP, regular expressions are strings composed of delimiters, a pattern and optional modifiers.

    // $exp = "/w3schools/i";
    // In the example above,"/" is the delimiter, "w3schools" is the pattern that is being searched for, and "i" is a modifier that makes the search case-insensitive.

    // The delimiter can be any character that is not a letter, number, backslash or space. The most common delimiter is the forward slash (/), but when your pattern contains forward slashes it is convenient to choose other delimiters such as # or ~.

    // PHP provides a variety of functions that allow you to use regular expressions. The most common functions are:

    // preg_match() <<=>>	Returns 1 if the pattern was found in the string and 0 if not
    // preg_match_all() <<=>>	Returns the number of times the pattern was found in the string, which may also be 0
    // preg_replace() <<=>> Returns a new string where matched patterns have been replaced with another string

    $str = "Visit W3Schools";
    $pattern = "/a/i";
    var_dump(preg_match($pattern, $str));

    $str = "The rain in SPAIN falls mainly on the plains.";
    $pattern = "/spain/";
    echo preg_match_all($pattern, $str);

    $str = "Visit Microsoft!";
    $pattern = "/microsoft/i";
    echo preg_replace($pattern, "Oluwamayokun.com", $str);

?>