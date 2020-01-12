@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Patient <small>Adding New Patient</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <form class="form-horizontal form-label-left" action="{{route('registration.store')}}" method="post" data-parsley-validate>
                    @csrf
                    <span class="section">Registration Info</span>
                    <!-- Checkup Date -->
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="checkupDate">
                            Check-Up Date
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="date" id="checkupDate" name="checkupDate" class="form-control" required="required" data-parsley-trigger="change">
                        </div>
                    </div>

                    <!-- Patient -->
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="patients">
                            Patient
                        </label>
                        <div class="col-md-6 col-sm-6" id="patients">
                            <select name="patient" class="selectpicker form-control" data-live-search="true">
                                <option>=====Select One====</option>
                                @foreach ($patients as $patient)
                                <option value="{{$patient->id}}">{{$patient->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Doctor -->
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="doctors">
                            Doctor
                        </label>
                        <div class="col-md-6 col-sm-6" id="doctors">
                            <select name="doctor" class="selectpicker form-control" data-live-search="true">
                                <option>=====Select One====</option>
                                @foreach ($doctors as $doctor)
                                <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <a class="btn btn-primary" href="{{route('index')}}">Cancel</a>
                            <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection