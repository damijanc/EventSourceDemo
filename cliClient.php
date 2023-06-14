<?php

use GuzzleHttp\Client;

require_once __DIR__.'/vendor/autoload.php';

$client = new Client([
    'base_uri' => 'http://nginx',
    'headers' => [
        'Accept' => 'text/event-stream',
        'Cache-Control' => 'no-cache',
    ],
]);

function getOffers($client) {
    $response = $client->request('GET', '/events', [
        'stream' => true,
    ]);
    $body = $response->getBody();

    $buffer = '';

    while (!$body->eof()) {
        $buffer .= $body->read(1);

        if (!preg_match('/\n\n/', $buffer)) {
            usleep(1);

            continue;
        }

        [$message, $remaining] = preg_split('/\n\n/', $buffer, 2);

        [$eventType, $data] = preg_split('/: /', $message, 2);
        $data = trim($data);

        if ('END-OF-STREAM' === $data) {
            return;
        }

        yield [
            'eventType' => $eventType,
            'data' => $data,
        ];

        $buffer = $remaining;
    }
}

echo 'Fetching offers'.PHP_EOL;

foreach (getOffers($client) as $event) {
    var_dump($event);
}

echo 'Done fetching offers'.PHP_EOL;
