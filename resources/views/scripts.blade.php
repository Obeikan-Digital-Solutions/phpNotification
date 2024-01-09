<script>
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('mark.notification') }}", {
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id
            }
        });
    }
    $(function() {
        // Make Read Notification
        $('.mark-as-read').click(function (e) {
            e.preventDefault();
            let request = sendMarkRequest($(this).data('id'));
            let countUnread = $('.count-notifications').text();
            request.done(() => {
                countUnread--;
                $(this).removeClass('badge-primary').addClass('badge-dark').fadeOut(300, function () {
                    $(this).remove();
                });
                $('.count-notifications').text(countUnread);
                if (countUnread <= 0) {
                    $('.count-notifications').remove();
                }
            });
        });
        $('#mark-all').click(function () {
            let request = sendMarkRequest();
            request.done(() => {
                $(this).prop("disabled", true).parent().find(".icon").removeClass("pe-7s-mail-open").addClass("pe-7s-mail");
                $(".tooltip").remove();
                $(".mark-as-read").remove();
                $('.count-notifications').text("0").remove();
            })
        });

        // Remove Notification
        $(".remove-notification").click(function (e) {
            e.preventDefault();
            $(this).parentsUntil(".list-group-item").parent().fadeOut(300, function () {
                $(this).remove();
            });
        })
    });
</script>
