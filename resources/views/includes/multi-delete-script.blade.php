<script>
    window.addEventListener('load', function () {
        const checkboxes = document.querySelectorAll('.checkbox');

        document.querySelector('#select-all').addEventListener('click', function () {
            for (const checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        });
    });
</script>