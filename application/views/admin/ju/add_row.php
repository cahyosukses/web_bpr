<?php get_header('admin'); ?>
<form id="myForm" name="myForm" method="post">
    <input id="addButton" name="addButton" type="button" value="Add an input" />
</form>
<script>

    var options = {
        source: [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ],
        minLength: 2
    };

    $("input.searchInput").live("keydown.autocomplete", function() {
        $(this).autocomplete(options);       
    });

    var addInput = function() {
        var inputHTML = " <input name='search' value='' class='searchInput' maxlength='20' />";
        $(inputHTML).appendTo("form#myForm");
        $("input.searchInput:last").focus();
    };

    if (!$("form#myForm").find("input.searchInput").length) {
        addInput();
    }

    $("input#addButton").click(addInput);

</script>
<?php get_footer('admin'); ?>