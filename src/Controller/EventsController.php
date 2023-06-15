<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\Routing\Annotation\Route;

class EventsController extends AbstractController
{
    #[Route('/events', name: 'app_events_controller')]
    public function index(): StreamedResponse
    {
        return new StreamedResponse(
            function () {
                for ($i = 0; $i < 1000; $i++) {
                    $this->sendData(json_encode([
                        'message' => [
                            'id' => sprintf('id_%d', $i),
                        ],
                    ]));

                    sleep(1);
                }

                $this->sendData('END-OF-STREAM');
            },
            StreamedResponse::HTTP_OK,
            [
                'Content-Type' => 'text/event-stream',
                'Cache-Control' => 'no-cache',
                'Connection' => 'keep-alive',
                'X-Accel-Buffering' => 'no',
            ]
        );
    }

    private function sendData(string $data): void
    {
        if (connection_aborted()) {
            throw new \Exception('connection closed');
        }

        echo sprintf('data: %s', $data);
        echo "\n\n";

        flush();
    }
}
