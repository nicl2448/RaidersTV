var date1 = new Date()
var date2 = new Date($('.cp-masthead__countdown-wrapper').text())
var timeDiff = (date2.getTime() - date1.getTime())
if (timeDiff < 0) {
    console.log('Countdown expired. Hiding countdown...')
    $('.cp-masthead__countdown').hide();
    $('body').removeClass('countdown')
} else {
    $('.cp-masthead__countdown-wrapper').countDown({
        css_class: 'timer-inner',
        separator_days: ':'
    });
}

$('.cp-masthead__countdown-wrapper').on('time.elapsed', function () {
    $('.cp-masthead__countdown').hide();
    $('body').removeClass('countdown')
});