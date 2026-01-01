@if (!request()->routeIs('sales.index'))
    <div id="newsletter-float" class="fixed z-50 hidden bottom-5 right-5 animate-fade-in">
        {{-- Main Button --}}
        <a data-formkit-toggle="2a19408fe7" data-umami-event="clicked_stay_updated"
            class="hover:cursor-pointer flex items-center gap-2 px-4 py-3 text-sm font-medium text-white transition-all duration-300 rounded-full shadow-lg bg-orange-500 hover:bg-orange-500/90 hover:shadow-xl group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 animate-wiggle" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <span>Stay Updated</span>
        </a>

        <button id="newsletter-float-dismiss" type="button"
            class="absolute flex items-center justify-center w-5 h-5 text-xs text-white transition-opacity rounded-full opacity-0 -top-1 -right-1 bg-stone-700 hover:bg-stone-600 group-hover:opacity-100"
            title="Don't show again">
            ×
        </button>
    </div>

    <script async data-uid="2a19408fe7" src="https://zenso.kit.com/2a19408fe7/index.js"></script>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes wiggle {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(8deg);
            }

            75% {
                transform: rotate(-8deg);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.4s ease-out forwards;
        }

        .animate-wiggle {
            animation: wiggle 0.5s ease-in-out 3s 3;
        }

        #newsletter-float:hover #newsletter-float-dismiss {
            opacity: 1;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const floatEl = document.getElementById('newsletter-float');
            const dismissBtn = document.getElementById('newsletter-float-dismiss');

            if (localStorage.getItem('hideNewsletterFloat') === 'true') {
                return;
            }

            setTimeout(function () {
                floatEl.classList.remove('hidden');
            }, 2000);

            dismissBtn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                localStorage.setItem('hideNewsletterFloat', 'true');
                floatEl.style.opacity = '0';
                floatEl.style.transform = 'translateY(10px)';
                setTimeout(function () {
                    floatEl.remove();
                }, 300);
            });
        });
    </script>
@endif