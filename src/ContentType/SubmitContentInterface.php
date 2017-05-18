<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Interface SubmitContentInterface
 * @package BazaarvoiceConversations\ContentType
 */
interface SubmitContentInterface {

  /**
   * Retrieve a Submission Form.
   *
   * @param bool|string $user_id
   *   User Id to pass to pre-fill submission form with data.
   *
   * @return mixed
   *  FALSE or object.
   */
  public function getSubmissionForm(array $parameters = []);

  /**
   * Retrieve a preview of a form submission.
   *
   * @param array $submission_values
   *   Key/value array of submission fields and values.
   *
   * @return mixed
   */
  public function previewSubmission(array $submission_values = []);

  /**
   * Submit form values.
   *
   * @param array $submission_values
   *  Key/value array of submission fields and values.
   *
   * @return mixed
   */
  public function submitSubmission(array $submission_values = []);
}