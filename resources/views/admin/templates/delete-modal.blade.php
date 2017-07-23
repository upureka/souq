<script id="delete-modal-template" type="text/html" >
    <div class="modal-dialog" role="document">
        <div class = "modal-content" >
            <input type = "hidden" name = "_token" value="{{ csrf_token() }}" >
            <div class = "modal-header" >
                <button type = "button" class = "close" data - dismiss = "modal" > &times; </button>
                <h4 class = "modal-title bold" > مسح عنصر </h4>
            </div>
            <div class = "modal-body" >
                <p > هل تريد تأكيد عملية المسح ؟ </p>
            </div>
            <div class = "modal-footer" >
                <a
                href = "{url}"
                id = "delete" class = "btn btn-danger" >
                <li class = "fa fa-trash" > </li> مسح
            </a>

            <button type = "button" class = "btn btn-warning" data-dismiss = "modal" >
                <li class = "fa fa-times" > </li> الغاء</button >
            </div>
        </div>
    </div>
</script>
