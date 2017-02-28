<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2017/2/28
 * Time: 16:36
 */

namespace Payment\Common;

abstract class ConfigInterface
{
    public function toArray()
    {
        return get_object_vars($this);
    }
}