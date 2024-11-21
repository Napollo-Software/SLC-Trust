@extends('nav')
@section('title', 'Referral Senior Life Care Trusts')
@section('wrapper')
<style>
    @keyframes slideIn {
        from {
            transform: translateY(100%);
        }

        to {
            transform: translateY(10%);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .center-chat {
        background-color: white;
        height: 50vh;
        width: 100%;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-size: 80px;
    }

    .center-chat i,
    .center-chat h5,
    .center-chat .subtitle {
        opacity: 0;
        animation: fadeIn 1s ease forwards;
    }

    .center-chat i {
        animation-delay: 1s;
    }

    .center-chat h5 {
        animation-delay: 1.5s;
    }

    .center-chat .subtitle {
        animation-delay: 2s;
    }

</style>

<div class="page-content">
    <div class="chat-wrapper ">
        <div class="chat-sidebar">
            <div class="chat-sidebar-header" >
                <div class="d-flex align-items-center">
                    @foreach ($user as $user )
                    <div class="chat-user-online" >
                        <!-- # image if needed -->
                        <img src="{{ url('/user/images93561655300919_avatar.png')}}" width="45" height="45" class="rounded-circle" alt="">
                    </div>
                    <div class="flex-grow-1 ms-2" >

                        <p class="mb-0">{{$user->name}}</p>
                        @endforeach

                    </div>
                    <div class="dropdown">
                        <div class="cursor-pointer font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="javascript:;">Settings</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Help &amp; Feedback</a>
                            <a class="dropdown-item" href="javascript:;">Enable Split View Mode</a>
                            <a class="dropdown-item" href="javascript:;">Keyboard Shortcuts</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Sign Out</a>
                        </div>
                    </div>
                </div>
                <div class="mb-3"></div>
                <div class="input-group input-group-sm"> <span class="input-group-text bg-transparent"><i class="bx bx-search"></i></span>
                <input type="text" class="form-control" id="searchInput" oninput="searchReferral()" placeholder="People, groups, & messages">
                    <span class="input-group-text bg-transparent"><i class="bx bx-dialpad"></i></span>
                </div>
                <div class="chat-tab-menu mt-3">

                </div>
            </div>
            <div class="chat-sidebar-content">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-Chats">
                        <div class="chat-list ps ps--active-y" style="height: 400px;">
                            <div class="list-group list-group-flush">
                                @foreach ($referral as $referral)
                                <a href="javascript:;" class="list-group-item" id="chatLink" data-referral-id="{{ $referral->id }}" data-first-name="{{ $referral->first_name }}" data-last-name="{{ $referral->last_name }}">
                                    <div class="d-flex">
                                        <div class="chat-user-online">
                                            <img src="{{ url('/user/images93561655300919_avatar.png')}}" width="45" height="45" class="rounded-circle" alt="">
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class="mb-0 chat-title">{{ $referral->first_name }} {{ $referral->last_name }}</h6>
                                            @php
                                            $hasMessages = false;
                                            $latestMessage = null;
                                            @endphp
                                            @foreach ($message as $sms)
                                            @if ($sms->to == $referral->id)
                                            <p class="mb-0 chat-msg">{{ $sms->message }}</p>
                                            @php
                                            $hasMessages = true;
                                            $latestMessage = $sms;
                                            @endphp
                                            @break
                                            @endif
                                            @endforeach
                                            @if (!$hasMessages)
                                            <p class="mb-0 chat-msg">Tap to chat</p>
                                            @endif
                                        </div>
                                        @if ($hasMessages)
                                        <div class="chat-time">{{ $latestMessage->created_at->format('H:i:A') }}</div>
                                        @endif
                                    </div>
                                </a>
                                @endforeach

                            </div>
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; height: 300px; right: 0px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 169px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-section">
            <div class="chat-header d-flex align-items-center">
                <div class="chat-toggle-btn"><i class="bx bx-menu-alt-left"></i>
                </div>
                <div>

                    <h4 class="mb-1 font-weight-bold active-chat">{{$user->name}}</h4>
                    <div class="list-inline d-sm-flex mb-0 d-none"> <a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary"><small class="bx bxs-circle me-1 chart-online"></small>Active Now</a>
                    </div>
                </div>

            </div>

            <div class="chat-content ps ps--active-y">
                <div class="center-chat">
                    <i class="bx bx-conversation"></i>
                    <h5 style="font-size: 50px;"> Send Messages 👋</h5>
                </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; height: 520px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 235px;"></div>
                </div>
            </div>
            <form id="messageForm">
                @csrf
                <div class="chat-footer d-flex align-items-center d-none">
                    <input type="hidden" class="chatTo" id="chatTo" name="chatTo">
                    <div class="flex-grow-1 pe-2">
                        <div class="input-group"> <span class="input-group-text"></span>
                            <input type="text" class="form-control" name="message" placeholder="Type a message">
                        </div>
                    </div>
                    <div class="chat-footer-menu">
                    <button  type="submit" onclick="submitForm(event);" class="btn primary mb-2"><i style="font-size: 30px;" class="bx bx-send"></i></button>
                    </div>
                </div>
            </form>
            <div class="overlay chat-toggle-btn-mobile"></div>
        </div>
    </div>
</div>
<script>
    function searchReferral() {
        let searchKeyword = document.getElementById('searchInput').value.toLowerCase();
        let chatLinks = document.querySelectorAll('.list-group-item');

        chatLinks.forEach(function(link) {
            let userName = link.querySelector('.chat-title').textContent.toLowerCase();
            if (userName.includes(searchKeyword)) {
                link.style.display = "block";
            } else {
                link.style.display = "none";
            }
        });
    }
</script>


<script>
    function submitForm(event) {
        event.preventDefault();
        var formData = $('#messageForm').serialize();

        $.ajax({
            type: 'POST',
            url: '/sms/send',
            data: formData,
            success: function(response) {
                var createdDate = new Date(response.latestChat.created_at);
                var newMessageHtml = '<div class="chat-content-rightside">' +
                    '<div class="d-flex ms-auto">' +
                    '<div class="flex-grow-1 me-2">' +
                    '<p class="mb-0 chat-time text-end">' + createdDate.toLocaleTimeString('en-US', {
                        hour: 'numeric',
                        minute: 'numeric',
                        hour12: true
                    }) + '</p>' +
                    '<p class="chat-right-msg">' + response.latestChat.message + '</p>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                $('.chat-content').html(response.html);
                $('#chatContent').append(newMessageHtml);

                var userId = response.latestChat.to;
                var chatLink = $('[data-referral-id="' + userId + '"]');
                chatLink.find('.chat-msg').text(response.latestChat.message);
                chatLink.find('.chat-time').text(createdDate.toLocaleTimeString('en-US', {
                    hour: 'numeric',
                    minute: 'numeric',
                    hour12: true
                }));

                document.getElementById('messageForm').reset();
                var startChatSection = $('#startChatSection');
                if (startChatSection.length > 0) {
                    startChatSection.hide();
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>

<script>
    new PerfectScrollbar('.chat-list');
    new PerfectScrollbar('.chat-content');
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var chatLinks = document.querySelectorAll('.list-group-item');
        var chatFooter = document.querySelector('.chat-footer');
        chatLinks.forEach(function(chatLink) {
            chatLink.addEventListener('click', function() {
                var referralId = this.getAttribute('data-referral-id');
                var firstName = this.getAttribute('data-first-name');
                var lastName = this.getAttribute('data-last-name');
                document.querySelector('.active-chat').textContent = firstName + " " + lastName;
                document.querySelector('.chatTo').textContent = referralId;
                chatFooter.classList.remove('d-none')

                $.ajax({
                    url: "{{ route('sms.details') }}",
                    type: 'POST',
                    data: {
                        id: referralId,
                        _token: '{{csrf_token()}}',
                    },
                    success: function(response) {
                        console.log(response);
                        $('.chat-content').html(response.html);

                        $('#chatTo').val(referralId);
                    },
                    error: function(response) {
                        console.error(response);
                    }
                });
            });
        });
    });
</script>

@endsection
