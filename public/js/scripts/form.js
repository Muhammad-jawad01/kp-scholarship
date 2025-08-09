$(() => {
    $("#event_type").on("change", () => {
        let eventType = $("#event_type").val();
        if(eventType == "Divisional Wise")
        {
            $("#competition-category").hide();
        }
        else
        {
            $("#competition-category").show();
        }
    });
});