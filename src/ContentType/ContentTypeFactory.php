<?php

namespace BazaarvoiceConversations\ContentType;

use BazaarvoiceRequest\BazaarvoiceRequestInterface;

/**
 * Class ContentTypeFactory
 * @package BazaarvoiceConversations\ContentType
 */
class ContentTypeFactory {

  const NS = 'BazaarvoiceConversations\\ContentType\\';

  private $bazaarvoiceRequest;

  public function __construct(BazaarvoiceRequestInterface $request) {
    $this->bazaarvoiceRequest = $request;
  }

  /**
   * Instantiate a Bazaarvoice Content Type class object.
   *
   * @param string $content_type
   *   String name of content type class.
   *
   * @return mixed
   *   Boolean false or instance of the class
   */
  public function build($content_type) {
    $object = FALSE;
    // Check that a string was passed.
    if (is_string($content_type)) {
      // Build class string.
      $class = self::NS . ucwords(strtolower($content_type));
      // Check to see if this class exists.
      if (class_exists($class)) {
        // Check that this class extends the ContentTypeBase class.
        if (is_subclass_of($class, self::NS . 'ContentTypeBase')) {
          // Instantiate object of this class.
          $object = new $class($this->bazaarvoiceRequest);
        }
      }
    }
    return $object;
  }

}