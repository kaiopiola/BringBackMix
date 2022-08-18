<?php

namespace Kaiopiola\Keygen;

use LogicException;
use Kaiopiola\Keygen\Exception;

class NoMoreKeysAvailable extends LogicException implements Exception
{
}
