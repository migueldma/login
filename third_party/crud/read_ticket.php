<?php
$ticket_hash = isset($_REQUEST['ticket_hash']) ? $_REQUEST['ticket_hash'] : 0;
if ($ticket_hash == 0) {
    die();
}

require_once ('config.php');
$statement = $conn->prepare("SELECT * FROM Tickets WHERE ticket_hash = $ticket_hash");
$statement->execute();
$ticket = $statement->fetchAll();
if ($statement->rowCount() == 0) {
    die();
}
$ticket = json_encode($ticket, TRUE);
echo $ticket;
die();