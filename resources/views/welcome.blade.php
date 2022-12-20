<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>In A Sell</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @livewireStyles
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased text-slate-600">
      <section class="flex flex-col px-8 md:px-16 max-w-screen-2xl min-h-screen">
        <header class="py-8">
          <x-jet-application-mark class="h-9 w-auto" />
        </header>
        <section class="flex max-lg:flex-col lg:items-center py-12 md:py-24 gap-20">
          <section class="flex-1 col-span-2 align-middle">
            <div>
              <h1 class="text-3xl xl:text-4xl font-black md:leading-none xl:leading-tight">
                Online Shop Management System
              </h1>
              <p class="font-mono mt-4 xl:mt-2">
                Help you to manage your online shop. 
              </p>              
            </div>
            <div>
              <div class="flex flex-col">
                  @if (Route::has('login'))
                      <div class="py-4">
                          @auth
                              <a href="{{ route('dashboard.shop.index') }}" class="transition-all duration-100 ease-in-out pb-1 border-b-2 text-indigo-500 border-transparent hover:border-indigo-300 hover:text-indigo-600 md:mr-8 text-lg md:text-sm font-bold tracking-wide my-4 md:my-0">Dashboard</a>
                          @else
                              <a href="{{ route('login') }}" class="transition-all duration-100 ease-in-out pb-1 border-b-2 text-indigo-500 border-transparent hover:border-indigo-300 hover:text-indigo-600 md:mr-8 text-lg md:text-sm font-bold tracking-wide my-4 md:my-0">Log in</a>

                              @if (Route::has('register'))
                                  <a href="{{ route('register') }}" class="border border-transparent rounded font-semibold tracking-wide text-lg md:text-sm px-5 py-3 md:py-2 focus:outline-none focus:shadow-outline bg-indigo-600 text-gray-100 hover:bg-indigo-800 hover:text-gray-200 transition-all duration-300 ease-in-out my-4 md:my-0 w-full md:w-auto">Register</a>
                              @endif
                          @endauth
                      </div>
                  @endif
              </div>
            </div>
          </section>
          <!-- Illustration -->
          <section class="flex-1">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="240px"
              viewBox="0 0 688 647.1" style="enable-background:new 0 0 688 647.1;" xml:space="preserve">
              <style type="text/css">
                .st0{fill:none;stroke:#B9C6E4;stroke-miterlimit:10;}
                .st1{fill:#FFFFFF;stroke:#B9C6E4;stroke-miterlimit:10;}
                .st2{fill:#B9C6E4;}
                .st3{opacity:0.46;}
                .st4{fill:#EF749B;}
                .st5{fill:#F7C689;}
                .st6{fill:none;stroke:#F27932;stroke-width:2;stroke-miterlimit:10;}
                .st7{fill:#4B4065;}
                .st8{fill:#C2D9F0;}
                .st9{fill:#F7C689;stroke:#F27932;stroke-miterlimit:10;}
                .st10{fill:#FFFFFF;}
                .st11{fill:#ED4F2E;}
                .st12{clip-path:url(#SVGID_2_);}
                .st13{fill:none;stroke:#F27932;stroke-miterlimit:10;}
                .st14{opacity:0.21;fill:#EF749B;enable-background:new    ;}
                .st15{fill:#495894;}
                .st16{fill:none;stroke:#495894;stroke-miterlimit:10;}
                .st17{fill:none;stroke:#495894;stroke-width:0.75;stroke-miterlimit:10;}
                .st18{fill:#F27932;}
                .st19{clip-path:url(#SVGID_4_);}
                .st20{fill:none;stroke:#FFFFFF;stroke-miterlimit:10;}
                .st21{fill:none;stroke:#ED4F2E;stroke-miterlimit:10;}
              </style>
              <path class="st0" d="M590.9,507.8H152.7c-6.5,0-11.8-5.3-11.8-11.8V128.5c0-6.5,5.3-11.9,11.8-11.9h350.1"/>
              <circle class="st0" cx="177.8" cy="147.1" r="4.6"/>
              <circle class="st0" cx="206.2" cy="147.1" r="4.6"/>
              <circle class="st0" cx="234.6" cy="147.1" r="4.6"/>
              <path class="st1" d="M212.7,190.3h65.2c13.8,0,25.1,11.2,25.1,25.1v57.1c0,13.8-11.2,25.1-25.1,25.1h-65.2
                c-13.8,0-25.1-11.2-25.1-25.1v-57.1C187.6,201.6,198.8,190.3,212.7,190.3z"/>
              <ellipse transform="matrix(0.3162 -0.9487 0.9487 0.3162 -55.0594 390.41)" class="st2" cx="243.3" cy="233.4" rx="24.1" ry="24.1"/>
              <line class="st0" x1="204.4" y1="281.2" x2="238.9" y2="281.2"/>
              <line class="st0" x1="204.4" y1="269.4" x2="264.4" y2="269.4"/>
              <line class="st0" x1="270.3" y1="203.6" x2="288.3" y2="203.6"/>
              <path class="st1" d="M369.7,190.3h65.2c13.8,0,25,11.2,25,25.1v57.1c0,13.8-11.2,25.1-25,25.1h-65.2c-13.8,0-25-11.2-25-25.1v-57.1
                C344.6,201.6,355.9,190.3,369.7,190.3z"/>
              <circle class="st2" cx="400.4" cy="233.4" r="24"/>
              <line class="st0" x1="361.4" y1="281.2" x2="396" y2="281.2"/>
              <line class="st0" x1="361.4" y1="269.4" x2="421.4" y2="269.4"/>
              <line class="st0" x1="427.4" y1="203.6" x2="445.4" y2="203.6"/>
              <path class="st1" d="M525.2,190.3h65.2c13.8,0,25,11.2,25,25.1v57.1c0,13.8-11.2,25.1-25,25.1h-65.2c-13.8,0-25-11.2-25-25.1v-57.1
                C500.2,201.6,511.4,190.3,525.2,190.3z"/>
              <ellipse class="st2" cx="555.9" cy="233.4" rx="24" ry="24"/>
              <line class="st0" x1="517" y1="281.2" x2="551.5" y2="281.2"/>
              <line class="st0" x1="517" y1="269.4" x2="577" y2="269.4"/>
              <g class="st3">
                <path class="st4" d="M82.8,234.8l0.9-19l-16,10.2l-4.7-8.1l16.8-8.6L63,200.6l4.7-8.1l15.9,10.3l-0.9-19H92l-0.9,19l15.9-10.3
                  l4.7,8.1L95,209.3l16.9,8.6l-4.8,8.1l-15.9-10.1l0.9,19L82.8,234.8z"/>
              </g>
              <g>
                <path class="st5" d="M566.8,430l0.9-19l-16,10.2L547,413l16.8-8.6l-16.8-8.7l4.7-8.1l15.9,10.3l-0.9-19h9.3l-0.9,19l15.9-10.3
                  l4.7,8.1l-16.7,8.7l16.9,8.6l-4.8,8.1L575.2,411l0.9,19L566.8,430z"/>
              </g>
              <polyline class="st6" points="374.5,384.6 387.2,396.8 408.2,362.3 411.8,393.1 428.2,376.2 430,399 454.4,394.8 "/>
              <path class="st7" d="M186.5,281.3c6.2,3.3,11.8,7.4,16.8,12.4c2.5,2.5,5,5.7,4.6,9.2s-3.6,6-7.2,5.6c-1.2-0.1-2.4-0.7-3.3-1.4"/>
              <path class="st8" d="M166.9,306.1c1.6-2.4,1.9-5.3,1-8c-0.5-1.7-1.7-3.2-3.3-4c-1.9-0.8-4-0.7-5.8,0.2c-4.8,2.2-6.9,7.9-4.7,12.7
                c2.2,4.8,7.9,6.9,12.7,4.7l0,0"/>
              <path class="st6" d="M246.7,417.5c0-14.4,11.7-26,26-26c14.4,0,26,11.7,26,26"/>
              <rect x="240.5" y="418.1" class="st9" width="131.2" height="116.7"/>
              <rect x="265.1" y="427.7" class="st10" width="29.3" height="25"/>
              <path class="st8" d="M200.9,297.5v14.7l2.7,2.5c0.4,0.3,0.4,0.9,0.1,1.3c-0.1,0.1-0.2,0.2-0.3,0.2l-4.8,2.1c0,0-2.3,15.8-8.1,15.2
                c-3.5-0.4-6.8-2-9.3-4.5l-6.9,20.6l5.9,5.2c2.1,1.8,3.6,4.1,4.4,6.7l2,6.4l-12.8,7.4l-32.1-12.2l-8-14.2l15.7-18.3l13.4-20.6l7.6-22
                l24.4,1.7L200.9,297.5z"/>
              <path class="st7" d="M200.8,517c0,0,39,7.2,42,14.1c3,6.9,1.3,14.8-21,20s-48.2-3.6-55.4-6.6C166.4,544.6,181.8,515,200.8,517z"/>
              <path class="st7" d="M153.9,321c2.2,0,3.3-1.8,4.6-3.8l4.3-7.2c0,0-8.1-1-7.5-6s6.8-10.5,10.2-5.7c1.4,2,0.7,8.5,2.9,7.3
                s1.9-4,4.7-4.1s7.2,5,10.9,3.4s9.9-10.4,14.5-9.3c2.4,0.6,2.5,4.5,2.5,4.5s2.6-2.5-0.5-6.7s-12.9-18.5-33.8-14.8
                c-4.3,0.8-7.8,3.6-10.6,6.8c-1.6,2-2.8,4.3-3.3,6.8c-0.7,3.1-2.2,6-4.5,8.2c-2.5,2.7-5.4,5.6-5.4,9.3c0,3.4,2.6,6.3,5.3,8.5
                c1.2,1.2,2.7,2,4.3,2.5C152.9,321,153.4,321,153.9,321z"/>
              <path class="st8" d="M240.5,375.2c0,0,19.5-21.7,30.5,4.9c0.8,2,1.8,9,2.5,14.6c0.5,3.2,1.2,6.3,2,9.4c0,2.8-5.2,1.9-7.3-5.7
                c-0.9-2.8-1.9-5.6-3.1-8.3l-19.4,23.5"/>
              <path class="st11" d="M100.2,441.9c0,0-36.7,48.7-13.2,84.7s76,26.5,110.1,5.5s55.5-47,58-64.6s-21.9-36.5-88,11.5l-15.4-33.5"/>
              <path class="st5" d="M186.5,368l3.9,56l53.9-52.8l1.8,49.8L191,461.2c-18.6,14.1-27-18.6-27-18.6s-3.4,9.1-7.9,8.7
                c-16-0.2-53.2,1.4-59.8-17c-1.4-4-1.5-8.2-1.2-12.4c0.2-4.1,0.8-8.1,1.7-12.1c3.2-14.1,36.2-62.4,37.6-61.8
                C135.8,348.8,186.5,368,186.5,368z"/>
              <rect x="324.9" y="418.1" class="st9" width="46.9" height="116.7"/>
              <g>
                <g>
                  <g>
                    <g>
                      <defs>
                        <rect id="SVGID_1_" x="324.9" y="418.1" width="46.9" height="116.7"/>
                      </defs>
                      <clipPath id="SVGID_2_">
                        <use xlink:href="#SVGID_1_"  style="overflow:visible;"/>
                      </clipPath>
                      <g class="st12">
                        <line class="st13" x1="244.5" y1="498.6" x2="365.2" y2="377.9"/>
                        <line class="st13" x1="248.9" y1="503.1" x2="369.7" y2="382.3"/>
                        <line class="st13" x1="253.4" y1="507.5" x2="374.1" y2="386.7"/>
                        <line class="st13" x1="257.8" y1="511.9" x2="378.5" y2="391.2"/>
                        <line class="st13" x1="262.2" y1="516.3" x2="382.9" y2="395.6"/>
                        <line class="st13" x1="266.6" y1="520.7" x2="387.3" y2="400"/>
                        <line class="st13" x1="271" y1="525.1" x2="391.8" y2="404.4"/>
                        <line class="st13" x1="275.4" y1="529.6" x2="396.2" y2="408.8"/>
                        <line class="st13" x1="279.9" y1="534" x2="400.6" y2="413.3"/>
                        <line class="st13" x1="284.3" y1="538.4" x2="405" y2="417.7"/>
                        <line class="st13" x1="288.7" y1="542.8" x2="409.4" y2="422.1"/>
                        <line class="st13" x1="293.1" y1="547.3" x2="413.9" y2="426.5"/>
                        <line class="st13" x1="297.6" y1="551.7" x2="418.3" y2="431"/>
                        <line class="st13" x1="302" y1="556.1" x2="422.7" y2="435.4"/>
                        <line class="st13" x1="306.4" y1="560.5" x2="427.1" y2="439.8"/>
                        <line class="st13" x1="310.8" y1="564.9" x2="431.5" y2="444.2"/>
                        <line class="st13" x1="315.2" y1="569.4" x2="436" y2="448.6"/>
                        <line class="st13" x1="319.7" y1="573.8" x2="440.4" y2="453"/>
                        <line class="st13" x1="324.1" y1="578.2" x2="444.8" y2="457.5"/>
                        <line class="st13" x1="328.5" y1="582.6" x2="449.2" y2="461.9"/>
                        <line class="st13" x1="332.9" y1="587" x2="453.6" y2="466.3"/>
                        <line class="st13" x1="337.3" y1="591.5" x2="458.1" y2="470.7"/>
                      </g>
                    </g>
                  </g>
                </g>
              </g>
              <path class="st10" d="M185.1,306.1c3-2.2,7.3-1.5,9.4,1.5c0.8,1.1,1.2,2.4,1.3,3.7c-2.1,0.9-4.4,2.4-6.9,1.1
                C186.4,311.3,184.9,308.8,185.1,306.1z"/>
              <path class="st7" d="M195.8,311c-0.4-3.9-3.8-6.8-7.7-6.4c-1.3,0.1-2.5,0.6-3.6,1.4c-0.2,0.2,0,0.6,0.3,0.4c2.9-2.2,7.1-1.6,9.3,1.3
                c0.7,1,1.2,2.1,1.3,3.3C195.3,311.3,195.9,311.3,195.8,311z"/>
              <path class="st7" d="M193.3,306.5c-1.8,0-5.8,2.6-6.2,4.8c0.5,0.5,1.1,0.9,1.8,1.2c2.2,0.8,3.7,1.1,6.9-1.1
                C195.5,309.5,194.7,307.8,193.3,306.5z"/>
              <path class="st7" d="M188.9,319.6c2.3,1.9,5.3,2.9,8.3,2.7c0.3,0,0.3-0.5,0-0.5c-1.4,0.1-2.9-0.1-4.2-0.6c-1.4-0.4-2.7-1.1-3.8-2
                C189,319,188.6,319.4,188.9,319.6L188.9,319.6z"/>
              <path class="st7" d="M185.4,301.1c3.2-2.7,7.1-2.6,9.9,0.2c0.2,0.1,0.2,0.4,0,0.6c-0.1,0.1-0.2,0.1-0.3,0.1
                C191.6,301.7,188.9,301.2,185.4,301.1z"/>
              <circle class="st14" cx="179.2" cy="314.2" r="5.5"/>
              <path class="st15" d="M181.3,329.5l-9.8-9.2c2.1,6,4.1,13.3,6.2,19.4"/>
              <line class="st16" x1="259.4" y1="397" x2="267.8" y2="386.2"/>
              <line class="st17" x1="160.5" y1="300.5" x2="163.4" y2="305.8"/>
              <polygon class="st18" points="406.7,461.9 359.8,461.9 324.9,418.1 371.8,418.1 "/>
              <rect x="372.7" y="450.4" class="st9" width="131.2" height="116.7"/>
              <rect x="397.3" y="460" class="st10" width="29.3" height="25"/>
              <rect x="457.1" y="450.4" class="st9" width="46.9" height="116.7"/>
              <g>
                <g>
                  <g>
                    <g>
                      <defs>
                        <rect id="SVGID_3_" x="457.1" y="450.4" width="46.9" height="116.7"/>
                      </defs>
                      <clipPath id="SVGID_4_">
                        <use xlink:href="#SVGID_3_"  style="overflow:visible;"/>
                      </clipPath>
                      <g class="st19">
                        <line class="st13" x1="376.7" y1="530.9" x2="497.4" y2="410.2"/>
                        <line class="st13" x1="381.1" y1="535.4" x2="501.9" y2="414.6"/>
                        <line class="st13" x1="385.5" y1="539.8" x2="506.3" y2="419"/>
                        <line class="st13" x1="390" y1="544.2" x2="510.7" y2="423.5"/>
                        <line class="st13" x1="394.4" y1="548.6" x2="515.1" y2="427.9"/>
                        <line class="st13" x1="398.8" y1="553" x2="519.5" y2="432.3"/>
                        <line class="st13" x1="403.2" y1="557.5" x2="523.9" y2="436.7"/>
                        <line class="st13" x1="407.6" y1="561.9" x2="528.4" y2="441.1"/>
                        <line class="st13" x1="412" y1="566.3" x2="532.8" y2="445.5"/>
                        <line class="st13" x1="416.5" y1="570.7" x2="537.2" y2="450"/>
                        <line class="st13" x1="420.9" y1="575.1" x2="541.6" y2="454.4"/>
                        <line class="st13" x1="425.3" y1="579.6" x2="546.1" y2="458.8"/>
                        <line class="st13" x1="429.7" y1="584" x2="550.5" y2="463.2"/>
                        <line class="st13" x1="434.2" y1="588.4" x2="554.9" y2="467.7"/>
                        <line class="st13" x1="438.6" y1="592.8" x2="559.3" y2="472.1"/>
                        <line class="st13" x1="443" y1="597.2" x2="563.7" y2="476.5"/>
                        <line class="st13" x1="447.4" y1="601.7" x2="568.1" y2="480.9"/>
                        <line class="st13" x1="451.8" y1="606.1" x2="572.6" y2="485.3"/>
                        <line class="st13" x1="456.3" y1="610.5" x2="577" y2="489.8"/>
                        <line class="st13" x1="460.7" y1="614.9" x2="581.4" y2="494.2"/>
                        <line class="st13" x1="465.1" y1="619.3" x2="585.8" y2="498.6"/>
                        <line class="st13" x1="469.5" y1="623.8" x2="590.2" y2="503"/>
                      </g>
                    </g>
                  </g>
                </g>
              </g>
              <path class="st7" d="M107.4,264.3c-5.5,8.8-5.1,20.1,0.9,28.6c13.7,18.6,47.2,8.5,46.9-15.2C154.9,253.6,120.2,244.4,107.4,264.3z"
                />
              <path class="st8" d="M271.7,386.6c5.3,6.9,7.8,9,10,9.5c1.2,0.1,2.4-0.3,3.3-1.1l-6.2-7.9l-10.3-13.2"/>
              <polyline class="st16" points="268.6,373.9 273.5,396.8 275.1,403.3 "/>
              <path class="st17" d="M173.8,349.4c0,0-6.6-3.6-12.6-2.1"/>
              <line class="st20" x1="167.3" y1="478.8" x2="135.3" y2="502"/>
              <line class="st21" x1="164" y1="442.6" x2="155.2" y2="385"/>
            </svg>
          </section>
        </section>
        <footer class="py-8 mt-auto">
          <p class="font-bold text-gray-500">&copy; 2022 In a Sell</p>
        </footer>
      </section>
    </body>

    <!-- <body class="antialiased min-h-screen">
        <header class="px-5 sm:px-10 md:px-10 md:py-5 lg:px-20 flex items-center justify-between">
            <div>
                <x-jet-application-mark class="block h-9 w-auto" />
            </div>                
            <div class="flex flex-col items-center justify-center md:block">
                @if (Route::has('login'))
                    <div class="hidden fixed right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ route('dashboard.shop.index') }}" class="transition-all duration-100 ease-in-out pb-1 border-b-2 text-indigo-500 border-transparent hover:border-indigo-300 hover:text-indigo-600 md:mr-8 text-lg md:text-sm font-bold tracking-wide my-4 md:my-0">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="transition-all duration-100 ease-in-out pb-1 border-b-2 text-indigo-500 border-transparent hover:border-indigo-300 hover:text-indigo-600 md:mr-8 text-lg md:text-sm font-bold tracking-wide my-4 md:my-0">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="border border-transparent rounded font-semibold tracking-wide text-lg md:text-sm px-5 py-3 md:py-2 focus:outline-none focus:shadow-outline bg-indigo-600 text-gray-100 hover:bg-indigo-800 hover:text-gray-200 transition-all duration-300 ease-in-out my-4 md:my-0 w-full md:w-auto">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </header>

        <main>
        <div id="hero" class="flex align-middle">
          <div class="px-5">
            <h1 class="text-3xl xl:text-4xl font-black md:leading-none xl:leading-tight">
              Online Shop Management System
            </h1>
            <p class="font-mono mt-4 xl:mt-2">
              Help you to manage your online shop. 
            </p>
          </div>

          <div></div>
        </div>
      </main>

      <footer class="p-3 text-center">
        <p class="font-bold text-gray-500">&copy; 2022 In a Sell</p>
      </footer>
    </body> -->
</html>
