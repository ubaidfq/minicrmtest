@php
$route_name = isset($employee) ? 'employee.update' : 'employee.store';
$title = isset($employee) ? 'Edit employee' : 'Add employee';
$employee_id = $employee->id ?? null;
@endphp

<form method="POST" action="{{ route($route_name, $employee_id) }}">
    @csrf
    @if(isset($employee))
        @method('PUT')
    @endif
    <div class="form-group row">
        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ old('first_name') ?? $employee->first_name ?? '' }}">
            @if($errors->has('first_name'))
                <small class="text-danger">{{ $errors->first('first_name') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ old('last_name') ?? $employee->last_name ?? '' }}">
            @if($errors->has('last_name'))
                <small class="text-danger">{{ $errors->first('last_name') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="company_id" class="col-sm-2 col-form-label">Company</label>
        <div class="col-sm-10">
            <select name="company_id" class="form-control">
                @foreach(\App\Company::select_box() as $option_key => $option_value)
                    <option value="{{ $option_key }}" {{ $option_key == old('company_id') || (isset($employee) && $option_key == $employee->company_id) ? 'selected' : '' }}>{{ $option_value }}</option>
                @endforeach
            </select>
            {{-- <input type="text" class="form-control" name="company_id" id="company_id" placeholder="Company" value="{{ old('company_id') ?? $employee->company_id ?? '' }}"> --}}
            @if($errors->has('company_id'))
                <small class="text-danger">{{ $errors->first('company_id') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') ?? $employee->email ?? '' }}">
            @if($errors->has('email'))
                <small class="text-danger">{{ $errors->first('email') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ old('phone') ?? $employee->phone ?? '' }}">
            @if($errors->has('phone'))
                <small class="text-danger">{{ $errors->first('phone') }}</small>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
