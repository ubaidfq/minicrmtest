@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Employee
                </div>
                <div class="card-body">
                    @include('employee.partials.form', ['employee' => $employee])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
