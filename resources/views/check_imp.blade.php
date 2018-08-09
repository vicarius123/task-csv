<form class="form-horizontal" method="POST" action="{{ route('checked_import') }}">
    {{ csrf_field() }}
    <label>ID</label>
    <input type="text" name="id"  />
    <button>Submit</button>
</form>
