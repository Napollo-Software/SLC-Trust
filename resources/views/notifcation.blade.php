@extends("nav")
@section('title', 'Notifcations | Intrustpit')
@section("wrapper")
<style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap);

a {
  text-decoration: none;
}
.logo-title{
	font-size: 25px;
    font-weight: bold;
    color: #9e0000;
}
.section-50 {
  padding: 50px 0;
}
.m-b-50 {
  margin-bottom: 50px;
}
.dark-link {
  color: #333;
  text-decoration:none!important;
}
.heading-line {
  position: relative;
  padding-bottom: 5px;
}
.heading-line:after {
  content: "";
  height: 4px;
  width: 75px;
  background-color: #0355d0;
  position: absolute;
  bottom: 0;
  left: 0;
}
.notification-ui_dd-content {
  margin-bottom: 30px;
}
.notification-list {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  padding: 20px;
  margin-bottom: 7px;
  background: #fff;
  -webkit-box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
}
.notification-list--unread {
  border-left: 2px solid #0355d0;
}
.notification-list--read {
  border-left: 2px solid #2ecfde;
}
.notification-list .notification-list_content {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}
.notification-list .notification-list_content .notification-list_img img {
  height: 48px;
  width: 48px;
  border-radius: 50px;
  margin-right: 20px;
}
.notification-list .notification-list_content .notification-list_detail p {
  margin-bottom: 5px;
  line-height: 1.2;
}
.notification-list .notification-list_feature-img img {
  height: 48px;
  width: 48px;
  border-radius: 5px;
  margin-left: 20px;
}
</style>
            @php
            $name = App\Models\User::where('id', '=', Session::get('loginId'))->value('name');
            @endphp
          <div class="">
            <div style="display: flex">
            <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / Notifcations</h5>
            <button style="margin-right: 0.5%;margin-left:auto" class="btn btn-secondary mb-3 remove-notification" data-id="0"><i class="menu-icon tf-icons bx bx-copy-alt"></i>Read All</button>
          </div>
          <div class="d-flex justify-content-center">
          <div class="read-all col-md-9">
            @foreach($notifcation as $data)
            <div class="notification-list notification-list--read rounded div-{{$data->id}} pt-2 pb-2" >
              <div class="notification-list_content">
                <div class="notification-list_img rounded-circle bg-success">  </div>
                <div class="notification-list_detail ">
                  <b>{{ $data->title }}</b> 
                  <p class="text-muted pt-1">{{ $data->description }}</p>
                  <p class="text-muted pt-1"><small>at {{date('m/d/Y h:i A',strtotime($data->created_at))}}</small></p>
                </div>
              </div>
              <div class="notification-list_feature-img rounded-circle" style="margin-top:-15px;margin-right:-28px;background-color:white;height:20px"> <button type="button" class="btn-close remove-notification" data-id="{{$data->id}}" data-bs-dismiss="alert" aria-label="Close"></button> </div>
            </div>
              {{-- <div class="row div-{{$data->id}}" style="margin-bottom: 10px">
                <div class="col-lg-12 mb-12">
                  <div class="card">
                    <div style="display: flex">
                    <h5 class="card-header"><b>{{ $data->title }}</b><small> at ({{date('m/d/Y h:i A',strtotime($data->created_at))}})</small> </h5>
                    <div class="alert-success" style="border-radius:50%;margin-left: auto; margin-right: -9px;margin-top:-9px;background-color:white;height:1%"><button type="button" class="btn-close remove-notification" data-id="{{$data->id}}" data-bs-dismiss="alert" aria-label="Close"></button></div>
                  </div>
                    <p style="margin-left: 25px;">{{ $data->description }} </p>
                  </div>
                </div>
              </div> --}}
            @endforeach
          </div>
          </div>
        </div>
          
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
  $(document).on('click','.remove-notification',function(){
    var id = $(this).attr('data-id');
    $.ajax({
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
      type : "post",
      url : "{{route('read.all.notificaion')}}",
      data : { "key" : id},
      success:function(){
        if( id == 0){
          swal.fire('success!','All notifications has been readed successfully','success');
          $('.read-all').addClass('d-none');
        }else{
          $('.div-'+ id).addClass('d-none');
        }
      },
      error:function(xhr){
        erroralert(xhr);
      }
    })
  })
</script>
