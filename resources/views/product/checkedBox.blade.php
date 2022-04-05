@extends('layout')

@section('title', 'Add Fleet Owner ')

@section('content')


<div class="content-area py-1">
	<div class="container-fluid">
		<div class="box box-block bg-white">
			<a href="{{ route('/') }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> Back</a>

			<h5 style="margin-bottom: 2em;">Add a tour</h5>

			<form class="form-horizontal" action="{{route('/')}}" method="POST" enctype="multipart/form-data" role="form">
				{{csrf_field()}}
				<div class="form-group row">
					<label for="tour name" class="col-xs-12 col-form-label">Tour Name</label>
					<div class="col-xs-10">
						<input class="form-control" type="text" value="{{ old('tour_name') }}" name="tour_name" required id="tour_name" placeholder="Tour Name">
					</div>
				</div>

				<div class="form-group row">
					<label for="city from" class="col-xs-12 col-form-label">City From</label>
					<div class="col-xs-10">
						<input class="form-control" type="text" value="{{ old('city_from') }}" name="city_from" required id="city_from" placeholder="City From">
					</div>
				</div>

				<div class="form-group row">
					<label for="city to" class="col-xs-12 col-form-label">City To</label>
					<div class="col-xs-10">
						<input class="form-control" type="text" value="{{ old('city_to') }}" required name="city_to" value="{{old('city_to')}}" id="city_to" placeholder="City To">
					</div>
				</div>


				<div class="form-group">
					<label for="">Service Type: </label>
					<p class="text-muted">Please select the service type. </p>
					<table class="table table-responsive">
						<thead>
							<tr>
								<th>Checkbox</th>
								<th>Type</th>
								<th>One Way</th>
								<th>Two way</th>
							</tr>
						</thead>
						<tbody>
							{{$service_types = ["z-classic", "innova", "tarzen", "safari"]; }}
							@foreach($service_types as $service_type)
							<tr>
								<td>
									<input class="service_type" type="checkbox" id="service_type_{{ $loop->iteration }}" name="service_type_id[{{ $loop->iteration }}]" value="{{$service_type}}">
								</td>
								<td>
									<label class="checkbox-inline" for="service_type_{{ $loop->iteration }}">{{$service_type}}</label>
								</td>
								<td>
									<input class="form-control price d-none one-way-price" type="text" name="car_price_one_way[{{ $loop->iteration }}]" id="car_price_one_way" placeholder="Car price for One way">
								</td>
								<td>
									<input class="form-control price d-none two-way-price" type="text" name="car_price_two_way[{{ $loop->iteration }}]" id="car_price_two_way" placeholder="Car price for Two way">
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="form-group row">
					<div class="col-xs-10">
						<button type="submit" class="btn btn-primary">Add tour</button>
						<a href="{{route('/')}}" class="btn btn-default">Cancel</a>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>

<script>
	const serviceTypes = document.querySelectorAll('.service_type')
	const prices = document.querySelectorAll('.price')



	serviceTypes.foreach((serviceType, index) => {
		if(serviceType.checked){
			prices[index].classList.remove('d-none')
		}
	})
</script>

@endsection