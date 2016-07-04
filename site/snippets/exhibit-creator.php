<div class="text-center" id="editor" class="container">
    <input type="text" class="exhibit-title col-md-8 col-md-offset-2" placeholder="Title">
    <div id="exhibit-content" class="editable">
        <p>My father’s family name being <a href="https://en.wikipedia.org/wiki/Pip_(Great_Expectations)">Pirrip</a>.
    </div>
</div>

<script>
    var editor = new MediumEditor('.editable');

    $(function () {
        $('.editable').mediumInsert({
            editor: editor
        });
    });
</script>