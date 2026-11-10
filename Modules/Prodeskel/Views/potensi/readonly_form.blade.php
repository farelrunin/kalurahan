@push('scripts')
    <script>
        $(document).ready(function() {
            $('form').find('button').remove()
            $('form').find('input').attr('disabled', true)
            $('form').find('select').attr('disabled', true)
            $('form').find('textarea').attr('disabled', true)
            $('form').find('.tipe').addClass('disabled').attr('disabled', true)
        });
    </script>
@endpush
