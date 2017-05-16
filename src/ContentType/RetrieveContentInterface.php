<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Interface RetrieveContentInterface
 * @package BazaarvoiceConversations\ContentType
 */
interface RetrieveContentInterface {

  /**
   * Retrieve a single content object.
   *
   * @param string $id
   *   The unique id of the content object to retrieve.
   *
   * @param array $parameters (optional)
   *   Optional of filter/sort parameters for retrieving object.
   *
   * @return mixed
   *   Return the content object or boolean false.
   */
  public function getSingle($id, array $parameters = []);

  /**
   * Retrieve multiple content objects.
   *
   * @param array $ids
   *   Array of unique content id's to retrieve.
   *
   * @param array $parameters
   *   Optional key/value array of filter/sort parameters for retrieving objects.
   *
   * @return mixed
   *   Return array of retrieved objects or boolean false.
   */
  public function getMultiple(array $ids, array $parameters = []);


}