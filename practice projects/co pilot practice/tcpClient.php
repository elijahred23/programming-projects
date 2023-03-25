<?php

$host = "127.0.0.1"; // The IP address of the server
$port = 1234; // The port number to listen on

// Create a new TCP/IP socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

// Connect to the server
socket_connect($socket, $host, $port);

// Read the HTML from the server
$html = "";
while ($buffer = socket_read($socket, 1024)) {
    $html .= $buffer;
}

// Close the socket
socket_close($socket);

// Print the HTML
echo $html;
