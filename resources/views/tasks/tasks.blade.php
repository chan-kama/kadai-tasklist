<ul class="list-unstyled">
    @foreach ($tasks as $task)
        <li class="media mb-3">
            <div class="media-body">
                <div>
                    <p class="mb-0">{!! link_to_route('tasks.show', $task->content, ['id' => $task->id]) !!} </p>
                </div>
            </div>
        </li>
    @endforeach
</ul>