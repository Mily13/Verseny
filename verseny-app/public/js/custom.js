$(document).ready(function() {
    $('#competition-form').on('submit', function(e) {
        e.preventDefault();
        const addCompetitionRoute = $(this).find('#submit-button').data('add-competition-route');
        $.ajax({
            type: 'POST',
            url: addCompetitionRoute,
            data: $(this).serialize(),
            success: function(data) {
                $('#competition-table tbody').append(data);
                jQuery('#competition-form')[0].reset();
            }
        });
    });
});


$(document).ready(function() {
    $('#round-form').on('submit', function(e) {
        e.preventDefault();
        const addRoundRoute = $(this).find('#submit-button').data('add-round-route');
        $.ajax({
            type: 'POST',
            url: addRoundRoute,
            data: $(this).serialize(),
            success: function(data) {
                $('#round-table tbody').append(data);
                jQuery('#round-form')[0].reset();
            }
        });
    });
});


$(document).ready(function() {
    $('#competitor-form').on('submit', function(e) {
        e.preventDefault();
        const addCompetitorRoute = $(this).find('#submit-button').data('add-competitor-route');
        $.ajax({
            type: 'POST',
            url: addCompetitorRoute,
            data: $(this).serialize(),
            success: function(data) {
                $('#competitor-table tbody').append(data);
                jQuery('#competitor-form')[0].reset();
            }
        });
    });
});


$(document).ready(function() {
    $('.delete-competitor').click(function() {
        let user_id = $(this).data('f-id');
        let round_id = $(this).data('fordulo-id');
        let deleteCompetitorRoute = $(this).data('delete-competitor-route');

        $.ajax({
            type: 'POST',
            url: deleteCompetitorRoute,
            data: { user_id: user_id, round_id: round_id },
            success: function(result) {
                $("#"+result['tr']).slideUp("fast")
            },

        });
    });
});






