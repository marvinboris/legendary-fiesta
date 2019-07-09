    <div class="fixed-top loading bg-white w-100 h-100 d-flex justify-content-center align-items-center flex-column" style="z-index: 20000; ">
        <div>
            <img src="{{ url('/') . '/images/LOGO AUTO ECOLE UNIVERSITE.png' }}" alt="Logo" class="logo" style="height: 50px;">
        </div>
        <div class="spinner-border text-primary position-absolute" role="status" style="width: 12rem; height: 12rem; z-index: -1; top: calc(50% - 6rem); left: calc(50% - 6rem);"></div>
    </div>
    <script>
        window.addEventListener('load', function () {
            $('.fixed-top.loading').fadeOut(2000);
            setTimeout(() => {
                $('.fixed-top.loading').remove();
            }, 2000);
        });
    </script>
    @yield('scripts')
</body>
</html>