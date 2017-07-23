<div class="modal fade " id="mainCategory" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">اختر القسم الرئيسي</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" id="trans-form" action="{{route('admin.category.main')}}" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    {!! csrf_field() !!}
                    <input type="hidden" id="productID" name="id" value=""/>
                    <div class="form-group">
                        <label class="col-md-3 control-label">اختيار القسم الرئيسي</label>
                        <div class="col-md-9 col-sm-6">
                            <select class="form-control" name="parent_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->translated()->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                        <button type="button" class="btn btn-primary transBTN">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>