
@push('script')
<script>
    $(document).ready(function () {

        // Show modal
        $('.openModal').on('click', function() {
            var modalId = $(this).attr("data-modal");

            $(`#${modalId}`).show();
        })

        // Hide modal
        $('.closeModal').on('click', function() {

           var modalId = $(this).parent().parent().attr("id");

           $(`#${modalId}`).hide();
        })

        // Hide modal on overlay click
        $('.modal').on('click', function(e) {
            if (e.target === this) {
                $(this).hide();
            }
        })
    })
    </script>
@endpush




