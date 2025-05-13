$(document).ready(function () {
    // No need to hide signup initially as it's already hidden in CSS

    // When clicking sign up, hide login and show signup
    $("#sign-up").click(function () {
        $(".login").hide();
        $(".signup").css("display", "block"); // Force display block to override CSS
    });

    // When clicking login, hide signup and show login
    $("#login").click(function () {
        $(".signup").css("display", "none"); // Force display none
        $(".login").show();
    });

    $("#start_date, #end_date").datetimepicker({
        format: "d/m/Y",
        timepicker: false,
    });
    //user login

    $("#userDropdown").click(function (e) {
        e.stopPropagation(); // Prevent document click from immediately closing
        $("#dropdownMenu").toggleClass("show");
    });

    // Close dropdown when clicking outside
    $(document).click(function () {
        $("#dropdownMenu").removeClass("show");
    });

    // Prevent dropdown from closing when clicking inside
    $("#dropdownMenu").click(function (e) {
        e.stopPropagation();
    });
});
