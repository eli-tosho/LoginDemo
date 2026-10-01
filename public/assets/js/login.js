$(function () {
    function show(user) {
        $("#login").prop("hidden", !!user);
        $("#home").prop("hidden", !user);
        $("#name").text(user ? user.name : "");
    }

    $("#form").on("submit", function (e) {
        e.preventDefault();
        $.post("/api/login", $(this).serialize())
            .done((res) => { $("#error").prop("hidden", true); show(res.user); })
            .fail((xhr) => $("#error").text(xhr.responseJSON?.error ?? "Login failed").prop("hidden", false));
    });

    $("#logout").on("click", () => $.post("/api/logout").done(() => show(null)));

    $.getJSON("/api/session", (res) => show(res.user));
});
