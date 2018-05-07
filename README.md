# codabox-gateway

## Description

Fetch CODA files from Codabox via the Tigron REST gateway. For more information on this service, visit: [https://codabox.tigron.net](https://codabox.tigron.net)


## Installation

installation via composer:

    composer require tigron/codabox-gateway

## Howto

Configure your Connection:

    \Tigron\Codabox\Config::$key = 'YOUR_API_KEY';

Get 1 CODA file by its ID:

    $coda_files = \Tigron\Codabox\Coda::get_by_id('00000000-0000-0000-0000-000000000000');

Get all CODA files for a specified year:

    $coda_files = \Tigron\Codabox\Coda::get_by_year(2018);

Get unprocessed CODA files:

    $coda_files = \Tigron\Codabox\Coda::get_unprocessed();

Mark a CODA file as 'processed':

    $coda = \Tigron\Codabox\Coda::get_by_id('00000000-0000-0000-0000-000000000000');
    $coda->mark_processed();

Mark a CODA file as 'unprocessed':

    $coda = \Tigron\Codabox\Coda::get_by_id('00000000-0000-0000-0000-000000000000');
    $coda->mark_unprocessed();
