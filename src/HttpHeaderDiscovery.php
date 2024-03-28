<?php

declare(strict_types=1);

namespace phrlog\Deadline;

use DateTimeImmutable;
use DateTimeInterface;

final class HttpHeaderDiscovery implements DeadlineDiscoveryInterface
{
    private string $headerName;

    public function __construct(string $headerName = 'X-Deadline')
    {
        $this->headerName = $headerName;
    }

    public function discover(): DateTimeImmutable
    {
        $headerValue = $_SERVER[sprintf("HTTP_%s", $this->headerName)] ?? null;

        if (!isset($headerValue)) {
            // TODO: implement custom exception
            throw new \InvalidArgumentException();
        }

        try {
            $deadline = DateTimeImmutable::createFromFormat(DateTimeInterface::RFC3339_EXTENDED, $headerValue);
        } catch (\Throwable $throwable) {
            // TODO: implement custom exception
            throw new \InvalidArgumentException();
        }

        return $deadline;
    }
}
