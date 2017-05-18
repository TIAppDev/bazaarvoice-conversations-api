<?php

namespace BazaarvoiceConversations\Response;

class RetrieveContentResponse extends ConversationsResponse {

  protected $results;

  protected $includes;

  protected $limit;

  protected $offset;

  protected $total_results;

  public function __construct($method, $status_code, $request_url, array $request_configuration = [], array $response = []) {
      parent::__construct($method, $status_code, $request_url, $request_configuration, $response);

      $this->results = $this->getResponse('Results');
      $this->includes = $this->getResponse('Includes');
      $this->limit = $this->getResponse('Limit');
      $this->offset = $this->getResponse('Offset');

      $total_results = $this->getResponse('TotalResults');
      $this->total_results = $total_results ?: count($this->results);
  }

  public function getResults() {
    return $this->results;
  }

  public function getResultCount() {
    return count($this->results);
  }

  public function getIncludes() {
    return $this->includes;
  }

  public function getLimit() {
    return $this->limit;
  }

  public function getOffset() {
    return $this->offset;
  }

  public function getTotalResults() {
    return $this->total_results;
  }

}