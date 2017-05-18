<?php

namespace BazaarvoiceConversations\Response;

class CommentSubmitResponse extends SubmitContentResponse {

  public function getComment() {
    return $this->getResponse('Comment');
  }
}