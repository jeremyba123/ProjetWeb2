@props(['cle'])

@if (session($cle))
    <style>
        .notification {
            position: absolute;
            top: 6rem;
            right: 4rem;
            border-radius: 0.375rem;
            padding: 0.5rem;
            animation: fadeOut 7s ease-in-out forwards;
        }

        .success {
            background-color: #68D391;
            color: #ffffff;
        }

        .error {
            background-color: #FECACA;
            color: #E53E3E;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                display: none;
            }
        }
    </style>

    <div class="notification {{ $cle == 'succes' ? 'success' : 'error' }}">
        {{ session($cle) }}
    </div>

    <script>
        setTimeout(function() {
            document.querySelector('.notification').style.display = 'none';
        }, 4000);
    </script>
@endif
