@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tasks</div>

                <div class="card-body">
                    <!-- Add Task Form -->
                    <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="title" class="form-control" placeholder="Task title" required>
                            </div>
                            <div class="col-md-4">
                                <select name="priority" class="form-control" required>
                                    <option value="high">High Priority</option>
                                    <option value="medium" selected>Medium Priority</option>
                                    <option value="low">Low Priority</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">Add</button>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <textarea name="description" class="form-control" placeholder="Description (optional)"></textarea>
                            </div>
                        </div>
                    </form>

                    <!-- Tasks List -->
                    @foreach($tasks as $task)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="mb-1 {{ $task->completed ? 'text-muted text-decoration-line-through' : '' }}">
                                            {{ $task->title }}
                                        </h5>
                                        <small class="text-muted">Priority: {{ ucfirst($task->priority) }}</small>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-success me-2">
                                                {{ $task->completed ? 'Undo' : 'Complete' }}
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#editTask{{ $task->id }}">
                                            Edit
                                        </button>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                @if($task->description)
                                    <p class="mb-0 mt-2">{{ $task->description }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editTask{{ $task->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('tasks.update', $task) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Task</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Title</label>
                                                <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea name="description" class="form-control">{{ $task->description }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Priority</label>
                                                <select name="priority" class="form-control" required>
                                                    <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High Priority</option>
                                                    <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium Priority</option>
                                                    <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low Priority</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
</div>
@endsection