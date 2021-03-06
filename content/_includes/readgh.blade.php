<style>
    .realContent p:first-of-type {
        display: none;
    }
</style>

<script>
    var file = '{{$repoName}}',
            baseURL = 'https://raw.githubusercontent.com/laravel-notification-channels/' + file + '/master/README.md';

    $.get(baseURL, function (data) {
        var md = window.markdownit();
        var result = md.render(data);

        $('.realContent').prepend(result);

        ['Contents', 'Changelog', 'Testing', 'Security', 'Contributing'].forEach(function (title) {
            $('.realContent').find("h2:contains(" + title + ")").next('ul').remove();
            $('.realContent').find("h2:contains(" + title + ")").remove();
        });

        $('.realContent').find("a:contains(All Contributors)").closest('li').remove();

        $('.realContent').find("h2:contains(Credits)").next('ul').append('<li>All Contributors</li>');

        Prism.highlightAll();
    });
</script>

<hr>

<a class="btn btn-default" href="https://github.com/laravel-notification-channels/{{$repoName}}/edit/master/README.md">Edit on GitHub</a>