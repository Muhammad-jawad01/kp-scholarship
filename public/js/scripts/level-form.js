$(() => {
    $("#participant-group").hide();
    $("#new-level-group").hide();
    $("#level").on("change", () => {
        let level = $("#level").val();
        if (level === '0') {
            $("#participant-group").show();
            $("#new-level-group").show();
        }
        else {

            $("#new-level-group").hide();
        }
        if (level === '-1') {
            $("#participant-group").hide();
        } else {
            $("#participant-group").show();
        }
    });
});