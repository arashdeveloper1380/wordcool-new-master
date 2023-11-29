<?php

namespace App\Http\Html\render;

use App\Http\Html\makeTag\A;
use App\Http\Html\makeTag\Li;
use App\Http\Html\makeTag\Span;
use App\Http\Html\makeTag\Ul;

class Nav
{
    public function run(){
//        $ul = new Ul();
//        $li = new Li();
//        $a = new A();
//        $span = new Span();

//        $list = $ul->addChild(
//            $li->addChild(
//                $a->setHref('/php')->addChild(
//                    $span->addChild('php')
//                )
//            )
//        );
//        echo $list->build();

//        $nav =
//            (new Ul())->addChild(
//                    (new Li())->addChild(
//                            (new A())->setHref('/home')->addChild($welcome->addChild('Home'))
//                )
//            );

//        echo $nav->build();



        $ul = new Ul();

        $li_php = new Li();
        $a_php = new A();
        $span_php = new Span();
        $a_php->setHref('/php')->addChild($span_php->addChild('php'));
        $li_php->addChild($a_php);
        $ul->addChild($li_php);

        $li_cplus = new Li();
        $a_cplus = new A();
        $span_cplus = new Span();
        $a_cplus->setHref('/c++')->addChild($span_cplus->addChild('c++'));
        $li_cplus->addChild($a_cplus);
        $ul->addChild($li_cplus);

        $li_ruby = new Li();
        $a_ruby = new A();
        $span_ruby = new Span();
        $a_ruby->setHref('/ruby')->addChild($span_ruby->addChild('ruby'));
        $li_ruby->addChild($a_ruby);
        $ul->addChild($li_ruby);


        echo $ul->build(); // Outputs the HTML for the list


    }
}