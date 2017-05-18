<?php

namespace BazaarvoiceConversations\Response;

class AnswerSubmitResponse extends SubmitContentResponse {

  public function getAnswer() {
    return $this->getResponse('Answer');
  }
}