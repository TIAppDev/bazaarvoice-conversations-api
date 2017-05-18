<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Class Product
 * @package BazaarvoiceConversations\ContentType
 */
class Products extends ContentTypeBase implements RetrieveContentInterface {

  public function getSingle($id, array $parameters = []) {
    $single_content = FALSE;
    // Call getMultiple, passing ID as an array.
    if ($multiple_content = $this->getMultiple([$id], $parameters)) {
      // Pop off the returned object.
      $single_content = array_pop($multiple_content);
    }
    return $single_content;
  }

  public function getMultiple(array $ids, array $parameters = []) {
    // Set default filter for ids.
    $parameters['filter']['productid'] = $ids;

    return $this->getAll($parameters);
  }

  public function getAll(array $parameters = []) {
    $configuration = [
      'arguments' => $parameters,
    ];
    return $this->BazaarvoiceRequest->apiRequest('data/products', $configuration);
  }
}