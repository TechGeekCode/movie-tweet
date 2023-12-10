<?php

require_once 'script.php'; 

// Test Case 1
$result1 = generateTweet("Star Wars ", "(1977)", "Great", "★★★★");
$expectedResult1 = "Star Wars (1977): Great, this film was ★★★★";
assert($result1 === $expectedResult1);

// Test Case 2
$result2 = generateTweet("Star Wars The Force Awake ", "(2015)", "A long time ago in a galaxy far far away someone made the best sci-fi film of all time. Then some chap", "★★½");
$expectedResult2 = "Star Wars The Force Awake (2015): A long time ago in a galaxy far far away someone made the best sci-fi film of all time. Then some chap ★★½";
assert($result2 === $expectedResult2);

// Test Case 3
$result3 = generateTweet("Metropolis","", "Another movie about a robot. Very strong futuristic look. But also very very old. Hard to understand what was happening becaus", "★");
$expectedResult3 = "Metropolis: Another movie about a robot. Very strong futuristic look. But also very very old. Hard to understand what was happening becaus ★";
assert($result3 === $expectedResult3);

// Test Case 4
$result4 = generateTweet("Dr. Strangelove or How I Learned to Stop Worrying and Love the Bomb ", "(1964)", "Hilarious Kubrick satire", "★★★★★");
$expectedResult4 = "Dr. Strangelove or How I Learned to Stop Worrying and Love the Bomb (1964): Hilarious Kubrick satire ★★★★★";
assert($result4 === $expectedResult4);

// Test Case 5
$result5 = generateTweet("Plan 9 from outer space ","(1959)", "So bad it's bad", "½");
$expectedResult5 = "Plan 9 from outer space (1959): So bad it's bad ½";
assert($result5 === $expectedResult5);

echo "All test cases passed!\n";

?>
