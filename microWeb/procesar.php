<?php
session_start();
$usuario = $_POST['usuario'];
$items = array();

// Verificar que el array cantidad existe
if (isset($_POST['cantidad']) && is_array($_POST['cantidad'])) {
    // Recorrer los valores de cantidad enviados por el formulario
    foreach ($_POST['cantidad'] as $id => $cantidad) {
        if ($cantidad > 0) {
            $item = array();
            $item['id'] = $id;
            $item["cantidad"] = $cantidad;
            array_push($items, $item);
        }
    }
}

// Verificar que hay items antes de crear la orden
if (count($items) > 0) {
    $orden = array();
    $orden['usuario'] = $usuario;
    $orden['items'] = $items;
    $json = json_encode($orden);
    
    $url = 'http://ordenes:3003/ordenes';
    
    // Inicializar cURL
    $ch = curl_init();
    
    // Configurar opciones de cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Ejecutar la solicitud POST
    $response = curl_exec($ch);
    
    // Cerrar la conexión cURL
    curl_close($ch);
    
    // Manejar la respuesta
    if ($response === false) {
        header("Location: index.html");
        exit;
    }
}

header("Location: usuario.php");
exit;
?>
