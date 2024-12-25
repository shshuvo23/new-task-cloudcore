@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-info">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="">
                                Add new Task
                            </div>
                            <div class="">
                                <a href="{{ route('task.index') }}" class="btn btn-primary btn-sm">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('task.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Task Title</label>
                                <input type="text" class="form-control shadow-none" id="title"  name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control shadow-none" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="" class="d-none">Select</option>
                                    <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    
                            <div class="mb-3">
                                <label for="due_date" class="form-label">Due Date</label>
                                <input type="text" class="form-control shadow-none date" id="due_date" name="due_date" value="{{ old('due_date') }}">
                                @error('due_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
