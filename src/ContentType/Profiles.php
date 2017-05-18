<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Class Profiles
 * @package BazaarvoiceConversations\ContentType
 */
class Profiles extends RetrieveContentTypeBase {

  protected $retrieve_endpoint = 'data/authors';
  protected $id_field = 'id';

  /**
   * Authenticate a user token.
   *
   * @param string $auth_token
   *   authentication token.
   *
   * @return mixed
   */
  public function authenticateUser($auth_token) {

    $configuration = [
      'method' => 'POST',
      'arguments' => [
        'Authtoken' => $auth_token,
      ],
    ];
    return $this->apiRequest('data/authenticateuser', $configuration, 'BazaarvoiceConversations\\Response\\ProfileSubmitResponse');
  }
}