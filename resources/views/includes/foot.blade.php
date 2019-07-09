    <div class="fixed-top loading bg-white w-100 h-100 d-flex justify-content-center align-items-center flex-column">
        <div>
            <img src="{{ url('/') . '/images/LOGO AUTO ECOLE UNIVERSITE.png' }}" alt="Logo" class="logo">
        </div>
        <div class="spinner-border text-primary position-absolute" role="status"></div>
    </div>
    <script>
        window.onload = function() {
            $('.fixed-top').fadeOut(2000);
            setTimeout(() => {
                $('.fixed-top').remove();
            }, 2000);
        }
    </script>
    @yield('scripts')
</body>
</html>