@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        New Task
    </div>
    <div class="card-body">
        <form action="{{ url('task/'. $post->id) }}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="task" class="col-12 control-label">Edit Task</label>
                <div class="col-12">
                    <input type="text" name="task" id="task-name" class="form-control" value="{{ $post->name }} ">
                    @error("task")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="col-offset-3 col-6">
                    <button type="submit" class="btn btn-light btn-sm border">
                        Update Task
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection