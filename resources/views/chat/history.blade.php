@extends('test.header')

@section('content')
<div class="d-flex flex-row rounded-lg overflow-hidden shadow w-100" style="margin:1%; overflow-x: hidden;">
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
                <div class="media"><img src="{{asset($user['image'])}}" alt="" class="rounded-circle" style="margin-right: 20px; width: 50px; height: 50px; object-fit: cover;">
                  <div class="media-body ml-4">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                      <h6 class="mb-0">{{ $user->name }}</h6><small class="small font-weight-bold">25 Dec</small>
                    </div>
                    @foreach($allChat->reverse() as $chat) 
                      @if($chat->sender_id == $user->id || $chat->receiver_id == $user->id)
                        <p class="font-italic mb-0 text-small">{{ $chat->message }}</p>
                        @break
                      @endif
                    @endforeach
                  </div>
                </div>
              </a>
            </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="align-items-center" style="min-width:100%; margin-rigth:1%">
    <div class="col-7 px-0">
      <div class="px-4 py-5 pt-0 chat-box bg-white w-100 chat">
          <div class="d-flex flex-row media w-100 py-3 mb-3 position-sticky sticky-top bg-white justify-content-start" style="max-height: 20%;">
              <img src="{{asset($seller['image'])}}" alt="" class="rounded-circle" style="margin-right: 20px; width: 50px; height: 50px; object-fit: cover;">
              <div class="d-flex flex-row align-items-center" style="width: 50%">
                  <div class="d-flex flex-column justify-content-start">
                      <p class="m-0">{{ $seller->name }}</p>
                      <p class="m-0">{{ $seller->location }}</p>
                  </div>
              </div>
          </div>
          <div class="messages" style="min-height: 51vh; max-height:51vh; overflow-y: auto;">
            @foreach($chats as $chat)
              @if($chat->receiver_id == $otherUserId)
                @include('broadcast', ['message' => $chat->message])
              @else
                @include('receive', ['message' => $chat->message])
              @endif
            @endforeach
          </div>
      </div>
  
      <!-- Typing area -->
      <div class="position-sticky sticky-top">
        <form id="chatForm" class="bg-light" action="{{ route('sendMessage' , ['userId'=> $otherUserId])}}" method="post">
          @csrf
          <div class="input-group">
            <input id="message" name="message" type="text" placeholder="Type a message" class="form-control rounded-0 border-0 py-4 bg-light">
            <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script>
  const pusher  = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {cluster: 'ap1', encrypted: true});
  const channel = pusher.subscribe('public');

  //Receive Messages
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
  $("#chatForm").submit(function (event) {
   event.preventDefault();
   $.ajax({
      url: "/sendMessage",
      method: 'POST',
      headers: {
         'X-Socket-Id': pusher.connection.socket_id
      },
      data: {
         _token: '{{ csrf_token() }}',
         message: $("#message").val(), // Menggunakan id langsung
      }
   }).done(function (res) {
      $(".messages").append(res); // Menggunakan .append() untuk menambahkan pesan
      $("#message").val(''); // Mengosongkan input setelah pesan terkirim
      $(document).scrollTop($(document).height());
   });
});

</script>