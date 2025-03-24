<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>
<body>

    <h2>To-Do List</h2>

    <!-- Add Task Form -->
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('PATCH')  <!-- Add this line -->
    <button type="submit">Mark as Completed</button>
</form>


    <!-- Task List -->
    <ul>
        @foreach ($tasks as $task)
            <li>
                {{ $task->name }} - 
                @if ($task->status)
                    ✅ Completed
                @else
                    ❌ Pending
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit">Mark as Completed</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>

</body>
</html>
