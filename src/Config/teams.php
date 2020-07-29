<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Microsoft Teams Connector Incoming Webhook URL
    |--------------------------------------------------------------------------
    */
    'incoming_webhook_url' => '',

    /*
    |--------------------------------------------------------------------------
    | activityImage
    |--------------------------------------------------------------------------
    |
    | Icon to display for each log type.
    |
    */
    'activityImage' => '',

    /*
    |--------------------------------------------------------------------------
    | Status messages
    |--------------------------------------------------------------------------
    |
    | @link(https://tools.ietf.org/html/rfc5424)
    |
    | Status messages to display for each log type. Provides the eight
    | logging levels defined in the RFC 5424 specification: emergency,
    | alert, critical, error, warning, notice, info and debug.
    |
    */
    'statusMessages' => [
        'EMERGENCY' => '<span style="color:#000000"><b>EMERGENCY</b></span>',
        'ALERT'     => '<span style="color:#80000c"><b>ALERT</b></span>',
        'CRITICAL'  => '<span style="color:#c20013"><b>CRITICAL</b></span>',
        'ERROR'     => '<span style="color:#dc3545"><b>ERROR</b></span>',
        'WARNING'   => '<span style="color:#dea600"><b>WARNING</b></span>',
        'NOTICE'    => '<span style="color:#ffc400"><b>NOTICE</b></span>',
        'INFO'      => '<span style="color:#17a2b8"><b>INFO</b></span>',
        'DEBUG'     => '<span style="color:#007bff"><b>DEBUG</b></span>',
    ],

];
