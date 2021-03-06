@if(count($tasks) <= 0)
    You don't have any task created yet!!
    Maybe, <a href="{{ route('task_create') }}">Create</a> one?
@else
    <div class="row">
        @foreach($tasks as $task)

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->name }}</h5>
                        <p class="card-text">{{ $task->description }}</p>
                        @if(getTaskStatus($task) !== "Completed")
                            <form id="form-{{$task->id }}" method="post"
                                  action="{{ route('task.complete', ['id' => $task->id]) }}">
                                @csrf()
                                <input type="checkbox" class="form-check" id="{{ $task->id}}"
                                       onchange="changeTaskStatus({{ $task->id }})"/>
                            </form>
                        @endif
                        <br />
                        <span class="badge badge-success">{{ getTaskStatus($task)  }}</span> <br/>
                        <span class="text-primary">
                            Created By:
                            <br/>
{{--                            {{ $task->user->name }}--}}
                        </span> <br/><br/>
                        <span class="text-primary">
                            Ends at:
                            <br/>
                            {{ date('H:i a, d-m-Y', strtotime($task->end_time)) }}
                        </span>
                        <br/><br/>
                        <a class="btn btn-success " onclick="return confirm('Are you sure?') " href="{{ route('task.edit', ['id' => $task->id]) }}">Edit</a>
                        <a class="btn btn-danger " onclick="return confirm('Are you sure?') " href="{{ route('task.destroy', ['id' => $task->id]) }}">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
            @endif
    </div>


    <script>
        function changeTaskStatus(taskId) {
            const form = document.getElementById(`form-${taskId}`);
            form.submit();
        }
    </script>
