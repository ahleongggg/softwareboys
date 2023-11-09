<?php
require('workSlot.php');

class CreateWS {
    public function createWorkSlot($date, $timeslot, $conn) {
        $workSlot = new WorkSlot($conn);
        
        $result = $workSlot->createWorkSlot($date, $timeslot);
        
        if ($result) {
            echo "<h2>Work Slot Created and Saved to Database:</h2>";
            echo "<p><strong>Date:</strong> $date</p>";
            echo "<p><strong>Time Slot:</strong> $timeslot</p>";

            header("Location: Owner.html");
            exit();
        } else {
            echo "Error: Work Slot creation failed.";
        }
    }
}

$createWS = new CreateWS();

// Check submission of form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && $_POST["action"] === "create") {
        if (isset($_POST["date"]) && isset($_POST["timeslot"])) {
            // Retrieve form data
            $date = $_POST['date'];
            $timeslot = $_POST['timeslot'];

            // Call the createWorkSlot function and pass $conn
            $createWS->createWorkSlot($date, $timeslot, $conn);
        } else {
            echo "Please fill in all fields.";
        }
    }
}
?>