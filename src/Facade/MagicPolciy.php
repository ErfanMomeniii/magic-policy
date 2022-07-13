<?php
namespace erfanmomeniii\magicpolicy\Facade;

use Illuminate\Support\Facades\Facade;

class MagicPolciy extends Facade{
    protected static function getFacadeAccessor()
    {
        return 'magicpolicy';
    }
}