@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Profile</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                        <form action="{{ route('users.profile.update') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="firstname"
                                       class="col-sm-4 col-form-label text-md-right">Firstname</label>
                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control"
                                           name="firstname" value="{{ Auth::user()->firstname }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname"
                                       class="col-sm-4 col-form-label text-md-right">Lastname</label>
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control"
                                           name="lastname" value="{{ Auth::user()->lastname }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dob"
                                       class="col-sm-4 col-form-label text-md-right">dob</label>
                                <div class="col-md-6">
                                    <input id="dob" type="date" class="form-control"
                                           name="dob" value="{{ Auth::user()->dob }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sex"
                                       class="col-sm-4 col-form-label text-md-right">Sex</label>
                                <div class="col-md-6">
                                    <select name="sex" class="form-control">
                                        <option value="male" {{ Auth::user()->sex == 'male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="female" {{ Auth::user()->sex == 'female' ? 'selected' : '' }}>
                                            Female
                                        </option>
                                    </select>


                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="state"
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
                                <label for="occupation"
                                       class="col-sm-4 col-form-label text-md-right">Occupation</label>
                                <div class="col-md-6">
                                    <input id="occupation" type="text" class="form-control"
                                           name="occupation" value="{{ Auth::user()->occupation }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="state"
                                       class="col-sm-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="address" id="" >{!!  Auth::user()->address  !!}</textarea>
                                </div>
                            </div>


                            <button class="btn btn-primary text-center">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
