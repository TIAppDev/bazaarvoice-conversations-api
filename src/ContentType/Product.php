<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Class Product
 * @package BazaarvoiceConversations\ContentType
 */
class Product extends ContentTypeBase implements RetrieveContentInterface {

  public function getSingle($id, array $parameters = []) {
    $product = FALSE;
    // Call getMultiple, passing ID as an array.
    if ($products = $this->getMultiple([$id], $parameters)) {
      // Pop off the returned object.
      $product = array_pop($products);
    }
    return $product;
  }

  public function getMultiple(array $ids, array $parameters = []) {
    // Set default filter for product ids.
    $parameters['filter']['productid'] = $ids;

    return $this->BazaarvoiceRequest->apiRequest('data/products', $parameters);
  }
}