// don't know php, made by chatgpt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $message = $_POST['message'];

  // Create the message payload
  $payload = json_encode([
    'username' => 'Inquiry Bot',
    'content' => "New Inquiry from $name: $message"
  ]);

  // Send the payload to the Discord webhook URL
  $webhookUrl = 'YOUR_DISCORD_WEBHOOK_URL';
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
