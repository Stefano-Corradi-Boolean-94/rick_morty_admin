@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <h2>HOME DASHBOARD</h2>
                    <p>
                        Numero caratteri presenti nel DB: {{ $n_characters }}
                    </p>
                    <p>
                        Numero caratteri eliminati: {{ $n_deleted }}
                    </p>
                    <p>
                        Totale caratteri compresi quelli eliminati: {{ $n_characters_all }}
                    </p>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
