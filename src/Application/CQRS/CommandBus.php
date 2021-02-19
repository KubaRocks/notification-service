<?php
declare(strict_types = 1);

namespace Application\CQRS;

interface CommandBus
{
    public function dispatch(Command $command): void;
}
