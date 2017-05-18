<?php

namespace BazaarvoiceConversations\ContentType;

class Profiles extends ContentTypeBase implements RetrieveContentInterface {

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

    return $this->retrieveRequest('data/authors', $configuration);
  }

  public function authenticateUser($auth_token) {

    $configuration = [
      'method' => 'POST',
      'arguments' => [
        'Authtoken' => $auth_token,
      ],
    ];
    return $this->submitRequest('data/authenticateuser', $configuration, 'BazaarvoiceConversations\\Response\\ProfileSubmitResponse');
  }
}