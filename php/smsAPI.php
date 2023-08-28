<?php
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md
    require_once '/path/to/vendor/autoload.php';
    use Twilio\Rest\Client;

    $sid    = "ACba8836991cafb32efd11943139ce9b59";
    $token  = "[AuthToken]";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("+254794839366", // to
        array(
            "from" => "+18158699867",
            "body" => hello kelvin
        )
      );

print($message->sid);