<?php
use Stichoza\GoogleTranslate\GoogleTranslate;
/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
   $jsonData = json_decode(file_get_contents('https://strapi-lifelog.herokuapp.com/posts?author.id=1&_sort=id:DESC&_limit=1'));
   print_r($jsonData[0]->content);

   $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
$tr->setSource('en'); // Translate from English
$tr->setSource(); // Detect language automatically
$tr->setTarget('zh-TW'); // Translate to Georgian

echo '<br>'. $tr->translate($jsonData[0]->content);
});