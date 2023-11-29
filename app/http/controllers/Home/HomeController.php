<?php

namespace App\Http\Controllers\Home;

use App\Events\UserRegisteredEvent;
use App\Http\Controllers\Controller;
use App\Http\Forms\SimpleForm;
use Core\Event\Event;
use Core\FormBuilder\FormBuilder;
use Core\Localization\Localization;

class HomeController extends Controller{

    public function index(){
        // $req = (new Request())->all();
        // dd(request()->all());
        $name = "arash";

        // blade('index', compact('name'));

        render('index', compact('name'));

        // dd(Post::all());
        // dd(DB::table('wp_users')->first());

        // dd(db()->table('wp_users')->first());

        // Event::addListener('UserRegisteredEvent', 'UserRegisteredListener');

        // Event::fire('UserRegisteredEvent', new UserRegisteredEvent('narimani'));

        // addListener('UserRegisteredEvent', 'UserRegisteredListener');
        // fire('UserRegisteredEvent', new UserRegisteredEvent('narimani'));

//        $locale = 'en';
//        $localization = new Localization($locale);
//        echo $localization->translate('say', ['name' => 'آرش']) . PHP_EOL;

        echo lang('fa')->translate('welcome');

//        $formBuilder = new FormBuilder('submit.php', 'post');
//        $formBuilder->setFormClasses(['form', 'custom-form'])
//            ->setLabelClasses(['custom-label', 'text-bold'])
//            ->addFieldClasses('text', ['custom-field', 'text-input'])
//            ->addFieldClasses('select', ['custom-field', 'select-input'])
//            ->addFieldClasses('textarea', ['custom-field', 'textarea-input'])
//            ->setButtonClasses(['btn', 'btn-primary'])
//            ->addField('username', 'text', 'Enter your username', 'Username')
//            ->addField('password', 'password', 'Enter your password', 'Password')
//            ->addField('gender', 'select', '', 'Gender', ['' => 'Select...', 'm' => 'Male', 'f' => 'Female'])
//            ->addField('bio', 'textarea', 'Bio', 'Biography')
//            ->build();

//        $formBuilder->handle('SimpleForm');

//        form('/', 'POST')->handle('SimpleForm');
    }

}