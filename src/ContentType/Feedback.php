<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Class Feedback
 * @package BazaarvoiceConversations\ContentType
 */
class Feedback extends ContentTypeBase {

  public function submitPositiveHelpfulnessVote($content_id, $content_type) {

    return $this->submitFeedback($content_id, $content_type, 'helpfulness', 'Positive');
  }

  public function submitNegativeHelpfulnessVote($content_id, $content_type) {

    return $this->submitFeedback($content_id, $content_type, 'helpfulness', 'Negative');
  }

  public function submitInappropriateFeedback($content_id, $content_type) {

    return $this->submitFeedback($content_id, $content_type, 'inappropriate');
  }

  public function submitFeedback($content_id, $content_type, $feedback_type, $vote = NULL) {
    $arguments = [
      'ContentType' => $content_type,
      'ContentId' => $content_id,
      'FeedbackType' => $feedback_type,
    ];

    if (is_string($vote)) {
      $arguments['vote'] = $vote;
    }

    $this->submit($arguments);
  }

  private function submit(array $arguments = []) {

    $configuration = [
      'method' => 'POST',
      'arguments' => $arguments,
    ];

    return $this->BazaarvoiceRequest->apiRequest('data/submitfeedback', $configuration);
  }
}