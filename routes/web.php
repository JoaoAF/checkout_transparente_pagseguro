<?php

Route::get('/', function () {
	return view('welcome');
})->name('pagseguro.redirect');


Route::get('/notify', function () {
	return view('welcome');
})->name('pagseguro.notification');


Route::get('/checkout/{id}', function($id){
	return view('store.checkout', compact('id'));
});

Route::post('/pagseguro/notification', [
    'uses' => '\laravel\pagseguro\Platform\Laravel5\NotificationController@notification',
    'as' => 'pagseguro.notification',
]);	

Route::post('/checkout', function()){

	$data = [
		'items' => [
			[
				'id' => '18',
				'description' => 'Massagem',
				'quantity' => '1',
				'amount' => '100',
				'weight' => '0',
				'shippingCost' => '0',
				'width' => '50',
				'height' => '45',
				'length' => '60',
			],
			[
				'id' => '19',
				'description' => 'Massagem II',
				'quantity' => '1',
				'amount' => '100',
				'weight' => '50',
				'shippingCost' => '0',
				'width' => '40',
				'height' => '50',
				'length' => '60',
			],
		],
		'shipping' => [
			'address' => [
				'postalCode' => '06410030',
				'street' => 'Rua dos bobos',
				'number' => '0',
				'district' => 'Parque 7 anões',
				'city' => 'Alicelandia',
				'state' => 'CE',
				'country' => 'BRA',
			],
			'type' => 2,                                  
			'cost' => 30,
		],
		'sender' => [
			'email' => 'joao@sandbox.pagseguro.com.br',
			'name' => 'João Paulo de Araújo Ferreira',
			'documents' => [
				[
					'number' => '01234567890',
					'type' => 'CPF'
				]
			],
			'phone' => '11985445522',
			'bornDate' => '1998-03-23',
		]
	];

	$checkout = PagSeguro::checkout()->createFromArray($data);
	$credentials = PagSeguro::credentials()->get();
		
		//print_r($credentials);

	$information = $checkout->send($credentials); 
	// Retorna um objeto de laravel\pagseguro\Checkout\Information\Information
	
	if ($information) {
		print_r($information->getCode());
		print_r($information->getDate());
		print_r($information->getLink());
	}

});
