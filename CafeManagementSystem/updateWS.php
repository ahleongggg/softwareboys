<?php
require('workSlot.php');

class UpdateWS {
    private $workSlot;

    public function __construct() {
        $this->workSlot = new WorkSlot();
    }

    public function updateWorkSlot($workslot_id, $date, $timeslot) {
        $newData = [
            "workslot_id" => $workslot_id,
            "date" => $date,
            "timeslot" => $timeslot,
        ];

        $result = $this->workSlot->updateWorkSlot($workslot_id, $newData);

        if ($result) {
            header("Location: viewWS.php");
            exit();
        } else {
            echo "Error: Work Slot update failed.";
        }
    }
}

$updateWS = new UpdateWS();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] === "update") {
    $workslot_id = $_POST["workslot_id"];
    $date = $_POST["date"];
    $timeslot = $_POST["timeslot"];

    $updateWS->updateWorkSlot($workslot_id, $date, $timeslot);
}
?>