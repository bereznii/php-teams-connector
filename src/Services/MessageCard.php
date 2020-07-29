<?php

namespace Bereznii\TeamsConnector\Services;

use Bereznii\TeamsConnector\Contracts\CardInterface;

/**
 * Class MessageCard
 *
 * @package Bereznii\TeamsConnector\Services
 * @author Dmytro Bereznii <bereznii.d@gmail.com>
 */
class MessageCard implements CardInterface
{
    /**
     * @var string
     */
    private $appName;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $context;

    /**
     * @var array
     */
    private $config;

    /**
     * @var array
     */
    private $imageUrl;

    /**
     * TeamsRequest constructor.
     */
    public function __construct()
    {
        $this->config = (new Config())->get();
    }

    /**
     * @param string $appName
     * @return MessageCard
     */
    public function setAppName(string $appName): MessageCard
    {
        $this->appName = $appName;
        return $this;
    }

    /**
     * @param string $message
     * @return MessageCard
     */
    public function setMessage(string $message): MessageCard
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @param string $status
     * @return MessageCard
     */
    public function setStatus(string $status): MessageCard
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param string $context
     * @return MessageCard
     */
    public function setContext(string $context): MessageCard
    {
        $this->context = $context;
        return $this;
    }

    /**
     * @param string $imageUrl
     * @return MessageCard
     */
    public function setImage(string $imageUrl): MessageCard
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    /**
     * @return array
     */
    public function getPayload(): array
    {
        return [
            "@context" => "http://schema.org/extensions",
            "@type" => "MessageCard",
            "themeColor" => "fcb813",
            "summary" => 'Уведомление',
            'sections'   => [
                [
                    'activityTitle' => $this->appName,
                    'activitySubtitle' => 'Уведомление',
                    "activityImage" => $this->imageUrl,
                    "facts" => [
                        [
                            "name" => "Статус:",
                            "value" => $this->config['statusMessages'][$this->status]
                        ],
                        [
                            "name" => "Сообщение:",
                            "value" => $this->message
                        ],
                        [
                            "name" => "Контекст:",
                            "value" => $this->context
                        ],
                        [
                            "name" => "Время:",
                            "value" => date('l, Y-m-d H:i:s O')
                        ],
                    ],
                    'markdown' => true
                ]
            ]
        ];
    }
}
