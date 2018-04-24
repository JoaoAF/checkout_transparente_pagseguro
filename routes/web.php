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

Route::post('/checkout/{id}', function($id){

	$data = [
		'items' => [
			[
				'id' => '18',
				'description' => 'Item Um',
				'quantity' => '1',
				'amount' => '1.15',
				'weight' => '45',
				'shippingCost' => '3.5',
				'width' => '50',
				'height' => '45',
				'length' => '60',
			],
			[
				'id' => '19',
				'description' => 'Item Dois',
				'quantity' => '1',
				'amount' => '3.15',
				'weight' => '50',
				'shippingCost' => '8.5',
				'width' => '40',
				'height' => '50',
				'length' => '80',
			],
		],
		'shipping' => [
			'address' => [
				'postalCode' => '06410030',
				'street' => 'Rua Leonardo Arruda',
				'number' => '12',
				'district' => 'Jardim dos Camargos',
				'city' => 'Barueri',
				'state' => 'SP',
				'country' => 'BRA',
			],
			'type' => 2,
			'cost' => 30.4,
		],
		'sender' => [
			'email' => 'c92859879617463884392@sandbox.pagseguro.com.br',
			'name' => 'Isaque de Souza Barbosa',
			'documents' => [
				[
					'number' => '01234567890',
					'type' => 'CPF'
				]
			],
			'phone' => '11985445522',
			'bornDate' => '1988-03-21',
		]
	];

	$checkout = PagSeguro::checkout()->createFromArray($data);
	$checkout = PagSeguro::checkout()->createFromArray($data);
	$credentials = PagSeguro::credentials()->get();
		
		print_r($credentials);

	$information = $checkout->send($credentials); 
	// Retorna um objeto de laravel\pagseguro\Checkout\Information\Information
	
	/*if ($information) {
		print_r($information->getCode());
		print_r($information->getDate());
		print_r($information->getLink());
	}*/

return $data;

});