<section class="historical-data">
    <h2>Check Historical Data</h2>
    <form method="post">
        <div class="mb-3">
            <label for="location" class="form-label">Location:</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="mb-3">
            <label for="startDate" class="form-label">Start Date:</label>
            <input type="date" class="form-control" id="startDate" name="startDate" required>
        </div>
        <div class="mb-3">
            <label for="endDate" class="form-label">End Date:</label>
            <input type="date" class="form-control" id="endDate" name="endDate" required>
        </div>
        <button type="submit" class="btn btn-primary">Check</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $location = $_POST["location"];
        $startDate = $_POST["startDate"];
        $endDate = $_POST["endDate"];

        function fetchWeatherData() {
            return [
                ['wind_speed' => 110, 'pressure' => 940, 'precipitation' => 3],
                ['wind_speed' => 90, 'pressure' => 960, 'precipitation' => 6],
                ['wind_speed' => 105, 'pressure' => 945, 'precipitation' => 4],
                ['wind_speed' => 105, 'pressure' => 940, 'precipitation' => 3],
                ['wind_speed' => 80, 'pressure' => 978, 'precipitation' => 8],
                ['wind_speed' => 98, 'pressure' => 910, 'precipitation' => 4],
            ];
        }

        function predictCycloneProbability($weatherData) {
            return 0.6;
        }

        function checkHistoricalFloodData($location, $startDate, $endDate) {
            return 15;
        }

        $weatherData = fetchWeatherData();
        $cyclone_threshold_windspeed = 100;
        $flood_threshold_precipitation = 5;

        $cycloneData = array_filter($weatherData, function($weather) use ($cyclone_threshold_windspeed) {
            return $weather['wind_speed'] >= $cyclone_threshold_windspeed && $weather['pressure'] <= 950;
        });

        $floodData = array_filter($weatherData, function($weather) use ($flood_threshold_precipitation) {
            return $weather['precipitation'] >= $flood_threshold_precipitation;
        });

        if (!empty($cycloneData)) {
            echo "<p>Cyclone predicted.</p>";
        } else {
            echo "<p>No cyclone predicted.</p>";
        }

        if (!empty($floodData)) {
            echo "<p>Flood predicted.</p>";
        } else {
            echo "<p>No flood predicted.</p>";
        }

        $cycloneProbability = predictCycloneProbability($weatherData);
        if ($cycloneProbability > 0.5) {
            echo "<p>Cyclone predicted with probability $cycloneProbability.</p>";
        } else {
            echo "<p>No cyclone predicted.</p>";
        }

        $historicalFloodCount = checkHistoricalFloodData($location, $startDate, $endDate);
        if ($historicalFloodCount > 10) {
            echo "<p>High risk of flood based on historical data.</p>";
        } else {
            echo "<p>No flood predicted based on historical data.</p>";
        }
    }
    ?>
</section>
