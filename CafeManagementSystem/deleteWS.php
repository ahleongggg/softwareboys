<?php
require('workSlot.php');

class DeleteWS {
    public function __construct() {
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["workslot_id"])) {
            $workSlot = new WorkSlot();

            $workslot_id = $_GET["workslot_id"];

            // Call the deleteWorkSlot function
            $result = $workSlot->deleteWorkSlot($workslot_id);

            if ($result) {
                echo "Work Slot deleted successfully.";
            } else {
                echo "Error deleting work slot.";
            }

            // Redirect back to the previous page (viewWS.php)
            header("Location: viewWS.php");
            exit();
        } else {
            echo "Invalid request or missing 'id' parameter.";
        }
    }
}

// Create an instance of the class to execute the logic
$deleteWS = new DeleteWS();
?>
