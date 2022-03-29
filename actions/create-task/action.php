#!/usr/bin/php
<?php

require __DIR__ . '/vendor/autoload.php';

use onOffice\SDK\onOfficeSDK;

$optionsConfig = [
    'api-version::',        // string [stable|latest] (default: latest)
    'subject:',             // string (required)
    'text:',                // string (required)
    'type:',                // int (required)
    'responsible:',         // string (required)
    'responsibleIsGroup::', // int [0|1] (default: 1)
    'editor::',             // string
    'project::',            // int
];
$options = getopt('', $optionsConfig);

$sdk = new onOfficeSDK();
$sdk->setApiVersion($options['api-version'] ?? 'latest');

$parameters = [
    'data' => [
        'Betreff' => $options['subject'],
        'Aufgabe' => $options['text'],
        'Verantwortung' => $options['responsible'],
        'Art' => $options['type'],
    ],
    'responsibilityByGroup' => ((int) ($options['responsibleIsGroup'] ?? 1)),
];

if (isset($options['editor'])) {
    $parameters['data']['Bearbeiter'] = $options['editor'];
}

if (isset($options['project'])) {
    $parameters['relatedProjectIds'] = [ $options['project'] ];
}

$handleCreateTask = $sdk->callGeneric(onOfficeSDK::ACTION_ID_CREATE, 'task', $parameters);
$sdk->sendRequests(getenv('OO_TOKEN'), getenv('OO_SECRET'));
