<?php

namespace Core\View;

use Core\View\Contracts\ViewInterface;
use Exception;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Filesystem\Filesystem;

class View implements ViewInterface{

    private static $viewFactory;

    public static function render($view, $data = []){

        extract($data);

        $path = str_replace('.', '/', $view);
        
        $path = BASE_PATH ."/resources/views/" . $path . ".php";

        if(!file_exists($path)){
            throw new \Exception("View {$path} Not Found");
        }

        require_once $path;
    }

    public static function blade($view, $data = []){
        if (!isset(self::$viewFactory)) {
            $viewPaths = [BASE_PATH . '/resources/views'];
            $fileSystem = new Filesystem;
            $viewFinder = new FileViewFinder($fileSystem, $viewPaths);
            $bladeCompiler = new BladeCompiler($fileSystem, BASE_PATH . '/resources/cache/views');
            $resolver = new EngineResolver;
            $resolver->register('blade', function () use ($bladeCompiler) {
                return new CompilerEngine($bladeCompiler);
            });
            self::$viewFactory = new Factory($resolver, $viewFinder, new \Illuminate\Events\Dispatcher);
        }

        echo self::$viewFactory->make($view, $data)->render();
    }

}