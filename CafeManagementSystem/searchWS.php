<?php
require('workSlot.php');

class SearchWS {
    private $workSlot;

    public function __construct() {
        $this->workSlot = new WorkSlot();
    }

    public function searchWorkSlots($date, $timeslot) {
        $filteredWorkSlots = $this->workSlot->searchWorkSlot($date, $timeslot);

        if (!empty($filteredWorkSlots)) {
            echo "<h2>Filtered Work Slots:</h2>";
            echo "<table>
                    <tr>
                        <th>Work ID</th>
                        <th>Timeslot</th>
                        <th>Date</th>
                        <th>Chef</th>
                        <th>Cashier</th>
                        <th>Waiter</th>
                    </tr>";

            foreach ($filteredWorkSlots as $slot) {
                echo "<tr>
                        <td>" . $slot["workslot_id"] . "</td>
                        <td>" . $slot["timeslot"] . "</td>
                        <td>" . $slot["date"] . "</td>
                        <td>" . $slot["Chef"] . "</td>
                        <td>" . $slot["Cashier"] . "</td>
                        <td>" . $slot["Waiter"] . "</td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "No work slots found for the given criteria.";
        }
    }
}

$searchWS = new SearchWS();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Work Slot</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('Cafe.jpg'); /* Replace with the actual path of your cafe background */
            background-size: cover;
        }
        .container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
        h2 {
            margin-top: 0;
            font-size: 36px;
            color: #444;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.5); /* Semi-transparent white background for the form */
        }
        label {
            margin-bottom: 10px;
            font-weight: bold;
        }
        select {
            padding: 8px;
            margin-bottom: 15px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #8B4513; /* Use a suitable cafe-themed color */
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #A0522D; /* Darker shade on hover */
        }
        .filtered-slots {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
        .filtered-slots.active {
            display: block; /* Show when active */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Search Work Slot</h2>
        <form method="post" action="searchWS.php">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date">
            <br>
            <label for="timeslot">Time Slot:</label>
            <select name="timeslot">
                <option value="">Select Time Slot</option>
                <option value="morning">Morning</option>
                <option value="afternoon">Afternoon</option>
                <option value="night">Night</option>
            </select>
            <br>
            <input type="hidden" name="action" value="search">
            <button type="submit">Search</button>
        </form>
    </div>
    <div class="filtered-slots">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] === "search") {
            $searchWS->searchWorkSlots($_POST["date"], $_POST["timeslot"]);
        }        
        ?>
    </div>
</body>
</html>