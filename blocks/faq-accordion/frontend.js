jQuery(document).ready(function($) {
    $('.faq-question').on('click', function() {
        var $answer = $(this).next('.faq-answer');
		$(this).toggleClass('active');
        $(this).closest('.faq-block').find('.faq-answer').not($answer).slideUp();
        $answer.slideToggle();
    });
});
