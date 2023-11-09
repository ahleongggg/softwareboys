<?php
$servername = "localhost"; // Change to your MySQL server name
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "ahleong_cafe_db"; // Name of the database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

class WorkSlot {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "ahleong_cafe_db");

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function createWorkSlot($date, $timeslot) {
        $date = mysqli_real_escape_string($this->conn, $date);
        $timeslot = mysqli_real_escape_string($this->conn, $timeslot);

        $sql = "INSERT INTO workslot (date, timeslot) VALUES ('$date', '$timeslot')";

        if ($this->conn->query($sql) === TRUE) {
            return true; 
        } else {
            return false;
        }
    }

    public function viewWorkSlots() {
        $sql = "SELECT * FROM workslot";
        $result = $this->conn->query($sql);

        $workSlots = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $workSlots[] = $row;
            }
        }

        return $workSlots;
    }

    public function updateWorkSlot($workslot_id, $newData) {
        $workslot_id = mysqli_real_escape_string($this->conn, $workslot_id);
        $newData['date'] = mysqli_real_escape_string($this->conn, $newData['date']);
        $newData['timeslot'] = mysqli_real_escape_string($this->conn, $newData['timeslot']);
    
        $sql = "UPDATE workslot SET date = '{$newData['date']}', timeslot = '{$newData['timeslot']}' WHERE workslot_id = '$workslot_id'";
    
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteWorkSlot($workslot_id) {
        $workslot_id = mysqli_real_escape_string($this->conn, $workslot_id);

        $sql = "DELETE FROM workslot WHERE workslot_id = $workslot_id";

        if ($this->conn->query($sql) === TRUE) {
            echo "Work slot deleted successfully";
            return true; 
        } else {
            return false; 
        }
    }

    public function searchWorkSlot($date, $timeslot) {
        $date = $this->conn->real_escape_string($date);
        $timeslot = $this->conn->real_escape_string($timeslot);

        $sql = "SELECT * FROM workslot WHERE date = '$date' AND timeslot = '$timeslot'";
        $result = $this->conn->query($sql);

        $workSlots = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $workSlots[] = $row;
            }
        }

        return $workSlots;
    }
}
?>
