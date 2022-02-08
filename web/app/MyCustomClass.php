<?php

declare(strict_types=1);

class MyCustomClass
{
    public function handle()
    {
        $arr = array(
                'foo',
                'bar',
                'biz',
                '',
                null
               );

        if ($arr) return true;

        return array_filter($arr);
    }
}

(new MyCustomClass())->handle();
