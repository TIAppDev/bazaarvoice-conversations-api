<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Class Categories
 * @package BazaarvoiceConversations\ContentType
 */
class Categories extends RetrieveContentTypeBase {

  protected $retrieve_endpoint = 'data/categories';

  /**
   * Retrieve a Product Category based on Ancestor Id.
   * @param string $ancestor_id
   *  ID of the ancestor
   *
   * @param array $configuration
   *   key/value array of API configuration.
   *
   * @return mixed
   */
  public function getCategoryByAncestor($ancestor_id, array $configuration = []) {
    $categories = [];

    $configuration['arguments']['filter']['ancestorid'] = $ancestor_id;

    $response = $this->retrieveRequest($configuration);
    if ($response && ($response->getResultCount() > 0)) {
      $categories = $response->getResults();
    }
    return $categories;
  }
}