<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Interface SubmitContentInterface
 * @package BazaarvoiceConversations\ContentType
 */
interface SubmitContentInterface {

  /**
   * Get the API endpoint to make Submission request to.
   *
   * @return string
   */
  public function getSubmitEndpoint();

  /**
   * Get name of Response class to use for submission API request.
   *
   * @return string
   */
  public function getSubmitResponseType();

  /**
   * Retrieve a Submission Form.
   *
   * @param array $configuration
   *   API request configuration to pass along. key/value pairs.
   *
   * @return mixed
   *  FALSE or object.
   */
  public function getSubmissionForm(array $configuration = []);

  /**
   * Retrieve a preview of a form submission.
   *
   * @param array $submission_values
   *   Key/value array of submission fields and values.
   *
   * @param array $configuration
   *   API request configuration to pass along. key/value pairs.
   *
   * @return mixed
   */
  public function previewSubmission(array $submission_values = [], array $configuration = []);

  /**
   * Submit form values.
   *
   * @param array $submission_values
   *   Key/value array of submission fields and values.
   *
   * @param array $configuration
   *   API request configuration to pass along. key/value pairs.
   *
   * @return mixed
   */
  public function submitSubmission(array $submission_values = [], array $configuration = []);

  /**
   * Makes an API request specific to submitting content.
   *
   * @param array  $configuration
   *  API configuration array. Key/value pairs.
   *
   * @return mixed
   */
  public function submitRequest(array $configuration = []);
}