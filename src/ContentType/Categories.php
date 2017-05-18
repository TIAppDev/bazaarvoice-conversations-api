<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Class Categories
 * @package BazaarvoiceConversations\ContentType
 */
class Categories extends ContentTypeBase implements RetrieveContentInterface {

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
    $parameters['filter']['id'] = $ids;

    return $this->getAll($parameters);
  }

  public function getAll(array $parameters = []) {
    $configuration = [
      'arguments' => $parameters,
    ];

    return $this->retrieveRequest('data/categories', $configuration);
  }

  /**
   * Retrieve a Product Category based on Ancestor Id.
   * @param string $ancestor_id
   *  ID of the ancestor
   *
   * @param array $parameters
   *   key/value array of parameters.
   *
   * @return mixed
   */
  public function getCategoryByAncestor($ancestor_id, array $parameters = []) {
    $parameters['filter']['ancestorid'] = $ancestor_id;
    return $this->getAll($parameters);
  }
}