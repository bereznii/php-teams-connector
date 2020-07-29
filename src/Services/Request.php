<?php

namespace Bereznii\TeamsConnector\Services;

use Bereznii\TeamsConnector\Contracts\CardInterface;

/**
 * Class Request
 *
 * @package Bereznii\TeamsConnector\Services
 * @author Dmytro Bereznii <bereznii.d@gmail.com>
 */
class Request
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var string
     */
    private $webhookUrl;

    /**
     * @var CardInterface $card
     */
    private $card;

    /**
     * Contain answer from Microsoft Teams Connector Incoming Webhook URL.
     *
     * @var bool|string
     */
    private $response = false;

    /**
     * TeamsRequest constructor.
     *
     * @param CardInterface $card
     * @param string webhookUrl
     */
    public function __construct(CardInterface $card, string $webhookUrl)
    {
        $this->card = $card;
        $this->webhookUrl = $webhookUrl;
        $this->config = (new Config())->get();
    }

    /**
     * Get answer from Microsoft Teams Connector Incoming Webhook URL.
     *
     * @return bool|string
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Send notification message to Microsoft Teams via Connector Incoming Webhook.
     *
     * @return bool result of request
     */
    public function send(): bool
    {
        return $this->post();
    }

    /**
     * @return bool
     */
    private function post(): bool
    {
        $payload = $this->card->getPayload();

        $json = json_encode($payload);

        $options = [
            CURLOPT_POST            => true,
            CURLOPT_POSTFIELDS      => $json,
            CURLOPT_HTTPHEADER      => [
                'Content-Type:application/json',
                'Content-Length: ' . strlen($json)
            ],
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CONNECTTIMEOUT  => 5,
            CURLOPT_TIMEOUT         => 15
        ];

        return $this->executeRequest($this->webhookUrl, $options);
    }

    /**
     * @param string $url
     * @param array $options
     * @return bool
     */
    private function executeRequest(string $url, array $options): bool
    {
        $curl = curl_init($url);

        if (is_resource($curl)) {
            curl_setopt_array($curl, $options);
            $this->response = curl_exec($curl);
            curl_close($curl);
        }

        return $this->response === '1';
    }
}
