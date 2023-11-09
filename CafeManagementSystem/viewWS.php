
<?php
require('workSlot.php');
class ViewWS {
    public function displayWorkSlots() {
        $workSlot = new WorkSlot();
        $workSlots = $workSlot->viewWorkSlots();

        if (!empty($workSlots)) {
            echo "<h2>Work Slots:</h2>";
            echo "<table>
                    <tr>
                        <th>Work ID</th>
                        <th>Timeslot</th>
                        <th>Date</th>
                        <th>Chef</th>
                        <th>Cashier</th>
                        <th>Waiter</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>";

            foreach ($workSlots as $row) {
                echo "<tr>
                        <td>" . $row["workslot_id"] . "</td>
                        <td>" . $row["timeslot"] . "</td>
                        <td>" . $row["date"] . "</td>
                        <td>" . $row["Chef"] . "</td>
                        <td>" . $row["Cashier"] . "</td>
                        <td>" . $row["Waiter"] . "</td>
                        <td><a href='deleteWS.php?workslot_id=" . $row['workslot_id'] . "'>Delete</a></td>
                        <td><a href='updateWS.php?workslot_id=" . $row['workslot_id'] . "'>Update</a></td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "No work slots available.";
        }
    }
}

$viewWS = new ViewWS();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Work Slots</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('Cafe.jpg'); 
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $viewWS->displayWorkSlots(); // This line triggers the display of work slots
        ?>
    </div>
</body>
</html>