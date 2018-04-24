@extends('layouts.default')

@section('content')
	<ul class="tabs tabs-fixed-width">
		<li class="tab"><a href="#step1">Suas informações</a></li>
		<li class="tab"><a href="#step2">Endereço</a></li>
		<li class="tab"><a href="#step3">Pagamento</a></li>
	</ul>

	<form action="{{ $id }}" method="post">
		
		{{ csrf_field() }}
		
		<div id="step1">
			<p>Preencha suas informações</p>
			<div class="row">
				<div class="input-field col s12">
					<input type="text" id="senderName" name="senderName">
					<label for="senderName">Nome completo</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input type="text" id="senderCPF" name="senderCPF">
					<label for="senderCPF">CPF</label>
				</div>
				<div class="input-field col s6">
					<input type="text" id="senderEmail" name="senderEmail">
					<label for="senderEmail">Email</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input type="text" id="senderPhone" name="senderPhone">
					<label for="senderPhone">Contato</label>
				</div>
			</div>
		</div>
		<div id="step2">
			<p>Informe os dados para entrega</p>
		</div>
		<div id="step3">
			<p>Preencha os dados para pagamento</p>
			
			<div class="row">
				<div class="input-field col s6">
					<button type="submit" class="btn">Pagar</button>
				</div>
			</div>
		</div>
	</form>
@endsection