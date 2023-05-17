<form class="deletes-form" action="{{$action ?? ''}}" method="post">
    <input type="hidden" name="ids" />
    <button type="submit" class="btn btn-danger disabled">Xóa (<span>0</span>)</button>
</form>