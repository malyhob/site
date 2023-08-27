// don't know php, made by chatgpt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $message = $_POST['message'];

  // Create the message payload
  $payload = json_encode([
    'username' => 'inquiry',
    'content' => "inquiry from some kid called $name: $message"
  ]);

  // Send the payload to the Discord webhook URL
  $webhookUrl = 'https://discord.com/api/webhooks/1145390814290255972/HtbBWkRZ-FKJ0W-E3zBrYZjJ69DmjC6lFF6ygwNfLk47aZD4YXQTiHrgIe6MRuHcszNg'; // i swear if you use this i will track your ip down and chop your head off
  $ch = curl_init($webhookUrl);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
  curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);

  // Respond to the client
  if ($response === false) {
    http_response_code(500);
  } else {
    http_response_code(200);
  }
} else {
  http_response_code(405); // Method Not Allowed
}

error: function(xhr, status, error) {
  console.error(error);
  alert('Error sending inquiry. Check console for details.');
}
