<?php
class Controller {
    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
            $action = $_POST["action"];
            
            switch ($action) {
                case "create":
                    header("Location: CreateWS.html"); 
                    break;
                case "view":
                    header("Location: viewWS.php");
                    break;
                case "update":
                    header("Location: UpdateWS.html");
                    break;
                case "delete":
                    header("Location: deleteWS.php");
                    break;
                case "search":
                    header("Location: searchWS.php");
                    break;
                default:
                    break;
            }
        }
    }
}
$controller = new Controller();
$controller->handleRequest();

?>
