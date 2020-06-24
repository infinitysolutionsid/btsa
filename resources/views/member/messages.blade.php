<div class="message-wrapper">
    <ul class="messages">
        @foreach ($messages as $message)
        <li class="message clearfix">

            <div class="{{($message->from == Auth::id())?'sent':'received'}}">
                <p>{{$message->body}}</p>
                <p class="date">{{date('d M y', strtotime($message->created_at))}}</p>
            </div>
        </li>
        @endforeach
    </ul>

</div>
<div class="input-text">
    <input type="text" name="message" class="submitform" autofocus>
</div>
