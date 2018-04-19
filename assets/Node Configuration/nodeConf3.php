<?php 

$client = new Mosquitto\Client();
$client->onConnect('connect'); 
$client->onDisconnect('disconnect'); 
$client->onSubscribe('subscribe'); 
$client->onMessage('message'); 
$client->connect("localhost", 1883, 60); 
$client->subscribe('/#', 1);


while (true) { 
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "data2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql1 = "SELECT * FROM relay WHERE id=1";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
  //output data of each row
  while ($row = $result->fetch_assoc()){
    $client->loop();
    $mid = $client->publish('/data2/relay1', $row["status"]);
    echo "Sent message ID: {$mid}\n";
    $client->loop();
    sleep(2);
    echo "id relay: " . $row["id"] . " - Status Relay: " . $row["status"];
  }
}
else
{
  echo "0 results";
}
$conn->close();
} 

 $client->disconnect(); 
 unset($client); 

  function connect($r) { 
   echo "I got code {$r}\n"; 
 } 

  function subscribe() { 
   echo "Subscribed to a topic\n"; 
 } 

  function message($message) { 
  printf("\nGot a message ID %d on topic %s with payload: %s\n\n", $message->mid, $message->topic, $message->payload);

  $servername = "localhost";
  $username = "root";
  $password = "1234";
  $dbname = "data2";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  if ($message->topic=="/data2/suhu3"){
    $sql = "INSERT INTO t_suhu (topik, suhu, waktu, kode_tanaman)
    VALUES ('$message->topic', '$message->payload', NOW(), 'T-01-003')";
  }

  if ($message->topic=="/data2/dew3"){
    $sql = "INSERT INTO t_dew (topik, dew, waktu, kode_tanaman)
    VALUES ('$message->topic', '$message->payload', NOW(), 'T-01-003')";
  }

  if ($message->topic=="/data2/tanah3"){
    $sql = "INSERT INTO t_tanah (topik, tanah, waktu, kode_tanaman)
    VALUES ('$message->topic', '$message->payload', NOW(), 'T-01-003')";
  }

  if ($message->topic=="/data2/udara3"){
    $sql = "INSERT INTO t_udara (topik, udara, waktu, kode_tanaman)
    VALUES ('$message->topic', '$message->payload', NOW(), 'T-01-003')";
  }  

    if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully\n";
}

  $conn->close();

 } 

  function disconnect() { 
   echo "Disconnected cleanly\n"; 
 } 