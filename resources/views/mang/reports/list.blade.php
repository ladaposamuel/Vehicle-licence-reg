@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <a href="{{ route('mang.dashboard') }}" class="btn btn-primary">Go back</a>
                <hr>
                <div class="card">
                    <div class="card-header">Reviewer's Dashboard</div>

                    <div class="card-body">
                        <h3>{{ title_case($data['title']) }} Reports</h3>
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Driver's test Score</th>
                                <th>State</th>
                                <th>Status</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($data['results'] as $app)
                                <tr>
                                    <td>{{ $app->code }}</td>
                                    <td>{{ $app->type }}</td>
                                    <td>{{ $app->dts }}</td>
                                    <td>{{ $app->state }}</td>
                                    <td>{{ title_case(str_replace("_"," ",$app->status)) }}</td>
                                    <td>{{ $app->address }}</td>
                                    <td><a href="{{ route('mang.view.app',$app->id) }}" class="btn btn-sm btn-primary">View</a> </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    No data
                                </div>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
