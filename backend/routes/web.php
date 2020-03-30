<?php

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'places'], function() use($app) {

        // Lists places & allows filtering
        $app->get('/', 'PlaceController@index');

        // Retrieve a place by id
        $app->get('{id}', 'PlaceController@find');

        // Creates a new place
        $app->post('/', 'PlaceController@create');

        // Updates a place by id
        $app->put('{id}', 'PlaceController@update');
    }
);

$app->group(['prefix' => 'categories'], function() use($app) {

        // Lists Categories & allows filtering
        $app->get('/', 'CategoryController@index');

        // Retrieve a Category by id
        $app->get('{id}', 'CategoryController@find');

        // Creates a new Category
        $app->post('/', 'CategoryController@create');

        // Updates a Category by id
        $app->put('{id}', 'CategoryController@update');
    }
);

$app->group(['prefix' => 'reviews'], function() use($app) {

        // Lists Categories & allows filtering
        $app->get('/', 'ReviewController@index');

        // Retrieve a Review by id
        $app->get('{id}', 'ReviewController@find');

        // Creates a new Review
        $app->post('/', 'ReviewController@create');

        // Updates a Review by id
        $app->put('{id}', 'ReviewController@update');
    }
);

$app->group(['prefix' => 'users'], function() use($app) {

        // Lists Categories & allows filtering
        $app->get('/', 'UserController@index');

        // Retrieve a User by id
        $app->get('{id}', 'UserController@find');

        // Creates a new User
        $app->post('/', 'UserController@create');

        // Updates a User by id
        $app->put('{id}', 'UserController@update');
    }
);