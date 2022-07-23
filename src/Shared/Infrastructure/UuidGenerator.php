<?php

namespace Core\Shared\Infrastructure;

use Core\Shared\Domain\UuidGeneratorContract;
use Ramsey\Uuid\Uuid as RamseyUUID;

class UuidGenerator implements UuidGeneratorContract
{

    public function generate(): string
    {
        return RamseyUUID::uuid4()->toString();
    }
}
