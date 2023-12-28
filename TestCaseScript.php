<?php
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
?>