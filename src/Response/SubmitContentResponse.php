<?php

namespace BazaarvoiceConversations\Response;

class SubmitContentResponse extends ConversationsResponse {

  protected $data;
  protected $form;
  protected $form_errors;
  protected $submission_id;
  protected $typical_hours_to_post;

  public function __construct($method, $status_code, $request_url, array $request_configuration = [], array $response = []) {
    parent::__construct($method, $status_code, $request_url, $request_configuration, $response);

    $this->data = $this->getResponse('Data');
    $this->form = $this->getResponse('Form');
    $this->form_errors = $this->getResponse('FormErrors');
    $this->submission_id = $this->getResponse('SubmissionId');
    $this->typical_hours_to_post = $this->getResponse('TypicalHoursToPost');
  }

  public function getData() {
    return $this->data;
  }

  public function getForm() {
    return $this->form;
  }

  public function getFormErrors() {
    return $this->form_errors;
  }

  public function getSubmissionId() {
    return $this->submission_id;
  }

  public function getTypicalHoursToPost() {
    return $this->typical_hours_to_post;
  }
}