# movie-tweet

Following are the files in the project:

- `reviews.json` — this file has the list of all new employee reviews we have yet to tweet about.

- `movies.json` — this file contains a list of the movies we've watched, and information about that movie.

- `tests.json` — this file contains a list of expected output "tweets"

- `script.php` — An Application that meets the following requirements:
For each review in the input review data, output a "tweet" of that review, which should follow these rules:

- Tweets should follow the format `Movie Title (year): Review of the movie ★★★★½`
- If the year cannot be found, it should be omitted
- Tweets may not have more than 140 characters
- If the tweet would go over this limit, the movie title should be trimmed to 25 characters
- If the tweet is still over the limit, then the review text should be shortened too until the tweet is exactly 140 characters
- The score should be presented as Unicode stars (★), using a "five star rating" with halves (½)

An example to run this application:

php script.php reviews.json movies.json

## Test Cases

- `MovieRatingTest.php` — this file contains test cases that meets the expected result.

An example to run this test cases:

php MovieRatingTest.php

