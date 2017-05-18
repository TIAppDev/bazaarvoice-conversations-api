<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Class Feedback
 * @package BazaarvoiceConversations\ContentType
 */
class Feedback extends ContentTypeBase {

  /**
   * Submit a Positive Helpfulness vote for a piece of content.
   *
   * @param string $content_id
   *   Unique Content Id.
   *
   * @param string $content_type
   *  Bazaarvoice content type
   *
   * @return mixed
   */
  public function submitPositiveHelpfulnessVote($content_id, $content_type) {

    return $this->submitFeedback($content_id, $content_type, 'helpfulness', 'Positive');
  }

  /**
   * Submit a Negative Helpfulness vote for a piece of content.
   *
   * @param string $content_id
   *   Unique Content Id.
   *
   * @param string $content_type
   *  Bazaarvoice content type
   *
   * @return mixed
   */
  public function submitNegativeHelpfulnessVote($content_id, $content_type) {

    return $this->submitFeedback($content_id, $content_type, 'helpfulness', 'Negative');
  }

  /**
   * Submit an Inappropiate Feedback for a piece of content.
   *
   * @param string $content_id
   *   Unique Content Id.
   *
   * @param string $content_type
   *  Bazaarvoice content type
   *
   * @return mixed
   */
  public function submitInappropriateFeedback($content_id, $content_type) {

    return $this->submitFeedback($content_id, $content_type, 'inappropriate');
  }

  /**
   * Submit a Feedback vote for a piece of content.
   *
   * @param string $content_id
   *   Unique Content Id.
   *
   * @param string $content_type
   *  Bazaarvoice content type
   *
   * @param string $feedback_type
   *   Name of the type of feedback to submit.
   *
   * @param string $vote
   *    (optional) If a vote feedback, type of vote.
   *
   * @return mixed
   */
  public function submitFeedback($content_id, $content_type, $feedback_type, $vote = NULL) {
    $arguments = [
      'ContentType' => $content_type,
      'ContentId' => $content_id,
      'FeedbackType' => $feedback_type,
    ];

    if (is_string($vote)) {
      $arguments['vote'] = $vote;
    }

    $configuration = [
      'method' => 'POST',
      'arguments' => $arguments,
    ];

    return $this->apiRequest('data/submitfeedback', $configuration, 'BazaarvoiceConversations\\Response\\FeedbackSubmitResponse');
  }

}