


<form action="/cart" method="post">
    @csrf
<input type="hidden" name="produk_id" value="1">
<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

<button type="submit" name="tambah">test</button>



</form>