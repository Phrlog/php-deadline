<?php

declare(strict_types=1);

namespace phrlog\Deadline;

use DateTimeImmutable;

interface DeadlineDiscoveryInterface
{
    public function discover(): DateTimeImmutable;
}
