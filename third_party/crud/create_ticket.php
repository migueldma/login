<?php
$jugadas = isset($_REQUEST['jugadas']) ? $_REQUEST['jugadas'] : array();

if (empty($jugadas)) {
    die();
}

try {
    require_once('config.php');
    $last_hash = $conn->prepare("SELECT MAX(ticket_hash) FROM Tickets");
    $last_hash->execute();
    $last_hash = $last_hash->fetchColumn();
    $last_hash = is_numeric($last_hash) ? $last_hash + 1 : 501;

    $conn->beginTransaction();
    $sql = "INSERT INTO Tickets(ticket_hash, fecha_sorteo, usuario_creador, status_ticket, terminal)
            VALUES($last_hash, '09/12/2017 06:00:00', 1, 'Las jugadas no han cerrado', 'Banca Maria')";
    $conn->exec($sql);
    $ticket_id = $conn->lastInsertId();
    $conn->commit();
    foreach ($jugadas as $jugada) {
        $jugada[] = $ticket_id;
        $jugada[] = 'No ha cerrado';
        $statement = $conn->prepare("
            INSERT INTO TicketsJugadas(loteria, fecha_jugada, apuesta, monto_apostado, monto_pagar, ticket_id, status_jugada)
            VALUES(?, ?, ?, ?, ?, ?, ?)"
        );
        $statement->execute($jugada);
    }
    $ma = $conn->prepare("SELECT SUM(apuesta) FROM TicketsJugadas WHERE ticket_id = $ticket_id");
    $ma->execute();
    $monto_apostado_total = $ma->fetchColumn();

    date_default_timezone_set('America/Santo_Domingo');
    $current_date = date('d/m/Y');

    echo json_encode(array(
        "Ticket #".sprintf('%012d', $last_hash),
        "Fecha: ".$current_date,
        "Apuesta: RD".number_format($monto_apostado_total, 2)
    ));
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
}
die();