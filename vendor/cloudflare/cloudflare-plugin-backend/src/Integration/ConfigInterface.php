<?php

namespace VSTACK\Integration;

interface ConfigInterface
{
    /**
     * @param $key
     *
     * @return mixed
     */
    public function getValue($key);
}
