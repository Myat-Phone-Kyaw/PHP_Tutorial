@extends('./../layout.app')

@section('contents')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Admin Dashboard</h3>
                </div>
                <div class="card-body">
                    <div class="float-right">
                        <a href={{ url('major') }} class="btn btn-outline-primary">Majors</a>
                        <a href={{ url('student') }} class="btn btn-outline-primary">Students</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection