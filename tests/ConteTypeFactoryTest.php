<?php
namespace BazaarvoiceConversations\Tests;

use BazaarvoiceConversations\ContentType\ContentTypeFactory;

class ContentTypeFactoryTest extends \PHPUnit_Framework_TestCase {

  private function mockRequest() {
    return $this->getMockBuilder('BazaarvoiceRequest\Request\BazaarvoiceRequest')
      ->disableOriginalConstructor()
      ->disableOriginalClone()
      ->disableArgumentCloning()
      ->disallowMockingUnknownTypes()
      ->getMock();
  }

  public function testInvalidContentTypeReturnsFalse() {

    $request = $this->mockRequest();
    $factory = new ContentTypeFactory($request);

    // non-existent class
    $type_name = substr( md5(rand()), 0, 8);
    $content_type = $factory->build($type_name);
    $this->assertFalse($content_type);

    // non-string class name.
    $type_name = [1,2,3];
    $content_type = $factory->build($type_name);
    $this->assertFalse($content_type);

    // not a subclass of ContentTypeBase
    $content_type = $factory->build('ContentTypeFactory');
    $this->assertFalse($content_type);

  }

  public function testValidContentTypeReturnsObject() {

    $request = $this->mockRequest();
    $factory = new ContentTypeFactory($request);
    $content_type = $factory->build('Products');
    $this->assertInstanceOf('BazaarvoiceConversations\ContentType\ContentTypeBase', $content_type);

  }
}