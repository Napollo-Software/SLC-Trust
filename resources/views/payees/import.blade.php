@extends("nav")
@section('title', 'Add Balance | Senior Life Care Trusts')
@section("wrapper")
<style type="text/css">
#hidden_div {
    display: none;
}
#hidden_div2 {
    display: none;
}
.search-nav{
  padding-bottom: 5%;
}
</style>

<form action="save-imported-payee" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="payees">
    <input type="submit" value="Submit">
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@endsection
