<div class="dropdown notifications">
    <button type="button" aria-haspopup="true" aria-expanded="false"
            data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                        <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                            <span class="icon-wrapper-bg bg-light"></span>
                            <i class="icon text-secondary ion-android-notifications"></i>
                            @if(count(auth()->user()->unreadNotifications))
                                <span
                                    class="badge badge-dot badge-dot-sm badge-danger count-notifications">{{ count(auth()->user()->unreadNotifications) }}</span>
                            @endif
                        </span>
    </button>

    <div tabindex="-1" role="menu" aria-hidden="true"
         class="dropdown-menu-lg dropdown-menu dropdown-menu-right">
        <div class="dropdown-menu-header border-bottom border-light">
            <div class="dropdown-menu-header-inner py-2">
                <div class="menu-header-content btn-pane-right text-dark">
                    <h5 class="menu-header-title">{{ __('app.Notifications') }}</h5>

                    <div class="menu-header-btn-pane">
                        <button type="button" id="mark-all" aria-haspopup="true"
                                data-toggle="{{ count(auth()->user()->unreadNotifications) ? 'tooltip' : '' }}"
                                data-placement="left"
                                title="{{ __('app.Mark all as read') }}" aria-expanded="false"
                                class="p-0 btn dd-chart-btn"
                            {{ count(auth()->user()->unreadNotifications) ? '' : 'disabled' }}>
                                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                                <span class="icon-wrapper-bg bg-light"></span>
                                                <i class="icon text-dark pe-7s-mail{{ count(auth()->user()->unreadNotifications) ? '-open' : '' }}"></i>
                                            </span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <div class="scroll-area-md">
            <div class="scrollbar-container">
                <!-- Notifications List -->
                <ul class="list-group list-group-flush">
                    @forelse (auth()->user()->notifications as $notification)
                        @php
                            $check_communication = $notification->type == 'App\Notifications\CommunicationNotification' ? true : false;
                            $check_suggestion = $notification->type == 'App\Notifications\SuggestionNotification' ? true : false;
                            $check_complatin = $notification->type == 'App\Notifications\ComplaintNotification' ? true : false;
                            $check_activity = $notification->type == 'App\Notifications\ActivityNotification' ? true : false;
                            $check_task = $notification->type == 'App\Notifications\TaskNotification' ? true : false;
                            $check_task_review = $notification->type == 'App\Notifications\TaskReviewNotification' ? true : false;
                            $check_to_do_list = $notification->type == 'App\Notifications\ToDoListNotification' ? true : false;
                            $check_coaching = $notification->type == 'App\Notifications\CoachingNotification' ? true : false;
                            $check_coachee = $notification->type == 'App\Notifications\CoacheeNotification' ? true : false;

                            $link="javascript:void(0)";
                            if($check_communication)
                                $link='/communication';
                            elseif ($check_suggestion)
                                $link='/suggestion';
                            elseif ($check_complatin)
                                $link='/complaint';
                            elseif ($check_activity)
                                $link='/activity';
//                             elseif ($check_task)
//                                 $link='/suggestion';
                            elseif ($check_task_review)
                                $link='/task/review';
                            elseif ($check_to_do_list)
                                $link='/to-do-list';
                            elseif ($check_coaching)
                                $link='/sme/application-list';
                            elseif ($check_coachee)
                              $link='/sme/list';
                        @endphp
                        <li class="list-group-item px-2">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <!-- Notification Icon -->
                                    <div class="widget-content-left mr-3">
                                        <div class="icon-wrapper border-light rounded-circle justify-content-center">
                                            <a href="{{$link}}" class="icon-wrapper-bg bg-light"></a>
                                            @if ($check_task || $check_task_review)
                                                <svg width="30" fill="#0071C1" viewBox="0 0 512 512">
                                                    <g transform="translate(0,512) scale(0.100000,-0.100000)"
                                                       stroke="none">
                                                        <path d="M2425 4974 c-879 -51 -1650 -559 -2030 -1338 -88 -180 -134 -301
                                                                -174 -462 -120 -473 -98 -947 65 -1409 79 -224 240 -511 394 -702 35 -43 172
                                                                -187 304 -321 221 -222 244 -242 275 -242 31 0 54 19 247 212 l213 211 88 -40
                                                                c48 -22 112 -48 141 -58 l52 -17 0 -299 0 -300 25 -24 24 -25 511 0 511 0 24
                                                                25 25 24 0 300 0 299 53 17 c28 10 92 36 140 58 l88 40 213 -211 c193 -193
                                                                215 -212 246 -212 32 0 62 27 393 357 197 197 360 368 363 380 3 12 3 32 -1
                                                                45 -4 13 -100 116 -213 230 l-205 207 40 88 c22 48 48 112 58 141 l17 52 299
                                                                0 300 0 24 25 25 24 0 511 0 511 -25 24 -24 25 -300 0 -299 0 -17 53 c-10 28
                                                                -36 92 -58 140 l-40 88 211 213 c193 193 212 216 212 247 0 31 -20 54 -242
                                                                275 -134 132 -281 271 -328 308 -352 282 -791 466 -1230 515 -103 12 -312 20
                                                                -395 15z m465 -199 c442 -73 833 -254 1150 -534 l45 -40 -56 -57 -56 -56 -79
                                                                66 c-285 240 -644 401 -1029 462 -152 24 -452 24 -600 0 -364 -58 -683 -192
                                                                -967 -407 -107 -80 -307 -280 -387 -387 -215 -284 -349 -603 -407 -967 -24
                                                                -148 -24 -448 0 -600 61 -384 222 -745 462 -1029 l66 -79 -56 -56 -57 -56 -40
                                                                45 c-281 319 -461 706 -535 1155 -28 164 -26 505 4 675 86 501 304 918 659
                                                                1261 373 360 827 566 1368 623 85 9 424 -3 515 -19z m-132 -306 c378 -41 738
                                                                -192 1024 -430 l78 -64 -320 -320 c-303 -304 -320 -323 -320 -357 0 -30 10
                                                                -48 50 -94 100 -114 169 -241 212 -390 20 -69 23 -102 23 -249 0 -147 -3 -180
                                                                -23 -249 -97 -334 -344 -581 -678 -678 -69 -20 -102 -23 -249 -23 -147 0 -180
                                                                3 -249 23 -149 43 -276 112 -390 212 -46 40 -64 50 -94 50 -34 0 -53 -17 -357
                                                                -320 l-320 -320 -64 78 c-619 744 -580 1838 90 2546 402 425 1008 649 1587
                                                                585z m1557 -499 l110 -110 -203 -203 c-173 -174 -202 -207 -202 -233 0 -17 22
                                                                -75 49 -130 27 -54 64 -143 81 -197 49 -146 25 -137 366 -137 l284 0 0 -400 0
                                                                -400 -284 0 c-341 0 -317 9 -366 -137 -17 -54 -54 -143 -81 -197 -27 -55 -49
                                                                -113 -49 -130 0 -26 29 -59 202 -233 l203 -203 -283 -282 -282 -283 -203 203
                                                                c-174 173 -207 202 -233 202 -17 0 -75 -22 -130 -49 -54 -27 -143 -64 -197
                                                                -81 -146 -49 -137 -25 -137 -366 l0 -284 -400 0 -400 0 0 284 c0 341 9 318
                                                                -137 366 -54 18 -142 54 -196 81 -55 27 -113 49 -130 49 -27 0 -57 -26 -234
                                                                -202 l-203 -203 -113 113 -112 112 396 396 396 396 67 -51 c87 -66 268 -154
                                                                369 -180 176 -45 361 -51 523 -17 235 50 466 184 616 359 249 289 334 659 237
                                                                1034 -26 101 -114 282 -180 369 l-51 67 394 394 c216 216 395 393 398 393 3 0
                                                                55 -49 115 -110z"/>
                                                        <path d="M2505 4375 c-24 -23 -25 -31 -25 -135 0 -104 1 -112 25 -135 15 -16
                                                                36 -25 55 -25 19 0 40 9 55 25 24 23 25 31 25 135 0 104 -1 112 -25 135 -15
                                                                16 -36 25 -55 25 -19 0 -40 -9 -55 -25z"/>
                                                        <path d="M1621 4134 c-29 -37 -27 -57 15 -133 61 -112 79 -131 124 -131 30 0
                                                                43 6 59 26 29 37 27 57 -15 133 -63 113 -80 131 -124 131 -30 0 -43 -6 -59
                                                                -26z"/>
                                                        <path d="M3377 4128 c-39 -53 -97 -163 -97 -185 0 -11 9 -32 21 -47 16 -20 29
                                                                -26 59 -26 45 0 63 19 124 131 42 76 44 96 15 133 -16 20 -29 26 -59 26 -32 0
                                                                -43 -6 -63 -32z"/>
                                                        <path d="M2505 3815 l-25 -24 0 -460 0 -460 -52 -24 c-67 -31 -124 -88 -155
                                                                -154 l-24 -53 -300 0 -300 0 -24 -25 c-33 -32 -33 -78 0 -110 l24 -25 300 0
                                                                300 0 24 -53 c31 -69 86 -123 156 -156 46 -22 70 -26 136 -25 128 1 215 53
                                                                275 166 31 56 34 71 35 143 0 66 -5 90 -26 136 -33 70 -87 125 -156 156 l-53
                                                                24 0 460 0 460 -25 24 c-15 16 -36 25 -55 25 -19 0 -40 -9 -55 -25z m118
                                                                -1109 c103 -43 128 -177 48 -257 -65 -65 -157 -65 -222 0 -124 123 13 325 174
                                                                257z"/>
                                                        <path d="M986 3499 c-20 -16 -26 -29 -26 -59 0 -45 19 -63 131 -124 76 -42 96
                                                                -44 133 -15 20 16 26 29 26 59 0 45 -19 63 -131 124 -76 42 -96 44 -133 15z"/>
                                                        <path d="M3015 3125 c-39 -38 -33 -74 25 -142 63 -73 125 -191 145 -274 19
                                                                -82 19 -226 0 -308 -52 -219 -247 -414 -466 -466 -82 -19 -226 -19 -308 0 -83
                                                                20 -201 82 -274 145 -68 58 -104 64 -142 25 -42 -41 -30 -85 40 -147 221 -193
                                                                521 -248 802 -146 338 122 561 483 516 835 -21 165 -95 332 -195 441 -62 69
                                                                -102 79 -143 37z"/>
                                                        <path d="M745 2615 c-16 -15 -25 -36 -25 -55 0 -19 9 -40 25 -55 23 -24 31
                                                                -25 135 -25 104 0 112 1 135 25 16 15 25 36 25 55 0 19 -9 40 -25 55 -23 24
                                                                -31 25 -135 25 -104 0 -112 -1 -135 -25z"/>
                                                        <path d="M1075 1794 c-106 -60 -115 -69 -115 -115 0 -29 6 -42 26 -58 37 -29
                                                                57 -27 133 15 112 61 131 79 131 124 0 30 -6 43 -26 59 -38 30 -59 26 -149
                                                                -25z"/>
                                                        <path
                                                            d="M4480 2560 l0 -80 80 0 80 0 0 80 0 80 -80 0 -80 0 0 -80z"/>
                                                        <path d="M3917 1202 l-57 -58 53 -52 c29 -29 57 -52 63 -52 13 0 104 93 104
                                                                106 0 5 -24 33 -53 62 l-53 52 -57 -58z"/>
                                                        <path
                                                            d="M2480 560 l0 -80 80 0 80 0 0 80 0 80 -80 0 -80 0 0 -80z"/>
                                                    </g>
                                                </svg>
                                            @endif
                                            @if ($check_communication)
                                                <svg width="30" fill="#0071C1" viewBox="0 0 57.84 43.01">
                                                    <path
                                                        d="M3.44,33.85A1.84,1.84,0,1,0,.25,35.7l3.69,6.39a1.85,1.85,0,0,0,3.2-1.85Z"></path>
                                                    <path
                                                        d="M48.39,28.08,44.27,21l-5.54-9.58L34.61,4.24a1.22,1.22,0,0,0-1.68-.42,1.28,1.28,0,0,0-.22.17l-28,27,5.54,9.58,7-2L20.35,42a1.89,1.89,0,0,0,1.84.56l9.29-2.64c.12-.07.3-.13.43-.19a1.77,1.77,0,0,0,.86-1.23L33.63,34l14.08-4a1.34,1.34,0,0,0,.75-1.74.8.8,0,0,0-.08-.16Zm-18,9.52-8.54,2.46-2-2.21L31,34.65Z"></path>
                                                    <rect x="47.8" y="8.49" width="8.49" height="2.97"
                                                          transform="translate(1.79 26.79) rotate(-29.35)"></rect>
                                                    <rect x="51.87" y="14.25" width="2.97" height="8.49"
                                                          transform="translate(21.15 64.88) rotate(-74.35)"></rect>
                                                    <rect x="41.14" y="3" width="8.48" height="2.97"
                                                          transform="translate(28.82 46.97) rotate(-74.34)"></rect>
                                                </svg>
                                            @endif
                                            @if ($check_activity)
                                                <svg width="30" fill="#0071C1" viewBox="0 0 59.04 55.49">
                                                    <path
                                                        d="M38.94,36.21A1.27,1.27,0,0,0,36.71,35l-2.54,4.52,1.71-6.81a1.27,1.27,0,1,0-2.48-.57L31.94,38V31.63a1.28,1.28,0,0,0-2.55,0v6.81l-1.46-6.3a1.28,1.28,0,0,0-1.53-1,1.26,1.26,0,0,0-.95,1.53l1.78,7.57a14.87,14.87,0,0,1-.44,2.55.06.06,0,0,0-.07-.06,8.57,8.57,0,0,0-4.45-3.57,1.19,1.19,0,1,0-.64,2.29c.83.19,1.59,1.4,2.42,2.68a12.85,12.85,0,0,0,4.2,4.51v6.81h5.6V48.3C36,47.22,36.2,42.7,36.27,41l2.67-4.77Z"></path>
                                                    <path
                                                        d="M16.48,36.72l5.53.06h0a1.27,1.27,0,1,0,0-2.54l-5.15-.07,6.74-1.71A1.25,1.25,0,0,0,23,30l-5.86,1.53,5.6-3.06a1.27,1.27,0,0,0-1.21-2.23l-6,3.18,4.84-4.26a1.26,1.26,0,1,0-1.65-1.91l-5.86,5.09a9.45,9.45,0,0,1-2.48.77s0-.07.06-.07a8.55,8.55,0,0,0,1-5.6,1.21,1.21,0,1,0-2.35.58c.19.82-.45,2-1.15,3.37a13.28,13.28,0,0,0-2,5.85L0,36.53l2.67,4.9L9,38.06c1.91,1.33,6-.58,7.51-1.34Z"></path>
                                                    <path
                                                        d="M17.18,16l1.33,5.35a1.23,1.23,0,0,0,1.21.95.61.61,0,0,0,.32-.06,1.31,1.31,0,0,0,1-1.53l-1.21-5,3.37,6a1.19,1.19,0,0,0,1.14.64,1.31,1.31,0,0,0,.64-.19,1.27,1.27,0,0,0,.51-1.72l-2.93-5.28,4.33,4.64a1.26,1.26,0,0,0,.95.38,1.5,1.5,0,0,0,.89-.31,1.3,1.3,0,0,0,.07-1.79l-4.65-5,5.41,3.63a1.36,1.36,0,0,0,.7.19,1.33,1.33,0,0,0,1.08-.57A1.31,1.31,0,0,0,31,14.57l-6.49-4.32A13.85,13.85,0,0,1,23.1,8.08h.06a8.52,8.52,0,0,0,5.66-.44,1.17,1.17,0,0,0,.45-1.59,1.15,1.15,0,0,0-1.59-.45c-.7.38-2.1.06-3.57-.25A12.46,12.46,0,0,0,17.94,5L13.3,0,9.23,3.82,14.12,9c-1,2.22,1.85,5.72,3.06,6.93Z"></path>
                                                    <path
                                                        d="M59,41,54.21,35.7c.82-2.23-2-5.73-3.18-7l-1.28-5.34a1.27,1.27,0,1,0-2.48.57l1.21,5-3.37-6.11a1.27,1.27,0,0,0-2.23,1.21l2.93,5.34-4.33-4.64a1.26,1.26,0,1,0-1.84,1.71l4.64,5-5.34-3.63A1.28,1.28,0,0,0,37.47,30l6.43,4.4a13.87,13.87,0,0,1,1.4,2.16h-.06a8.55,8.55,0,0,0-5.67.44,1.2,1.2,0,0,0-.51,1.6,1.18,1.18,0,0,0,1.6.5c.69-.38,2.09-.06,3.56.32a13.18,13.18,0,0,0,6.17.45l4.58,5L59,41Z"></path>
                                                    <path
                                                        d="M32.89,13.75a1.15,1.15,0,0,0,.45-.07L38.17,12l-5.72,3.95a1.31,1.31,0,0,0-.32,1.78,1.22,1.22,0,0,0,1,.57,1,1,0,0,0,.7-.25l5-3.44-4.2,4.78a1.29,1.29,0,0,0,.13,1.78,1.34,1.34,0,0,0,.83.32,1.13,1.13,0,0,0,1-.45L41,15.85,38,21.57a1.26,1.26,0,0,0,.51,1.72.92.92,0,0,0,.57.13,1.35,1.35,0,0,0,1.15-.7l3.69-6.87a11.49,11.49,0,0,1,2-1.59v.06a8.58,8.58,0,0,0,1,5.6,1.2,1.2,0,0,0,2-1.34c-.45-.7-.26-2.1-.07-3.62a13.55,13.55,0,0,0-.19-6.18l4.46-5.09L48.93,0,44.22,5.41c-2.29-.57-5.47,2.67-6.62,3.88l-5.22,1.85a1.3,1.3,0,0,0-.76,1.65,1.39,1.39,0,0,0,1.27,1Z"></path>
                                                </svg>
                                            @endif
                                            @if ($check_to_do_list)
                                                <svg width="30" fill="#0071C1" viewBox="0 0 32 32">
                                                    <path class="st0" d="M26.5,3h-6v1h6C26.8,4,27,4.2,27,4.5v25c0,0.3-0.2,0.5-0.5,0.5h-21C5.2,30,5,29.8,5,29.5v-25C5,4.2,5.2,4,5.5,4
                                                                h6V3h-6C4.7,3,4,3.7,4,4.5v25C4,30.3,4.7,31,5.5,31h21c0.8,0,1.5-0.7,1.5-1.5v-25C28,3.7,27.3,3,26.5,3z"/>
                                                    <path class="st0" d="M25.5,22c-0.3,0-0.5-0.2-0.5-0.5V6h-2.5C22.2,6,22,5.8,22,5.5S22.2,5,22.5,5h3C25.8,5,26,5.2,26,5.5v16
                                                                C26,21.8,25.8,22,25.5,22z M20.5,29h-14C6.2,29,6,28.8,6,28.5v-23C6,5.2,6.2,5,6.5,5h3C9.8,5,10,5.2,10,5.5S9.8,6,9.5,6H7v22h13.5
                                                                c0.3,0,0.5,0.2,0.5,0.5S20.8,29,20.5,29z"/>
                                                    <path class="st0" d="M20.5,29c-0.1,0-0.1,0-0.2,0c-0.2-0.1-0.3-0.3-0.3-0.5v-5c0-0.3,0.2-0.5,0.5-0.5h5c0.2,0,0.4,0.1,0.5,0.3
                                                                c0.1,0.2,0,0.4-0.1,0.5l-5,5C20.8,28.9,20.6,29,20.5,29z M21,24v3.3l3.3-3.3H21z M9.7,18C9.6,18,9.6,18,9.7,18
                                                                c-0.2,0-0.3-0.1-0.4-0.2l-1.2-1.3C7.9,16.3,8,16,8.2,15.8s0.5-0.2,0.7,0.1l0.8,0.9l1.6-1.7c0.2-0.2,0.5-0.2,0.7,0s0.2,0.5,0,0.7
                                                                l-2,2.1C9.9,18,9.8,18,9.7,18z M9.7,13C9.6,13,9.6,13,9.7,13c-0.2,0-0.3-0.1-0.4-0.2l-1.2-1.3C7.9,11.3,8,11,8.2,10.8
                                                                s0.5-0.2,0.7,0.1l0.8,0.9l1.6-1.7c0.2-0.2,0.5-0.2,0.7,0s0.2,0.5,0,0.7l-2,2.1C9.9,13,9.8,13,9.7,13z M17.5,23h-4
                                                                c-0.3,0-0.5-0.2-0.5-0.5s0.2-0.5,0.5-0.5h4c0.3,0,0.5,0.2,0.5,0.5S17.8,23,17.5,23z M22.5,21h-9c-0.3,0-0.5-0.2-0.5-0.5
                                                                s0.2-0.5,0.5-0.5h9c0.3,0,0.5,0.2,0.5,0.5S22.8,21,22.5,21z M22.5,16h-3c-0.3,0-0.5-0.2-0.5-0.5s0.2-0.5,0.5-0.5h3
                                                                c0.3,0,0.5,0.2,0.5,0.5S22.8,16,22.5,16z M20.5,18h-7c-0.3,0-0.5-0.2-0.5-0.5s0.2-0.5,0.5-0.5h7c0.3,0,0.5,0.2,0.5,0.5
                                                                S20.8,18,20.5,18z M17.5,16h-4c-0.3,0-0.5-0.2-0.5-0.5s0.2-0.5,0.5-0.5h4c0.3,0,0.5,0.2,0.5,0.5S17.8,16,17.5,16z M22.5,11h-9
                                                                c-0.3,0-0.5-0.2-0.5-0.5s0.2-0.5,0.5-0.5h9c0.3,0,0.5,0.2,0.5,0.5S22.8,11,22.5,11z M18.5,13h-5c-0.3,0-0.5-0.2-0.5-0.5
                                                                s0.2-0.5,0.5-0.5h5c0.3,0,0.5,0.2,0.5,0.5S18.8,13,18.5,13z M10.5,23h-2C8.2,23,8,22.8,8,22.5v-2C8,20.2,8.2,20,8.5,20h2
                                                                c0.3,0,0.5,0.2,0.5,0.5v2C11,22.8,10.8,23,10.5,23z M9,22h1v-1H9V22z M20.5,7h-9C11.2,7,11,6.8,11,6.5v-3C11,2.7,11.7,2,12.5,2
                                                                C12.8,2,13,2.2,13,2.5S12.8,3,12.5,3S12,3.2,12,3.5V6h8V3.5C20,3.2,19.8,3,19.5,3S19,2.8,19,2.5S19.2,2,19.5,2C20.3,2,21,2.7,21,3.5
                                                                v3C21,6.8,20.8,7,20.5,7z"/>
                                                    <path class="st0" d="M17.5,3C17.2,3,17,2.8,17,2.5C17,2.2,16.8,2,16.5,2h-1c-0.1,0-0.2,0-0.3,0.1C15.1,2.2,15,2.3,15,2.5
                                                                C15,2.8,14.8,3,14.5,3S14,2.8,14,2.5c0-0.5,0.2-0.9,0.6-1.2C14.9,1.1,15.2,1,15.5,1h1C17.3,1,18,1.7,18,2.5C18,2.8,17.8,3,17.5,3z"/>
                                                </svg>
                                            @endif
                                            @if ($check_suggestion)
                                                <i class="fas fa-lightbulb icon-gradient bg-happy-itmeo"></i>
                                            @endif
                                            @if ($check_complatin)
                                                <i class="fas fa-exclamation icon-gradient bg-happy-itmeo"></i>
                                            @endif
                                            @if ($check_coaching || $check_coachee)
                                                <svg width="30" fill="#0071C1" viewBox="0 0 967.2 971.76">
                                                    <path
                                                        d="M863.41,121.03v-8.9c-3.91-4.65-8.76-6.11-14.92-6.04-27.68,.31-55.37,.13-83.06,.14-12.92,0-15.55,2.61-15.56,15.67-.03,35.35-.07,70.7,.06,106.05,.02,4.6-.79,7.39-5.61,9.65-13.25,6.21-19.95,17.23-20.15,31.92-.16,11.37-.06,22.74-.07,34.11,0,8.32,0,16.63,0,24.77h-60.61c18.91-19.06,25.18-41.32,23.38-66.47-1.73-24.06-16.83-42.5-40.52-47.54-7.6-1.62-15.76-1.9-23.51-1.17-21.32,2-37.25,12.83-43.63,33.49-8.83,28.59-3.75,55.13,16.46,78.04,1.33,1.51,2.65,3.02,4.79,5.47-7.67,0-13.86,.33-20.01-.06-21.55-1.36-39.13,6.76-53.35,22.42-11.79,12.99-22.74,26.74-34.77,39.49-4.72,5.01-10.84,9.59-17.22,11.99-26.05,9.82-52.7,18.09-78.65,28.16-27.32,10.6-55.04,16.57-84.48,14.18-11.54-.94-23.22-.13-34.84-.17-2.08,0-4.16-.27-7.22-.48,15.45-17.17,21.77-36.49,21.03-58.4-1.11-32.79-21.98-53.26-54.75-53.3-27.26-.03-46.84,13.81-52.8,38.59-5.66,23.53-1.35,45.55,12.75,65.43,1.77,2.5,3.66,4.91,5.42,7.25-10.1,1.25-19.75,1.8-29.13,3.71-31.65,6.42-46.06,24.32-46.06,56.33,0,37.08-.11,74.16,.11,111.24,.03,5.84,.79,11.91,2.53,17.46,5.98,19.14,19.97,29.88,39.52,35.22v7.98c0,25.46,0,50.92,0,76.39,0,11.51,3.04,16.57,10.05,16.85,7.31,.3,10.95-5.26,10.95-16.82,0-78.36,0-156.73,0-235.09,0-2.46,.12-4.99-.36-7.38-1.17-5.79-4.6-9.26-10.84-8.92-5.85,.32-8.89,3.8-9.54,9.43-.28,2.44-.25,4.93-.25,7.4-.01,39.55,0,79.11,0,118.66v8.85c-14.29-4.5-21.35-14.93-21.38-30.6-.08-38.56,.13-77.13-.11-115.69-.09-13.65,6-23.41,18.47-27.25,11.15-3.43,23.12-5.6,34.77-5.75,47.95-.62,95.91-.05,143.87-.46,8.71-.07,17.64-1.85,26.03-4.32,16.07-4.72,31.79-10.62,47.74-15.8,7.83-2.54,15.57,1.38,17.96,8.61,2.38,7.18-.99,14.32-8.39,17.52-2.94,1.27-5.99,2.27-9.01,3.34-28.47,10.14-56.23,21.03-87.91,19.65-27.12-1.18-46.77,21.43-47.36,48.7-.39,18.04,.14,36.09-.22,54.13-.14,7.31,2.49,11.83,8.9,15.44,24.51,13.82,48.7,28.21,73.2,42.06,4.43,2.51,6.21,5.13,6.11,10.3-.34,18.04-.16,36.09-.12,54.14,.02,8.71,3.64,13.35,10.29,13.44,6.75,.09,10.35-4.4,10.36-13.19,.04-21.01-.25-42.03,.15-63.03,.14-7.46-2.76-11.78-9.05-15.34-24.48-13.87-48.7-28.2-73.15-42.12-4.1-2.33-6.02-4.74-5.89-9.75,.39-14.82,.06-29.66,.16-44.49,.12-17.6,11.25-29.23,28.82-30.09,5.18-.26,10.42,.32,15.56-.15,10.25-.93,20.94-.76,30.59-3.8,44.88-14.13,89.41-29.37,134.2-43.82,11.19-3.61,20.66-9.13,28.14-18.17,2.05-2.48,4.37-4.73,7.73-8.33v11.03c0,75.89-.01,151.78,.02,227.68,0,7.82,4.1,12.77,10.28,12.77,6.17,0,10.34-4.98,10.34-12.76,.03-88.01,.1-176.01-.25-264.01-.02-3.85-3.08-9.01-6.31-11.19-4.52-3.06-9.28-.3-12.92,3.84-8.33,9.46-16.68,18.91-25.34,28.07-3.16,3.34-6.79,7.08-10.94,8.51-18.58,6.42-37.43,12.07-54.69,17.53-3.14-9.63-6.06-18.58-9.13-27.96,7.1-2.56,15.47-6.19,24.19-8.58,16.68-4.56,29.35-14.11,39.98-27.64,9.9-12.6,20.96-24.32,32.01-35.96,8.39-8.84,19.14-12.38,31.45-12.32,47.96,.2,95.92,.09,143.87,.08,15.89,0,23.17-7.19,23.23-22.87,.06-18.79-.32-37.59,.4-56.35,.19-4.85,2.58-11.24,6.18-13.87,3.57-2.6,10.33-2.72,15-1.43,6.3,1.74,8.19,7.85,8.18,14.32-.06,29.66-.01,59.33-.03,88.99,0,13.37-4.55,18.37-17.98,19.12-13.82,.78-27.65,1.17-41.48,1.74-27.89,1.15-48.66,22.38-48.85,50.22-.16,23.24,.27,46.48-.22,69.71-.17,8.11,3.02,12.66,9.76,16.46,24.72,13.95,49.14,28.43,73.87,42.37,4.88,2.75,6.97,5.61,6.84,11.46-.43,19.27-.18,38.56-.15,57.84,0,5.19-.09,10.39,.25,15.56,.36,5.46,3.81,8.58,9.03,9.14,5.3,.57,9.14-2.08,10.68-7.2,.76-2.53,.85-5.34,.86-8.03,.06-25.21-.16-50.43,.15-75.64,.1-7.84-2.66-12.82-9.56-16.7-25.16-14.17-50.02-28.87-75.13-43.13-4.11-2.34-5.96-4.75-5.88-9.75,.33-20.27,.08-40.54,.16-60.81,.07-17.93,12.17-30.26,29.94-30.85,14.08-.47,28.16-.97,42.23-1.63,22.07-1.05,36.13-15.74,36.16-37.72,.04-30.16-.17-60.32,.09-90.48,.13-15.71-6.55-26.89-20.23-34.3-1.66-.9-3.82-2.95-3.84-4.5-.27-17.99-.17-35.98-.17-54.9h8.7c22.99,0,45.98-.13,68.97,.09,6.07,.06,11.1-1.26,14.77-6.3v-8.9c-3.57-6.22-7.23-12.4-10.64-18.71-.56-1.04-.51-2.92,.06-3.99,3.4-6.35,7.03-12.57,10.58-18.83ZM215.69,429.38c-14.2-16.35-17.6-35.63-10.65-56.02,4.95-14.51,20.86-21.1,39.68-17.86,14.58,2.51,24.25,13.7,25.37,29.45,.16,2.21,.02,4.44,.02,6.66-.05,13.98-3.54,26.86-13.09,37.46-12.13,13.45-29.49,13.93-41.32,.31Zm393.07-120.8c-12.93-16.15-15.85-34.83-10.21-54.4,4.51-15.62,19.52-22.81,39.64-20.43,15.74,1.86,26.5,13.2,27.93,29.58,.24,2.69,.03,5.42,.03,8.13,.14,13.73-3.48,26.31-12.27,37.04-12.63,15.42-32.67,15.64-45.13,.08Zm162.6-152.3v-28.99h64.83c-7.82,9.81-8.32,19.12,.07,28.99h-64.9Z"/>
                                                    <path
                                                        d="M669.83,692.18c-7.85,0-11.39,3.29-11.78,11.1-.34,6.66-.11,13.34-.12,20.02q-.02,9.92-10.05,9.93c-53.39,0-106.77-.02-160.16,.02-11.48,0-14.35,2.99-14.37,14.51-.01,6.36,0,12.72,0,19.86-3.67,0-6.57,0-9.47,0-53.88,0-107.76-.02-161.64,.02-10.39,0-13.71,3.33-13.84,13.72-.1,8.08-.02,16.17-.02,25.02h-9.49c-53.88,0-107.76-.01-161.64,.01-10,0-13.23,3.26-13.26,13.26-.04,10.38,.33,20.78-.14,31.14-.28,6.16,1.32,11.03,6.03,14.9h8.9c4.64-4.24,6.37-9.37,5.96-15.72-.48-7.32-.11-14.69-.11-22.48h163.76c0,8.13,.19,15.96-.06,23.78-.19,6.16,1.6,11.09,6.98,14.42h7.42c5.37-3.4,6.82-8.45,6.77-14.54-.16-20.48-.06-40.97-.06-62.1h163.93v15.02c0,15.31,.25,30.63-.12,45.93-.15,6.31,1.08,11.57,6,15.69h8.9c4.98-4.1,6.05-9.41,6-15.7-.26-28.92-.11-57.85-.11-86.77v-8.6h163.93v9c0,29.17,.08,58.34-.06,87.51-.03,6.1,1.39,11.15,6.77,14.56h7.42c5.78-3.48,7.01-8.84,6.99-15.19-.13-42.73-.07-85.45-.07-128.18v-9.11h163.76c0,2.61,0,5.21,0,7.82,0,42.97,.11,85.95-.12,128.92-.03,6.32,1.26,11.52,5.97,15.74h14.83v-167.62c-3.97-1.97-7.93-5.63-11.91-5.65-60.55-.36-121.11-.27-181.66-.23Z"/>
                                                    <path
                                                        d="M712.27,573.51c-28.65-15.98-57.21-32.1-85.89-48.01-9.82-5.45-17.36-1.16-17.4,10.19-.19,48.42-.13,96.84-.02,145.26,.02,7.5,4.18,12.13,10.11,12.36,6.13,.23,10.44-4.68,10.85-12.44,.1-1.97,.03-3.95,.03-5.93,0-37.8,0-75.6,0-113.39v-9.43c2.2,.83,3.35,1.1,4.35,1.65,20.24,11.3,40.54,22.52,60.59,34.15,2.09,1.21,3.76,4.95,3.82,7.56,.36,15.31,.09,30.63,.22,45.95,.06,7.28,4.28,11.94,10.32,12,6.2,.06,10.26-4.4,10.3-11.83,.1-18.53-.11-37.06,.12-55.58,.07-5.96-2.42-9.73-7.41-12.51Z"/>
                                                    <path
                                                        d="M227.46,761.62c1.51,7.67,10.27,11.81,15.71,6.79,2.78-2.56,4.52-7.6,4.56-11.55,.36-32.11,.2-64.23,.2-96.35,0-3.6,0-7.21,0-11.14,1.48,.26,2.26,.21,2.83,.53,20.25,11.29,40.55,22.5,60.62,34.1,1.95,1.13,3.45,4.62,3.55,7.08,.4,9.87,.09,19.76,.2,29.64,.1,8.62,3.91,13.38,10.44,13.43,6.56,.05,10.46-4.68,10.55-13.29,.13-12.1-.19-24.22,.12-36.31,.2-7.51-2.62-12.36-9.33-16.03-26.82-14.7-53.41-29.81-80.11-44.73-12.62-7.05-19.6-2.83-19.61,11.85-.02,39.78,0,79.55,0,119.33,0,2.22-.18,4.5,.25,6.65Z"/>
                                                </svg>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Notification Content -->
                                    <div class="widget-content-left">
                                        <div class="widget-heading mb-1">
                                            @isset($notification->data['subject'])
                                                <span>{{ $notification->data['subject'] }}</span>
                                            @endisset
                                            @isset($notification->data['activity'])
                                                <span>{{ $notification->data['activity'] }}</span>
                                            @endisset
                                        </div>
                                        <div class="widget-subheading">
                                            <div>{{ $notification->data['message'] ?? '' }}</div>
                                            <div class="small">
                                                @isset ($notification->data['date'])
                                                    <em>{{ \Carbon\carbon::createFromDate($notification->data['date'])->diffForHumans() }}</em>
                                                @endisset
                                                @isset ($notification->data['from'])
                                                    <em>-- {{ $notification->data['from'] }}</em>
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Notification Action Default -->
                                    <div class="widget-content-right d-flex flex-column align-items-center">
                                        @if (! $notification->read_at)
                                            <button type="button"
                                                    class="btn mb-2 badge badge-dot badge-primary mark-as-read"
                                                    data-id="{{ $notification->id }}" data-toggle="tooltip"
                                                    data-placement="top"
                                            >{{ __('app.Make as read') }}</button>
                                        @endif
                                        <button type="button" class="p-0 btn dd-chart-btn remove-notification">
                                                        <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                                            <span class="icon-wrapper-bg bg-light"></span>
                                                            <i class="icon text-primary pe-7s-close"></i>
                                                        </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="p-2 text-center">{{ __('app.You haven\'t notifications') }}</li>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="px-3 py-2">
            <a href="javascript:void(0)"
               class="btn-block border-0 btn btn-light btn-sm">{{ __('app.Show all notifications') }}</a>
        </div>
    </div>
</div>
