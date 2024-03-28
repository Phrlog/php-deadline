<?php

declare(strict_types=1);

namespace phrlog\Deadline;

use DateTimeImmutable;

final class MaxExecutionTimeoutInitializer implements DeadlineInitializerInterface
{
    public function initialize(DateTimeImmutable $deadline): void
    {
        if (!ini_set('max_execution_time', (string) $this->calculateMaxExecutionTimeInSeconds($deadline))) {
            // TODO: implement custom exception
            throw new \RuntimeException();
        }
    }

    private function calculateMaxExecutionTimeInSeconds(DateTimeImmutable $deadline): int
    {
        // TODO: implement calculation
        return 60;
    }
}
