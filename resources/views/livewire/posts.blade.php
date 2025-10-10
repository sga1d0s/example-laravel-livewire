<div>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr wire:key='{{ $post->id }}'>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->text }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
