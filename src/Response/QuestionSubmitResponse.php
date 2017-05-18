<?php

namespace BazaarvoiceConversations\Response;

class QuestionSubmitResponse extends SubmitContentResponse {

  public function getQuestion() {
    return $this->getResponse('Question');
  }
}