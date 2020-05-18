<ul class="list-unstyled">
    <table class="table table-bordered">
        <tr>
            <th>status</th>
            <th>tasks</th>
        </tr>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->status }} </td>
                <td>{!! link_to_route('tasks.show', $task->content, ['id' => $task->id]) !!} </td>
            </tr>
        @endforeach
    </table>        
</ul>