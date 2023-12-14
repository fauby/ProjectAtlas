@extends ('test.header')

@section('content')
    <div class="row rounded-lg overflow-hidden shadow" style="margin:1%;">
      <!-- Users box-->
      <div class="col-5 px-0">
        <div class="bg-white">
  
          <div class="bg-gray px-4 py-2 bg-light">
            <p class="h5 mb-0 py-1">Recent</p>
          </div>
  
          <div class="messages-box">
            <div class="list-group rounded-0">
              <a class="list-group-item list-group-item-action active text-white rounded-0">
                <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                  <div class="media-body ml-4">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                      <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">25 Dec</small>
                    </div>
                    <p class="font-italic mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                  </div>
                </div>
              </a>
  
              <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                  <div class="media-body ml-4">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                      <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">14 Dec</small>
                    </div>
                    <p class="font-italic text-muted mb-0 text-small">Lorem ipsum dolor sit amet, consectetur. incididunt ut labore.</p>
                  </div>
                </div>
              </a>
  
              <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                  <div class="media-body ml-4">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                      <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">9 Nov</small>
                    </div>
                    <p class="font-italic text-muted mb-0 text-small">consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                  </div>
                </div>
              </a>
  
              <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                  <div class="media-body ml-4">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                      <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">18 Oct</small>
                    </div>
                    <p class="font-italic text-muted mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                  </div>
                </div>
              </a>
  
              <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                  <div class="media-body ml-4">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                      <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">17 Oct</small>
                    </div>
                    <p class="font-italic text-muted mb-0 text-small">consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                  </div>
                </div>
              </a>
  
              <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                  <div class="media-body ml-4">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                      <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">2 Sep</small>
                    </div>
                    <p class="font-italic text-muted mb-0 text-small">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                </div>
              </a>
  
              <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                  <div class="media-body ml-4">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                      <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">30 Aug</small>
                    </div>
                    <p class="font-italic text-muted mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                  </div>
                </div>
              </a>
  
              <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                  <div class="media-body ml-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">21 Aug</small>
                    </div>
                    <p class="font-italic text-muted mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                  </div>
                </div>
              </a>
  
            </div>
          </div>
        </div>
      </div>
      <!-- Chat Box-->
      <div class="col-7 px-0">
        <div class="px-4 py-5 pt-0 chat-box bg-white w-100">
            <div class="d-flex flex-row media w-100 py-3 mb-3 position-sticky sticky-top bg-white justify-content-between" style="max-height: 20%;">
                <div class="d-flex flex-row align-items-center" style="width: 50%">
                    <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/12.webp" alt="user" style="height: 100%; " class="me-3">
                    <div class="d-flex flex-column justify-content-start">
                        <p class="m-0">Kaos oblong</p>
                        <p class="m-0">Rp. 120.000</p>
                    </div>
                </div>
                <div class="media-body">
                    <div class="rounded py-2 px-3 mb-2">
                        <p class="text-small mb-0 text-muted">Buat penawaran</p>
                        <div class="d-flex flex-row">
                            <div class="form-outline w-100" style="width: 250px;">
                              <input type="number" id="typeNumber" class="form-control" />
                              <label class="form-label" for="typeNumber">Rp</label>
                            </div>
                            <a href="#" class="btn btn-warning shadow-0"> Tawar </a>
                          </div>
                    </div>
                </div>
            </div>
          <!-- Sender Message-->
          <div class="media w-80 mb-3" style = "margin-right: 50%;"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
            <div class="media-body ml-3">
              <div class="bg-light rounded py-2 px-3 mb-2">
                <p class="text-small mb-0 text-muted">Test which is a new approach all solutions</p>
              </div>
              <p class="small text-muted">12:00 PM | Aug 13</p>
            </div>
          </div>
  
          <!-- Reciever Message-->
          <div class="media w-80 ml-auto mb-3" style = "margin-left: 50%;">
            <div class="media-body">
              <div class="bg-primary rounded py-2 px-3 mb-2">
                <p class="text-small mb-0 text-white">Test which is a new approach to have all solutions</p>
              </div>
              <p class="small text-muted">12:00 PM | Aug 13</p>
            </div>
          </div>
  
          <!-- Sender Message-->
          <div class="media w-80 mb-3" style = "margin-right: 50%;"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
            <div class="media-body ml-3">
              <div class="bg-light rounded py-2 px-3 mb-2">
                <p class="text-small mb-0 text-muted">Barang ready!</p>
              </div>
              <p class="small text-muted">12:00 PM | Aug 13</p>
            </div>
          </div>
  
          <!-- Reciever Message-->
          <div class="media w-80 ml-auto mb-3" style = "margin-left: 50%;">
            <div class="media-body">
              <div class="bg-primary rounded py-2 px-3 mb-2">
                <p class="text-small mb-0 text-white">Apakah bisa kirim ke bojong santos?</p>
              </div>
              <p class="small text-muted">12:00 PM | Aug 13</p>
            </div>
          </div>
  
          <!-- Sender Message-->
          <div class="media w-80 mb-3" style = "margin-right: 50%;"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
            <div class="media-body ml-3">
              <div class="bg-light rounded py-2 px-3 mb-2">
                <p class="text-small mb-0 text-muted">Bisa ongkirnya 20 ribu ya</p>
              </div>
              <p class="small text-muted">12:00 PM | Aug 13</p>
            </div>
          </div>
  
          <!-- Reciever Message-->
          <div class="media w-80 ml-auto mb-3" style = "margin-left: 50%;">
            <div class="media-body">
              <div class="bg-primary rounded py-2 px-3 mb-2">
                <p class="text-small mb-0 text-white">Oke kirim rekeningnya ya</p>
              </div>
              <p class="small text-muted">12:00 PM | Aug 13</p>
            </div>
          </div>
  
        </div>
  
        <!-- Typing area -->
        <form action="#" class="bg-light">
          <div class="input-group">
            <input type="text" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
            <div class="input-group-append">
              <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
            </div>
          </div>
        </form>
  
      </div>
    </div>
  </div>
@endsection