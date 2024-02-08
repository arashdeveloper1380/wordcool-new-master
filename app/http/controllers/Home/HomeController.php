<?php

namespace App\Http\Controllers\Home;

use App\Events\UserRegisteredEvent;
use App\Http\Controllers\Controller;
use App\Http\Forms\SimpleForm;
use Core\Event\Event;
use Core\FormBuilder\FormBuilder;
use Core\Localization\Localization;
use Corcel\Model\Post;
use Core\JsonQueryBuilder\JsonQueryBuilder;

class HomeController extends Controller{

    public function index(){
        // $req = (new Request())->all();
        // dd(request()->all());
        // $locale = 'en';
        // $localization = new Localization($locale);
        // echo $localization->translate('say', ['name' => 'آرش']) . PHP_EOL;

        // echo lang('fa')->translate('welcome');

        $name = "arash";

        // blade('index', compact('name'));

        blade('index', compact('name'));
        
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

//        echo lang('fa')->translate('welcome');

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

    public function store($id){
        dd("Store Data . $id");
    }

    // public function api(){
    //     return [
    //         'name' => 'arash'
    //     ];
    // }

    // public function display_category_posts(string $category) : void{
    //     $posts = Post::taxonomy('category', $category)->first();
    //     dd($posts);
    //     blade('index', compact('posts'));
    // }

    public function jsonHanlde(){
        $jsonHandle = new JsonQueryBuilder('app/Controllers/users.json');

        $result = $jsonHandle->select(['name', 'age'])
            ->from('books')
            ->get();

        $count = $jsonHandle->count();

        $result = $jsonHandle->select(['id', 'name', 'age'])
            ->from('users')
            ->orderBy('id','desc')
            ->where('age', '>', '30')
            ->get();

        $find = $jsonHandle->find('name','arash')->get();
        $first = $jsonHandle->where('name', '=', 'arash')->first();
        dd($first);
    }

}