<?php

namespace Bereznii\TeamsConnector\Contracts;

/**
 * Interface CardInterface
 * @package Bereznii\TeamsConnector\Contracts
 */
interface CardInterface
{
    /**
     * To send a message through your Office 365 Connector or incoming webhook,
     * you post a JSON payload to the webhook URL. Typically this payload will
     * be in the form of an Office 365 Connector Card.
     *
     * Basics for using connectors and webhooks.
     * @link(https://docs.microsoft.com/en-us/microsoftteams/platform/webhooks-and-connectors/how-to/connectors-using)
     *
     * Documentation for AdaptiveCards.
     * @link(https://docs.microsoft.com/en-us/outlook/actionable-messages/adaptive-card)
     *
     * Sandbox for building AdaptiveCards.
     * @link(https://messagecardplayground.azurewebsites.net/)
     *
     * @return array
     */
    public function getPayload(): array;
}
