@extends('admin/layout')

@section('content')
<h4 class="text-muted">Dashboard</h4>
<p class="text-muted">
    Selamat datang <b>{{$name}}</b>, ini aplikasi pendataan Mustahik Baznas Kota Dumai. 
</p>
    @if($role == 'staff')
    <hr>
    <p class="text-muted">
        <h5 class="text-muted">Apa Yang Bisa Kamu Lakukan Disini ?</h5>
        <span class="text-muted">Kamu bisa melakukan penambahan, perubahan dan menghapus data Mustahik.</span>
    </p>
    <p class="text-muted">
        Silahkan klik tombol menu Data Mustahik di sebelah kiri untuk memulai pendataan.
    </p>
    @endif
</table>
@endsection