$(document).ready(function () {
    $("#philosopher_work_input").hide();
    $("input[name='want']").click(function () {
        displayPhilosopherWorkInput();
    });
});

function displayPhilosopherWorkInput() {
    if ($("input[name='want']:checked").val() == 'yes') {
        $('#philosopher_work_input').fadeIn('slow');
    } else {
        $('#philosopher_work_input').fadeOut('slow');
    }
}