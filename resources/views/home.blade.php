@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="content-center">
                      <a href="{{ route('member') }}" type="button" class="btn btn-info margin-button">Members Page</a>
                      <a href="{{ route('transaction') }}" type="button" class="btn btn-info margin-button">Transactions Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
