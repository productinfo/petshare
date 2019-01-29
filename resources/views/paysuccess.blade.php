@extends('layouts.app')

@section('content')

    <div class="card-header">Pay Success</div>

    <div class="card-body">

        <p>Congratulations!  You paid with Stripe</p>
        <p>{{ $amount }} will be billed to your credit card for a {{ $subscription }} subscription</p>

    </div>

@endsection
