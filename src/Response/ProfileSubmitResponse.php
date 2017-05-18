<?php

namespace BazaarvoiceConversations\Response;

class ProfileSubmitResponse extends SubmitContentResponse {

  public function getAuthentication() {
    return $this->getResponse('Authentication');
  }
}