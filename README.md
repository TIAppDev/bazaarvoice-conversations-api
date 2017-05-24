# Bazaarvoice Request Library

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mikemiles86/bazaarvoice-conversations-api.svg?style=flat-square)](https://packagist.org/packages/mikemiles86/bazaarvoice-conversations-api)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/mikemiles86/bazaarvoice-conversations-api.svg?style=flat-square)](https://packagist.org/packages/mikemiles86/bazaarvoice-conversations-api)

PHP Wrapper for the [Bazaarvoice Conversations API](https://developer.bazaarvoice.com/conversations-api)

## Install

Via Composer

``` bash
$ composer require mikemiles86/bazaarvoice-conversations-api
```

## Usage

### Creating a Conversations Object

``` php
$client = new \GuzzleHttp\Client();
$api_key = '12345abcd';
$bazaarvoice_request = new \BazaarvoiceRequest\BazaarvoiceRequest($client, $api_key);

$conversations_wrapper = new \BazaarvoiceConversations\BazaarvoiceConversations($bazaarvoice_request);

```

### Content Types

All [conversation API content types](https://developer.bazaarvoice.com/conversations-api#supported-content-types) are supported.

Depending on the specific content type, data can be retrieved and sent to Bazaarvoice.

#### Get wrapper for Reviews content type.

``` php
$client = new \GuzzleHttp\Client();
$api_key = '12345abcd';
$bazaarvoice_request = new \BazaarvoiceRequest\BazaarvoiceRequest($client, $api_key);

$conversations_wrapper = new \BazaarvoiceConversations\BazaarvoiceConversations($bazaarvoice_request);

$reviews_wrapper = $conversations_wrapper->getContentType('Reviews');

```
#### Make a raw request
``` php
$client = new \GuzzleHttp\Client();
$api_key = '12345abcd';
$bazaarvoice_request = new \BazaarvoiceRequest\BazaarvoiceRequest($client, $api_key);

$conversations_wrapper = new \BazaarvoiceConversations\BazaarvoiceConversations($bazaarvoice_request);

$response = $conversations_wrapper->apiRequest('data/reviews');

```

### Retrieve Content

#### Retrieve content for Content Type by Id.

``` php
$client = new \GuzzleHttp\Client();
$api_key = '12345abcd';
$bazaarvoice_request = new \BazaarvoiceRequest\BazaarvoiceRequest($client, $api_key);

$conversations_wrapper = new \BazaarvoiceConversations\BazaarvoiceConversations($bazaarvoice_request);

$reviews_wrapper = $conversations_wrapper->getContentType('Reviews');

$review = $reviews_wrapper->getResultById('review_1234');

```

#### Retrieve content for Content Type by other parameters
``` php
$client = new \GuzzleHttp\Client();
$api_key = '12345abcd';
$bazaarvoice_request = new \BazaarvoiceRequest\BazaarvoiceRequest($client, $api_key);

$conversations_wrapper = new \BazaarvoiceConversations\BazaarvoiceConversations($bazaarvoice_request);

$reviews_wrapper = $conversations_wrapper->getContentType('Reviews');

$configuration = [
  'arguments' => [
    'ProductId' => 'my_product',
  ],
];

$response = $reviews_wrapper->retrieveRequest($configuration);

$product_reviews = $response->getResponse('Results');

```

### Submit Content

#### Get Submission Form
``` php
$client = new \GuzzleHttp\Client();
$api_key = '12345abcd';
$bazaarvoice_request = new \BazaarvoiceRequest\BazaarvoiceRequest($client, $api_key);

$conversations_wrapper = new \BazaarvoiceConversations\BazaarvoiceConversations($bazaarvoice_request);

$reviews_wrapper = $conversations_wrapper->getContentType('Reviews');

$reviews_submit_form = $reviews_wrapper->getSubmissionForm();

```
#### Preview Submission
``` php
$client = new \GuzzleHttp\Client();
$api_key = '12345abcd';
$bazaarvoice_request = new \BazaarvoiceRequest\BazaarvoiceRequest($client, $api_key);

$conversations_wrapper = new \BazaarvoiceConversations\BazaarvoiceConversations($bazaarvoice_request);

$reviews_wrapper = $conversations_wrapper->getContentType('Reviews');

$submission_data = [
  'Rating' => 5,
  'ReviewText' => 'This is my Review',
];

$reviews_wrapper->previewSubmission($submission_data);
```
#### Submit Submission
``` php
$client = new \GuzzleHttp\Client();
$api_key = '12345abcd';
$bazaarvoice_request = new \BazaarvoiceRequest\BazaarvoiceRequest($client, $api_key);

$conversations_wrapper = new \BazaarvoiceConversations\BazaarvoiceConversations($bazaarvoice_request);

$reviews_wrapper = $conversations_wrapper->getContentType('Reviews');

$submission_data = [
  'Rating' => 5,
  'ReviewText' => 'This is my Review',
];

$reviews_wrapper->submitSubmission($submission_data);
```

## Testing

``` bash
$ composer test
```

## Credits

- [Mike Miles](https://github.com/mikemiles86)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
