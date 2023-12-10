<?php

function main($argc, $argv) {
    validateCommandLineArguments($argc, $argv);
    
    $reviews = getJsonData("reviews.json", "Error reading reviews file");
    $movies = getJsonData("movies.json", "Error reading movies file");

}

// check file validation
function validateCommandLineArguments($argc, $argv) {
   if ($argc != 3 && $argv[0] != "MovieRatingTest.php") {
        echo "Expected command is: php script.php reviews.json movies.json\n";
        exit(1);
    } elseif (@$argv[1] != "reviews.json" && $argv[0] != "MovieRatingTest.php") {
        echo "Expected order is: php script.php reviews.json movies.json\n";
        exit(1);
    }
}

// to read JSON data from files and store them in variables.
function getJsonData($fileName, $errorMessage) {
    $jsonData = file_get_contents($fileName);
    if ($jsonData === false) {
        echo "$errorMessage\n";
        exit(1);
    }

    $data = json_decode($jsonData, true);
    if ($data === null) {
        echo "Error parsing $fileName\n";
        exit(1);
    }

    return $data;
}

main($argc, $argv);