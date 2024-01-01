@extends ('test.header')
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
@section('content')
    <div class="row rounded-lg overflow-hidden shadow" style="margin:1%; min-height: 85vh; max-height: 51vh;">
      <!-- Users box-->
      <div class="col-5 px-0">
        <div class="bg-white">
  
          <div class="bg-gray px-4 py-2 bg-light">
            <p class="h5 mb-0 py-1">Recent</p>
          </div>
  
          <div class="messages-box">
            @foreach($users as $user)
                <div class="list-group rounded-0">
                  <a class="list-group-item list-group-item-action active text-white rounded-0" href="{{ route('chat.history', ['userId' => $user->id]) }}">
                    <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                      <div class="media-body ml-4">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                          <h6 class="mb-0">{{ $user->name }}</h6><small class="small font-weight-bold">25 Dec</small>
                        </div>
                        <p class="font-italic mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                      </div>
                    </div>
                  </a>
                </div>
            @endforeach
          </div>
        </div>
      </div>
      <!-- Chat Box-->
      <!-- Di antarmuka pengguna -->
      {{-- <a href="{{ route('chat.history', ['userId' => $otherUserId]) }}">Lihat Histori Chat</a> --}}
      {{-- @extends('chat.history') --}}
    </div>
  </div>
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>
  const pusher  = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {cluster: 'ap1', encrypted: true});
  const channel = pusher.subscribe('messagesChannel');

  //Receive messages
  channel.bind('chat', function (data) {
    $.post("/receive", {
      _token:  '{{csrf_token()}}',
      message: data.message,
    })
     .done(function (res) {
       $(".messages > .message").last().after(res);
       $(document).scrollTop($(document).height());
     });
  });

  //Broadcast messages
  $("form").submit(function (event) {
    event.preventDefault();

    $.ajax({
      url:     "/broadcast",
      method:  'POST',
      headers: {
        'X-Socket-Id': pusher.connection.socket_id
      },
      data:    {
        _token:  '{{csrf_token()}}',
        message: $("form #message").val(),
      }
    }).done(function (res) {
      $(".messages > .message").last().after(res);
      $("form #message").val('');
      $(document).scrollTop($(document).height());
    });
  });

</script>
@endsection
