<?php

namespace BazaarvoiceConversations\ContentType;

/**
 * Class Product
 * @package BazaarvoiceConversations\ContentType
 */
class Products extends RetrieveContentTypeBase {

  protected $retrieve_endpoint = 'data/products';
  protected $id_field = 'productid';

}