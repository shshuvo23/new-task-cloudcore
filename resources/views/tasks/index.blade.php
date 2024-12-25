@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card bg-info p-3">
                <div class="col-12">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h1 class="h4">All Tasks</h1>
                            <a href="{{ route('task.create') }}" class="btn btn-primary">Add New Task</a>
                        </div>                
                    </div>
                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('task.index') }}" class="mb-4">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-4">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-control form-select shadow-none" onchange="this.form.submit()">
                                    <option value="">All</option>
                                    <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="sort_by" class="form-label">Sort By</label>
                                <select name="sort_by" class="form-control form-select shadow-none" onchange="this.form.submit()">
                                    <option value="">Default</option>
                                    <option value="due_date" {{ request('sort_by') == 'due_date' ? 'selected' : '' }}>Due Date</option>
                                </select>
                            </div>
                            @if (Request::get('status') || Request::get('sort_by'))
                                <div class="col-md-4">
                                    <a href="{{ route('task.index') }}" class="btn btn-danger">Clear Filters</a>
                                </div>
                            @endif
                        </div>
                    </form>
    
                    <!-- Tasks Grid -->
                    <div class="row g-4">
                        @forelse ($tasks as $task)
                            <div class="col-md-6 col-lg-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $task->title }}</h5>
                                        <p class="card-text text-truncate" style="max-width: 250px;">
                                            {{ $task->description }}
                                        </p>
                                        <span class="badge 
                                            @if ($task->status == 'Pending') bg-warning 
                                            @elseif($task->status == 'In Progress') bg-primary 
                                            @else bg-success @endif">
                                            {{ $task->status }}
                                        </span>
                                        <p class="mt-2">
                                            <small>
                                                <strong>Due:</strong>
                                                {{ $task->due_date ? date('M d, Y', strtotime($task->due_date)) : 'N/A' }}
                                            </small>
                                        </p>
                                        <div class="d-flex justify-content-between mt-3">
                                            <a href="{{ route('task.view', $task->id) }}" class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('task.edit', $task->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                            <form action="{{ route('task.destroy', $task->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this task?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-warning text-center">No tasks found.</div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
