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
                        <h3>Viewing Application #{{ getAppCode($data['id']) }}</h3>
                        <hr>
                        <ul class="list-group">
                            <li class="list-group-item active">Applicant: {{ $data['results'][0]->user_id }}</li>
                            <li class="list-group-item">Application Type: {{ $data['results'][0]->type }}</li>
                            <li class="list-group-item">Driver's Test Score: {{ $data['results'][0]->dts }}</li>
                            <li class="list-group-item">State: {{ $data['results'][0]->state }}</li>
                            <li class="list-group-item">Status: {{ $data['results'][0]->status }}</li>
                            <li class="list-group-item">Address: {!!  $data['results'][0]->address  !!}</li>
                            <li class="list-group-item">Approval status:
                                @if($data['results'][0]->approved == 0)
                                    <label class="badge badge-warning">Pending</label>
                                @elseif($data['results'][0]->approved == 3)
                                    <label class="badge badge-warning">Waiting for processor</label>
                                @elseif($data['results'][0]->approved == 2)
                                    <label class="badge badge-danger">Rejected</label>
                                @else
                                    <label class="badge badge-success">Approved</label>

                                @endif
                            </li>
                        </ul>
<p>&nbsp;</p>
                        <h3>Approval status Logs</h3>
                        @php
                        $i=1;
                        @endphp
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Status</th>
                                <th>Comments</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($data['status_logs'] as $log)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td> @if($log->status == 0)
                                            <label class="badge badge-warning">Pending</label>
                                        @elseif($log->status == 3)
                                            <label class="badge badge-warning">Waiting for processor</label>
                                        @elseif($log->status == 2)
                                            <label class="badge badge-danger">Rejected</label>
                                        @else
                                            <label class="badge badge-success">Approved</label>

                                        @endif</td>
                                    <td>{{ $log->comment }}</td>
                              </tr>
                            @empty
                                <div class="alert alert-danger">
                                    No data
                                </div>
                            @endforelse
                            </tbody>
                        </table>


                        <p>&nbsp;</p>
                        <h3>Change application status</h3>

                        <form action="{{ route('mang.update.app.status') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="status">Approval status</label>
                                <select name="status" id="" class="form-control">

                                    <option value="3">Approve</option>
                                    <option value="2">Reject</option>
                                </select>
                                <input type="hidden" name="app_id" value="{{ $data['results'][0]->id }}">
                            </div>
                            <div class="form-group">
                                <label for="">Comments</label>
                                <textarea name="comments" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                            <button class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
