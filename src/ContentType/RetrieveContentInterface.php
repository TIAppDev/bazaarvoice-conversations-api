<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Interface RetrieveContentInterface
 * @package BazaarvoiceConversations\ContentType
 */
interface RetrieveContentInterface {

  /**
   * Get the API endpoint to make Retrieve request to.
   *
   * @return string
   */
  public function getRetrieveEndpoint();

  /**
   * Get name of Response class to use for Retrieve API request.
   *
   * @return string
   */
  public function getRetrieveResponseType();

  /**
   * Return name of primary Id field for retrieving content.
   *
   * @return string
   */
  public function getIdField();

  /**
   * Retrieve a single content object.
   *
   * @param string $id
   *   The unique id of the content object to retrieve.
   *
   * @param array $configuration
   *   API request configuration to pass along. key/value pairs.
   *
   *
   * @return mixed
   *   Return the content object or boolean false.
   */
  public function getResultById($id, array $configuration = []);

  /**
   * Retrieve multiple content objects.
   *
   * @param array $ids
   *   Array of unique content id's to retrieve.
   *
   * @param array $configuration
   *   API request configuration to pass along. key/value pairs.
   *
   * @return mixed
   *   Return array of retrieved objects or boolean false.
   */
  public function getMultipleResultsById(array $ids, array $configuration = []);

  /**
   * Makes an API request specific to retrieving content.
   *
   * @param array $configuration
   *   API request configuration to pass along. key/value pairs.
   *
   * @return mixed
   */
  public function retrieveRequest(array $configuration = []);

}