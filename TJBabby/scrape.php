<?php
// Send email notification when a new car is found
function sendEmailNotification($carDetails) {
    $to = 'adelekeoluwamayokun27@gmail.com'; // Replace with your email
    $subject = 'New Car Alert: ' . $carDetails['brand'];
    $message = "
        <h1>New Car Found!</h1>
        <p>Brand: {$carDetails['brand']}</p>
        <p>Year: {$carDetails['year']}</p>
        <p>Price: {$carDetails['price']}</p>
        <p><a href='{$carDetails['url']}'>View the Car</a></p>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@example.com" . "\r\n";

    mail($to, $subject, $message, $headers);
}

// Scrape the website and search for matching cars
function scrapeAndNotify() {
    // User search criteria
    $brand = "benz"; // Must match your target brand
    $maxPrice = 25000;

    // URL of the Serbian car website
    $url = "https://www.polovniautomobili.com/";

    // Use cURL to fetch the website content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $htmlContent = curl_exec($ch);
    curl_close($ch);

    // Load HTML and parse it
    $dom = new DOMDocument();
    @$dom->loadHTML($htmlContent); // Suppress warnings for malformed HTML
    $xpath = new DOMXPath($dom);

    // Query for car listings
    $cars = $xpath->query("//section[contains(@class, 'uk-width-large-1-6')]");

    echo "Number of cars found: " . $cars->length . "<br>";

    foreach ($cars as $car) {
        // Extract car details
        $carTitleNode = $xpath->query(".//h3", $car)->item(0);
        $carBrand = $carTitleNode ? trim($carTitleNode->textContent) : 'Unknown Brand';

        $carYearNode = $xpath->query(".//span[contains(@class, 'year')]", $car)->item(0);
        $carYear = $carYearNode ? trim($carYearNode->textContent) : 'Unknown Year';

        $carPriceNode = $xpath->query(".//div[contains(@class, 'price')]", $car)->item(0);
        $carPrice = $carPriceNode ? trim(str_replace(['€', ','], '', $carPriceNode->textContent)) : 'Unknown Price';

        $carUrlNode = $xpath->query(".//a[contains(@class, 'carThumbHolder')]", $car)->item(0);
        $carUrl = $carUrlNode ? 'https://www.polovniautomobili.com' . $carUrlNode->getAttribute('href') : 'Unknown URL';

        // Debugging output
        echo "Brand: $carBrand, Year: $carYear, Price: $carPrice, URL: $carUrl<br>";

        // Match the search criteria
        $carBrandNormalized = iconv('UTF-8', 'ASCII//TRANSLIT', $carBrand);
        $brandNormalized = iconv('UTF-8', 'ASCII//TRANSLIT', $brand);

        if (stripos($carBrandNormalized, $brandNormalized) !== false && $carPrice <= $maxPrice) {
            sendEmailNotification([
                'brand' => $carBrand,
                'year' => $carYear,
                'price' => $carPrice,
                'url' => $carUrl
            ]);
        }
    }
}

// Call the function to start scraping and notifying
scrapeAndNotify();
?>
