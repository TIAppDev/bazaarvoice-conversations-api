<?php

namespace BazaarvoiceConversations\ContentType;


class Product extends ContentTypeBase implements RetrieveContentInterface {

  /**
   * Override parent getSingle().
   */
  public function getSingle($id, array $parameters = []) {
    $product = FALSE;
    // Call getMultiple, passing ID as an array.
    if ($products = $this->getMultiple([$id], $parameters)) {
      // Pop off the returned object.
      $product = array_pop($products);
    }
    return $product;
  }

  /**
   * Override parent getMultiple().
   */
  public function getMultiple(array $ids, array $parameters = []) {
    // Set default filter for product ids.
    $parameters['filter']['productid'] = $ids;

    return $this->BazaarvoiceRequest->apiRequest('data/products', $parameters);
  }
}