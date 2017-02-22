$(document).ready(function() {
    $(".throwmeaway").click(function() {
        var url = "submitquiz.php?id="+$(this).data("id");
        window.document.location = url;
      });
});
