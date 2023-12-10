<?php

function main($argc, $argv) {
    validateCommandLineArguments($argc, $argv);
    
    $reviews = getJsonData("reviews.json", "Error reading reviews file");
    $movies = getJsonData("movies.json", "Error reading movies file");

    $result = '';
    foreach ($reviews as $review) {
        $movieData = findMovieData($review['title'], $movies);
        $starRating = convertScoreToStar($review['score']);
        $tweet = generateTweet($movieData['name'], $movieData['year'], $review['review'], $starRating);
        $result .= $tweet . " \n";
    }

    $result = rtrim($result);
    echo $result;
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
/**
* to read JSON data from files and store them in variables.
**/
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

function findMovieData($title, $movies) {
    foreach ($movies as $movie) {
        if ($title == $movie['title']) {
            return ['name' => $title, 'year' => isset($movie['year']) ? sprintf("(%d)", $movie['year']) : ''];
        }
    }

    return ['name' => $title, 'year' => ''];
}

 /**
 * Takes score as input and have to divide input from 20
 * as need to show rating out of 5 stars, and return the final star rating
 **/
function convertScoreToStar($score) {
    $rating = (float) $score / 20;
    $starRating = str_repeat("★", (int) $rating);
    $decimalValue = $rating - (float) ((int) $rating);

    if ($decimalValue <= 0.5 && $decimalValue != 0) {
        $starRating .= "½";
    } elseif ($decimalValue != 0) {
        $starRating .= "★";
    }

    return $starRating;
}

 /**
 * Function to take 4 string parameters to construct the tweet
 * according to the tweet length and to fulfill the given requirements
 * and then return the final tweet
 **/
function generateTweet($movieName, $movieYear, $review, $starRating) {
    $tweet = sprintf("%s %s: %s %s", $movieName, $movieYear, $review, $starRating);

    if (strlen($tweet) > 140) {
        $movieName = (strlen($movieName) > 25) ? substr($movieName, 0, 25) : $movieName;
        $tweet = sprintf("%s%s: %s %s", $movieName, $movieYear, $review, $starRating);
    }

    if (strlen($tweet) > 140) {
        $reviewLength = (strlen($movieYear) > 0) ? 136 - strlen($movieName) - strlen($movieYear) - mb_strlen($starRating) : 137 - strlen($movieName) - mb_strlen($starRating);
        $review = mb_substr($review, 0, $reviewLength);
        $tweet = sprintf("%s%s: %s %s", $movieName, $movieYear, $review, $starRating);
    }

    return $tweet;
}

main($argc, $argv);