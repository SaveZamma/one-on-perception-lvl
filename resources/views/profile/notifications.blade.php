@extends('components.layout')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('scripts')
    <script type="text/javascript" src="{{\Illuminate\Support\Facades\URL::to('src/js/notifications.js')}}"></script>
@endsection

@section('page-content')
    <h2>Notifications</h2>
    @if ($notifications->count() == 0)
        <p>You have zero notification.</p>
    @else
    <ul class="products-list fx-col" style="gap:10px;">
        @foreach ($notifications as $n)
            <li class="card-border fx-row fx-space-between v-align-center" style="padding: 0.2rem 1rem;">
                <section class="notification fx-col">
                    <span class="infotext">{{$n['created_at']->format('d M Y H:i')}}</span>
                    <h3>{{$n['title']}}</h3>
                    <p>{{$n['text']}}</p>
                </section>
                <section class="fx-row" style="padding: 7px;">
                    <button class="primary read-btn" data-notif-id="{{ $n->id }}" data-read="{{ $n->read }}"
                        title="{{$n['read'] ? "Mark as unread" : "Mark as read"}}">
                        <span class="mail-icon">
                            @if ($n->read)
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" alt="open envelope" class="primary button">
                                    <path d="M64 208.1L256 65.9 448 208.1l0 47.4L289.5 373c-9.7 7.2-21.4 11-33.5 11s-23.8-3.9-33.5-11L64 255.5l0-47.4zM256 0c-12.1 0-23.8 3.9-33.5 11L25.9 156.7C9.6 168.8 0 187.8 0 208.1L0 448c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-239.9c0-20.3-9.6-39.4-25.9-51.4L289.5 11C279.8 3.9 268.1 0 256 0z"/>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" alt="closed envelope" class="primary button">
                                    <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                                </svg>
                            @endif
                        </span>
                    </button>
                    <button class="secondary delete-btn" data-notif-id="{{ $n->id }}" title="Delete notification">
                        <span class="delete-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" alt="trash bin" class="secondary button" style="margin-left: 20px;">
                                <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                            </svg>
                        </span>
                    </button>
                </section>
            </li>
        @endforeach
    </ul>
    @endif

@endsection
