
@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
			<h2 style="text-align:center; margin-top:20%; color:grey; font-size:50px;"class="text-uppercase text-center alert alert-warning">{{ "Post Not Found" }}{{" ! "}}</h2>
		</div>
            @include('layouts.sidebar')
        </div>
    </div>

@endsection