@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Employee
                    <a href="{{ route('employee.create') }}" class="btn btn-primary btn-sm float-right">Add</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th width="15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $model)
                            <tr>
                                <td>{{ $model->first_name }}</td>
                                <td>{{ $model->last_name }}</td>
                                <td>{{ $model->company->name ?? 'N/a' }}</td>
                                <td>{{ $model->email }}</td>
                                <td>{{ $model->phone }}</td>
                                <td>
                                    <a href="{{ route('employee.edit', $model->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('employee.destroy', $model->id) }}" method="POST" class="btn-delete" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    {{-- <a href="{{ route('employee.destroy', $model->id) }}" class="">Delete</a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">{{ $list->links() }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-delete').on('submit', function(e) {
                e.preventDefault();
                if(confirm("Are you sure you want to delete?")) {
                    this.submit();
                }
            });
        });
    </script>
    @endpush
</div>
@endsection
