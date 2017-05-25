<?php

namespace BazaarvoiceConversations;

interface BazaarvoiceConversationsInterface {

  /**
   * Return Bazaarvoice Content Type Object from factory.
   *
   * @param string $type
   *   Content Type name.
   *
   * @return mixed
   *    Boolean FALSE or class object.
   */
  public function getContentType($type);
}