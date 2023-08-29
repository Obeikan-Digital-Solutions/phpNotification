<script>
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('mark.notification') }}", {
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id:id
            }
        });
    }
</script>
