<?php

declare(strict_types=1);

namespace phrlog\Deadline;

use DateTimeImmutable;

interface DeadlineInitializerInterface
{
    public function initialize(DateTimeImmutable $deadline): void;
}
