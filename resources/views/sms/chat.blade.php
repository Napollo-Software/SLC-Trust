<div id="chatContent">
    @if ($messages->isNotEmpty())
        @foreach ($messages as $message)
            <div class="chat-content-rightside">
                <div class="d-flex ms-auto">
                    <div class="flex-grow-1 me-2">
                        <p class="mb-0 chat-time text-end">{{ $message->created_at->format('H:iA') }}</p>
                        <p class="chat-right-msg">{{ $message->message }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@if ($messages->isEmpty())
    <div class="center-chat" id="startChatSection">
        <i class="bx bx-conversation"></i>
        <h5 style="font-size: 50px;"> Send Messages 👋</h5>
    </div>
@endif
