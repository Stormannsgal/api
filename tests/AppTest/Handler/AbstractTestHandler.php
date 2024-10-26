<?php declare(strict_types=1);

namespace Stormannsgal\AppTest\Handler;

use Helmich\JsonAssert\JsonAssertions;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Stormannsgal\FunctionalTest\JsonRequestHelper;
use Stormannsgal\Mock\MockServerRequest;

class AbstractTestHandler extends TestCase
{
    use JsonRequestHelper;
    use JsonAssertions;

    protected ServerRequestInterface $request;

    protected function setUp(): void
    {
        $this->request = new MockServerRequest();

        parent::setUp();
    }
}
