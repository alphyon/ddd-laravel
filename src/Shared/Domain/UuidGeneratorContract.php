<?php
declare(strict_types=1);
namespace Core\Shared\Domain;

interface UuidGeneratorContract
{
    public function generate() :string;

}
