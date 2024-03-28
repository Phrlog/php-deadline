<?php

declare(strict_types=1);

namespace phrlog\Deadline;

use DateTimeImmutable;

final class Deadline
{
    private DeadlineInitializerInterface $initializer;
    private DeadlineDiscoveryInterface $discovery;
    private DateTimeImmutable $deadline;

    public function __construct(DeadlineInitializerInterface $initializer, DeadlineDiscoveryInterface $discovery)
    {
        $this->initializer = $initializer;
        $this->discovery = $discovery;
    }

    public function run(): void
    {
        $this->deadline = $this->discovery->discover();

        $this->initializer->initialize($this->deadline);
    }

    public function hasCome(): bool
    {
        // TODO: implement
        return false;
    }
}
