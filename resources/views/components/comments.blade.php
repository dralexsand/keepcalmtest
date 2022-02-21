@foreach($comments as $comment)
    <div class="display-comment">
        <strong>{{ $comment->user->email }}</strong>
        <br>
        <span>{{ $comment->body }}</span>
        <br>
        <i class="small">{{ $comment->created_at }}</i>
        <hr>
    </div>
@endforeach
