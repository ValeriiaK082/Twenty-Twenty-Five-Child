jQuery(document).ready(function($){

    function loadOtherBooks() {
        // Optional: show a loading spinner
        $('#other-books').html('<div class="col-12 text-center my-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');

        $.ajax({
            url: book_ajax_obj.ajax_url,
            type: 'POST',
            data: {
                action: 'load_other_books',
                current_book: book_ajax_obj.current_book
            },
            success: function(response) {
                $('#other-books').html(response.data);
            },
            error: function() {
                $('#other-books').html('<p class="text-danger">Failed to load other books.</p>');
            }
        });
    }

    if ($('#other-books').length) {
        loadOtherBooks();
    }
});
