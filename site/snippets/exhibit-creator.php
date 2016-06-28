<div id="editor" class="container">
    <h1 id="exhibit-title" class="editable">Medium Editor</h1>
    <div id="exhibit-content" class="editable">
        <p>My father’s family name being <a href="https://en.wikipedia.org/wiki/Pip_(Great_Expectations)">Pirrip</a>.
    </div>
</div>
<script>
    var thumbnail = 
        "<div class='col-lg-4 col-md-6 col-sm-6 col-xs-12'>" +
            "<div class='thumbnail' id=''>" +
                "<a id='' href='thumbrock'>" +
                    "<img id='' src='http://localhost/interaction-museum/content/2-all-techniques/20160627-thumbrock/drag-and-drop.gif' alt=''>" +
                    "<p id='' class='caption'>ThumbRock</p>" +
                "</a>" +
            "</div>" +
        "</div>";
    
    var editor = new MediumEditor(".container", {
        buttons: ["bold","italic","underline","anchor","h2","h3","quote","technique"],
        extensions: {
            "technique": new CustomHtml({
                buttonText: "IT",
                htmlToInsert: thumbnail
            })
        }
    });
</script>