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
		'Environment' => App::environment(),
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
		$databases = DB::select('SHOW DATABASES;');
		$debug['Database connection test'] = 'PASSED';
		$debug['Databases'] = array_column($databases, 'Database');
	} catch (Exception $e) {
		$debug['Database connection test'] = 'FAILED: '.$e->getMessage();
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
# View all quotes
Route::get('/quote/all', 'QuoteController@all');
# View a single quote
Route::get('/quote/single/{quote_id}', 'QuoteController@single');

/*
 * Concepts
 */
# Create a concept
Route::get('/concept/create', 'ConceptController@create');
Route::post('/concept', 'ConceptController@store');
# Create a definition
Route::get('/concept/create_definition/{concept_id}', 'ConceptController@create_definition');
Route::post('/concept/definition', 'ConceptController@store_definition');
# View all concepts
Route::get('/concept/all', 'ConceptController@all');
# View a single concept, with its definitions
Route::get('/concept/single/{concept_id}', 'ConceptController@single');

/*
 * Arguments
 */
# Create an argument
Route::get('/argument/create', 'ArgumentController@create');
Route::post('/argument', 'ArgumentController@store');
# View all arguments
Route::get('/argument/all', 'ArgumentController@all');
# View a single argument
Route::get('/argument/single/{argument_id}', 'ArgumentController@single');



