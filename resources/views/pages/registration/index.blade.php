@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table Registration<small>All registrations</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <th scope="col">Check-Up Date</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Patient Name</th>
                                    <th scope="col">Doctor Name</th>
                                    <th scope="col">Actions</th>
                                </thead>

                                <tbody>
                                    @foreach($datas as $data)
                                    <tr scope="row">
                                        <td>{{$data->checkupDate}}</td>
                                        <td>{{$data->number}}</td>
                                        <td>{{$data->patient->name}}</td>
                                        <td>{{$data->doctor->name}}</td>
                                        <td>
                                            <!--Edit Button-->
                                            <a class="btn btn-primary" href="{{route('registration.show',['id'=> $data->id])}}">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <!--Delete Button-->
                                            <a class="del-btn btn btn-danger" data-id="{{$data->id}}"><i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(".del-btn").click(function() {
        let id = $(this).attr('data-id');
        if (confirm("Are you sure want to delete this data? ")) {
            $.ajax({
                    url: "{{url('/')}}/registration/" + id,
                    method: "POST",
                    data: {
                        _token: "{{csrf_token()}}",
                        _method: "DELETE",
                    }
                })
                .then(function(data) {
                    location.reload();
                });
        }
    })
</script>
@endpush