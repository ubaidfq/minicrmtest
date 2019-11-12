@php
$route_name = isset($company) ? 'company.update' : 'company.store';
$title = isset($company) ? 'Edit company' : 'Add company';
$company_id = $company->id ?? null;

@endphp

<form method="POST" action="{{ route($route_name, $company_id) }}" enctype="multipart/form-data">
    @csrf
    @if(isset($company))
        @method('PUT')
    @endif
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name') ?? $company->name ?? '' }}">
            @if($errors->has('name'))
                <small class="text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="email" id="email" placeholder="abc@example.com" value="{{ old('email') ?? $company->email ?? '' }}">
            @if($errors->has('email'))
                <small class="text-danger">{{ $errors->first('email') }}</small>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="logo" class="col-sm-2 col-form-label">Logo</label>
        <div class="col-sm-10">
            @if(isset($company))
                <img src="{{ Storage::url('logos/'.$company->logo) }}" height="100">
            @endif
            <input type="file" class="form-control" name="logo" id="logo">
            @if($errors->has('logo'))
                <small class="text-danger">{{ $errors->first('logo') }}</small>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="website" class="col-sm-2 col-form-label">Website</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="website" id="website" placeholder="http://www.example.com" value="{{ old('website') ?? $company->website ?? '' }}">
            @if($errors->has('website'))
                <small class="text-danger">{{ $errors->first('website') }}</small>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
