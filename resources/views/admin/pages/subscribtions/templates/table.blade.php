<div class="table-responsive">
    <table id="example" class="table table-bordered table-striped table-responsive text-center">
        <thead>
            <tr >
                <th id="ID" style="width: 50px;">
                    <input id="chk-all" type="checkbox">
                </th>
                <th>البريد الالكتروني</th>
                <th>التاريخ</th>
            </tr>
        </thead>
        <tbody>
        @foreach($subscribtions as $subscribtion)
            <tr class="{{ $subscribtion->seen ? 'success':'warning'}}">
                <td class="ID">
                    <input name="ids[]" class="chk-box" value="{{ $subscribtion->id}}" type="checkbox">
                </td>
                <td>{{ $subscribtion->email }}</td>
                <td>{{ $subscribtion->created_at->diffForHumans() }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>