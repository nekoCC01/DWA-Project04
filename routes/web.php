<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/debug', function () {

    $debug = [
        'Environment'                  => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases                         = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases']                = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: ' . $e->getMessage();
    }

    dump($debug);
});


Route::get('/', 'QuoteController@welcome');


/*
 * Quotes
 */
# Create a quote
Route::get('/quote/create', 'QuoteController@create');
Route::post('/quote', 'QuoteController@store');
# Edit a quote
Route::get('/quote/edit/{quote_id}', 'QuoteController@edit');
Route::post('/quote/update/{quote_id}', 'QuoteController@update');
# View all quotes
Route::get('/quote/all', 'QuoteController@all');
# View a single quote
Route::get('/quote/single/{quote_id}', 'QuoteController@single');
/*
 * Bulding relations
 */
# relate to concept
Route::get('/quote/add_concept/{quote_id}', 'QuoteController@add_concept');
Route::post('/quote/store_concept/{quote_id}', 'QuoteController@store_concept');
# relate to argument
Route::get('/quote/add_argument/{quote_id}', 'QuoteController@add_argument');
Route::post('/quote/store_argument/{quote_id}', 'QuoteController@store_argument');


/*
 * Concepts
 */
# Create a concept
Route::get('/concept/create', 'ConceptController@create');
Route::post('/concept', 'ConceptController@store');
# Create a definition
Route::get('/concept/create_definition/{concept_id}', 'ConceptController@create_definition');
Route::post('/concept/definition', 'ConceptController@store_definition');
# Edit a concept
Route::get('/concept/edit/{quote_id}', 'ConceptController@edit');
Route::post('/concept/update/{quote_id}', 'ConceptController@update');
# Edit a definition
Route::get('/concept/edit_definition/{definition_id}', 'ConceptController@edit_definition');
Route::post('/concept/definition/update/{definition_id}', 'ConceptController@update_definition');
# View all concepts
Route::get('/concept/all', 'ConceptController@all');
# View a single concept, with its definitions
Route::get('/concept/single/{concept_id}', 'ConceptController@single');
/*
 * Bulding relations
 */
# relate to quote
Route::get('/concept/add_quote/{concept_id}', 'ConceptController@add_quote');
Route::post('/concept/store_quote/{concept_id}', 'ConceptController@store_quote');
# relate to argument
Route::get('/concept/add_argument/{concept_id}', 'ConceptController@add_argument');
Route::post('/concept/store_argument/{concept_id}', 'ConceptController@store_argument');

/*
 * Arguments
 */
# Create an argument
Route::get('/argument/create', 'ArgumentController@create');
Route::post('/argument', 'ArgumentController@store');
# Edit an argument
Route::get('/argument/edit/{argument_id}', 'ArgumentController@edit');
Route::post('/argument/update/{argument_id}', 'ArgumentController@update');
# View all arguments
Route::get('/argument/all', 'ArgumentController@all');
# View a single argument
Route::get('/argument/single/{argument_id}', 'ArgumentController@single');



