@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Add Company
                </div>
                <div class="card-body">
                    @include('company.partials.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
