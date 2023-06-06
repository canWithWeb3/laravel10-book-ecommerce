// delete modal
$(function() {
    $(".delete-btn").on("click", function(){
        const url = $(this).data("url")
        $("#deleteModalForm").attr("action", url)
        $("#deleteModal").modal("show")
    })
});
