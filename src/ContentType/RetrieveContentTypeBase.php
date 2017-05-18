<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Class RetrieveContentTypeBase
 * @package BazaarvoiceConversations\ContentType
 */
class RetrieveContentTypeBase extends ContentTypeBase implements RetrieveContentInterface {

  protected $retrieve_endpoint;
  protected $id_field = 'id';
  protected $retrieve_response_type = 'BazaarvoiceConversations\\Response\\RetrieveContentResponse';

  public function getRetrieveEndpoint() {
    return $this->retrieve_endpoint;
  }

  public function getIdField() {
    return $this->id_field;
  }

  public function getRetrieveResponseType() {
    return $this->retrieve_response_type;
  }

  public function getResultById($id, array $configuration = []) {

    $result = [];
    if ($results = $this->getMultipleResultsById([$id], $configuration)) {
      $result = array_pop($results);
    }
    return $result;
  }

  public function getMultipleResultsById(array $ids, array $configuration = []) {
    $results = [];

    $configuration['arguments']['filter'][$this->getIdField()] = $ids;

    $response = $this->retrieveRequest($configuration);
    if ($response && ($response->getResultCount() > 0)) {
      $results = $response->getResults();
    }

    return $results;
  }

  public function retrieveRequest(array $configuration = []) {
    return $this->apiRequest($this->getRetrieveEndpoint(), $configuration, $this->getRetrieveResponseType());
  }

}