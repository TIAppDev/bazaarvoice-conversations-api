<?php

namespace BazaarvoiceConversations\Response;

class ReviewSubmitResponse extends SubmitContentResponse {

  public function getReview() {
    return $this->getResponse('Review');
  }
}