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

                        <h3>List of registrants</h3>

                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Sex</th>

                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['results'] as $user)
                            <tr>
                                <td>{{ $user->firstname }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->sex }}</td>

                                <td><a href="" class="btn btn-sm btn-primary">View</a> </td>
                            </tr>
@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
