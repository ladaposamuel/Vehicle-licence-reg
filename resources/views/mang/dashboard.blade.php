@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ title_case(Auth::user()->mang_type) }}'s Dashboard</div>

                    <div class="card-body">
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                <div class="alert alert-danger">
                                    Total Registrants: <b>{{ $data['tot_regs'] }}</b>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="alert alert-danger">
                                    Total Open Applications: <b>{{ $data['tot_op_apps'] }}</b>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="alert alert-danger">
                                    Total Approved Applications: <b>{{ $data['tot_appr_apps'] }}</b>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="alert alert-danger">
                                    Total Rejected Applications: <b>{{ $data['tot_dappr_apps'] }}</b>
                                </div>
                            </div>
                        </div>
                        @if(Auth::user()->mang_type == "processor")
                            <h3>Awaiting final Approvals</h3>
                            <ul class="list-group">
                                @php $i=1; @endphp
                                @forelse($data['aw_appr'] as $aw)
                                    <li class="list-group-item">{{ $i++ }}) <a href="#">#{{ $aw->code }}</a></li>
                                @empty
                                    <div class="alert alert-danger">
                                        No Data
                                    </div>
                                @endforelse
                            </ul>
                        @endif
                        <hr/>
                        <h3>View reports</h3>

                        <form action="{{ route('mang.reports.show') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="select">Params</label>
                                <select name="option" id="" class="form-control">
                                    <option value="tot_regs">Registrants</option>
                                    <option value="all_apps">All Applications</option>
                                    <option value="tot_op_apps">Open Applications</option>
                                    <option value="tot_appr_apps">Approved Applications</option>
                                    <option value="tot_dappr_apps">Rejected Applications</option>
                                </select>
                            </div>
                            <button class="btn btn-success">Spool reports</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
