<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Class SubmitContentTypeBase
 * @package BazaarvoiceConversations\ContentType
 */
class SubmitContentTypeBase extends RetrieveContentTypeBase implements SubmitContentInterface {

  protected $submit_endpoint;
  protected $submit_response_type = 'BazaarvoiceConversations\\Response\\SubmitContentResponse';

  public function getSubmitEndpoint() {
    return $this->submit_endpoint;
  }

  public function getSubmitResponseType() {
    return $this->submit_response_type;
  }

  public function getSubmissionForm(array $configuration = []) {

    return $this->submitRequest($configuration);
  }

  public function previewSubmission(array $submission_values = [], array $configuration = []) {
    $configuration['arguments'] = array_merge($configuration['arguments'], $submission_values);
    $configuration['arguments']['Action'] = 'Preview';
    return $this->submitRequest($configuration);

  }

  public function submitSubmission(array $submission_values = [], array $configuration = []) {
    $configuration['arguments'] = array_merge($configuration['arguments'], $submission_values);
    $configuration['arguments']['Action'] = 'Submit';
    return  $this->submitRequest($configuration);
  }

  public function submitRequest(array $configuration = []) {
    $configuration['method'] = 'POST';

    return $this->apiRequest($this->getSubmitEndpoint(), $configuration, $this->getSubmitResponseType());
  }
}