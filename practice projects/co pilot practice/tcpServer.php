<?php


$host = "127.0.0.1"; // The IP address of the server
$port = 1234; // The port number to listen on

// Read the HTML file
$html = file_get_contents("index.html");

// Create a new TCP/IP socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

// Bind the socket to the host and port
socket_bind($socket, $host, $port);

// Start listening for incoming connections
socket_listen($socket);

echo "Server started on $host:$port\n";

// Accept incoming connections and handle them
while (true) {
    $client = socket_accept($socket);

    // Send the HTML file to the client
    socket_write($client, $html, strlen($html));

    // Close the client socket
    socket_close($client);
}
