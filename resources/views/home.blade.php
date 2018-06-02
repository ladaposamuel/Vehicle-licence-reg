@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard {{ checkPendingApps(Auth::id()) }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if(checkProfileCompletion(Auth::id()) == 0)
                            <div class="alert alert-success">
                                <b>One last step to go,</b> <a href="{{ route('users.profile') }}">Click here to
                                    complete your profile</a>
                            </div>
                        @else
                            <h3>Hello, {{ Auth::user()->firstname }}</h3>
                            <b>Vehicle permit status : <b> <i class="fa fa-circle"></i>
                                    @if(checkPendingApps(Auth::id()) == '')
                                        <b>Inactive</b>
                                        <hr/>
                                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#myModal">Click
                                            here to apply</a>
                                    @elseif(checkPendingApps(Auth::id()) == 0)
                                        <i>Waiting for Approvals</i>
                                    @elseif(checkPendingApps(Auth::id()) == 3)
                                        <i>Waiting for Approvals</i>
                                    @elseif(checkPendingApps(Auth::id()) == 2)
                                        <i>Rejected</i>
                                    @elseif(checkPendingApps(Auth::id()) == 1)
                                        Active
                                        <hr/>
                                        <a class="btn btn-primary" href="#">Click
                                            here to Print</a>

                        @endif


                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Vehicles licence form</h4>
                </div>
                <div class="modal-body">

                    <form action="{{ route('users.application.save') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="occupation"
                                   class="col-sm-4 col-form-label text-md-right">Application type</label>
                            <div class="col-md-6">
                                <select name="type" id="" class="form-control">
                                    <option>Articulated vehicle</option>
                                    <option>Commercial vehicle</option>
                                    <option>Private vehicle</option>
                                    <option>Motorcycle</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dts"
                                   class="col-sm-4 col-form-label text-md-right">Driver's Test Score</label>
                            <div class="col-md-6">
                                <input id="dts" type="number" class="form-control"
                                       name="dts" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dts"
                                   class="col-sm-4 col-form-label text-md-right">State</label>
                            <div class="col-md-6">
                                <select name="state" class="form-control">

                                    <option>ABUJA FCT</option>
                                    <option>ABIA</option>
                                    <option>ADAMAWA</option>
                                    <option>AKWA IBOM</option>
                                    <option>ANAMBRA</option>
                                    <option>BAUCHI</option>
                                    <option>BAYELSA</option>
                                    <option>BENUE</option>
                                    <option>BORNO</option>
                                    <option>CROSS RIVER</option>
                                    <option>DELTA</option>
                                    <option>EBONYI</option>
                                    <option>EDO</option>
                                    <option>EKITI</option>
                                    <option>ENUGU</option>
                                    <option>GOMBE</option>
                                    <option>IMO</option>
                                    <option>JIGAWA</option>
                                    <option>KADUNA</option>
                                    <option>KANO</option>
                                    <option>KATSINA</option>
                                    <option>KEBBI</option>
                                    <option>KOGI</option>
                                    <option>KWARA</option>
                                    <option>LAGOS</option>
                                    <option>NASSARAWA</option>
                                    <option>NIGER</option>
                                    <option>OGUN</option>
                                    <option>ONDO</option>
                                    <option>OSUN</option>
                                    <option>OYO</option>
                                    <option>PLATEAU</option>
                                    <option>RIVERS</option>
                                    <option>SOKOTO</option>
                                    <option>TARABA</option>
                                    <option>YOBE</option>
                                    <option>ZAMFARA</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dts"
                                   class="col-sm-4 col-form-label text-md-right">Application status</label>
                            <div class="col-md-6">
                                <input type="radio" name="status" value="first_time" id="first_time"><label
                                        for="first_time">First Time</label>
                                <input type="radio" name="status" value="renewal" id="renewal"><label for="renewal">Renewal</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state"
                                   class="col-sm-4 col-form-label text-md-right">Residential Address</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="address"
                                          id="">{{ Auth::user()->address }}</textarea>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-default">Submit</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endsection
