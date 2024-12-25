@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-info">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="">
                                View Task
                            </div>
                            <div class="">
                                <a href="{{ route('task.index') }}" class="btn btn-primary btn-sm">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table bg-info">
                            <tr>
                                <td style="width:15%;"><strong>Title:</strong></td>
                                <td>{{ $task->title }}</td>
                            </tr>
                            
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td>
                                    @if($task->status == 'Pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($task->status == 'In Progress')
                                        <span class="badge bg-info">In Progress</span>
                                    @elseif($task->status == 'Completed')
                                        <span class="badge bg-success">Completed</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Due Date:</strong></td>
                                <td>
                                    {{ date('M d, Y', strtotime($task->due_date)) }}
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Description:</strong></td>
                                <td>{{ $task->description }}</td>
                            </tr>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
