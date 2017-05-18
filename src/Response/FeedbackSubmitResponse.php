<?php

namespace BazaarvoiceConversations\Response;

class FeedbackSubmitResponse extends SubmitContentResponse {

  public function getFeedback() {
    return $this->getResponse('Feedback');
  }
}