@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="text-center ">
                    <h1>Task Management System</h1>
                    <p>
                        Manage your tasks easily, create new tasks, and track their progress.
                    </p>
 
                    <a href="{{ route('task.create') }}" class="btn btn-primary btn-sm">Create New Task</a>
 
                    @auth
                        <a href="{{ route('task.index') }}" class="btn btn-secondary btn-sm">View Your Tasks</a>
                    @else
                        <p class="mt-3">Please log in to view and manage your tasks.</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
