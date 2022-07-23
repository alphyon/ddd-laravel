<?php
declare(strict_types=1);
namespace Core\Shared\Domain;

interface CollectionInterface
{
    public function all(): array;
}
