<?php

namespace App\Http\Html\render;

use App\Http\Html\makeTag\A;
use App\Http\Html\makeTag\Li;
use App\Http\Html\makeTag\Span;
use App\Http\Html\makeTag\Ul;

class Nav
{
    public function run(){
        $ul = new Ul();
        $li = new Li();
        $a = new A();
        $span = new Span();

        $list = $ul->addChild(
            $li->addChild(
                $a->addChild(
                    $span->addChild('php')
                )
            )
        );
        echo $list->build();

//        $nav =
//            (new Ul())->addChild(
//                    (new Li())->addChild(
//                            (new A())->setHref('/home')->addChild($welcome->addChild('Home'))
//                )
//            );

//        echo $nav->build();



    }
}