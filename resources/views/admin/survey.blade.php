@extends('admin/layout')

@section('content')
<h1>MUSTAHIK</h1>
<hr>
@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif
<table class="table table-responsive shadow table-bordered" id="pending">
    <thead>
      <tr class="bg-secondary text-light">
        <th>No KK</th>
        <th>Kepala Keluarga</th>
        <th>Penerima</th>
        <th>Jenis Bantuan</th>
        <th>Status</th>
        <th>Tanggal Pengajuan</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
      @foreach($mustahik as $u)
    <tr>
        <td>{{$u->no_kartu_kk}}</td>
        <td>{{$u->nama_kepala_kk}}</td>
        <td>{{$u->nama_penerima}}</td>
        <td>Dumai {{$u->jenis_bantuan}}</td>
        <?php 
        $cek_survey = DB::table('tb_survey')->orderBy('survey_id')->where('mustahik_id',$u->mustahik_id)->get();
        ?>
        <td><span class="badge bg-<?= count($cek_survey) > 0 ? 'success' : 'primary' ?> text-light">{{$u->status_keputusan}} <?= count($cek_survey) > 0 ? '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
          <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
        </svg>' : '' ?></span></td>
        <td>{{$u->created_at}}</td>
        <td>
          @if($auth->jabatan == 'staff')
          <a href="{{url('/dokumentasi-survey/'.$u->mustahik_id)}}" class="btn btn-warning">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
              <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
              <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
            </svg>
          </a> 
          @else
          <a href="{{url('/detail-proses-survey/'.$u->mustahik_id)}}" class="btn btn-warning">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-star-fill" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM8.16 4.1a.178.178 0 0 0-.32 0l-.634 1.285a.178.178 0 0 1-.134.098l-1.42.206a.178.178 0 0 0-.098.303L6.58 6.993c.042.041.061.1.051.158L6.39 8.565a.178.178 0 0 0 .258.187l1.27-.668a.178.178 0 0 1 .165 0l1.27.668a.178.178 0 0 0 .257-.187L9.368 7.15a.178.178 0 0 1 .05-.158l1.028-1.001a.178.178 0 0 0-.098-.303l-1.42-.206a.178.178 0 0 1-.134-.098L8.16 4.1z"/>
            </svg>
          </a> 
          @endif
        </td>
      </tr>
    @endforeach
    </tbody>
</table>
@endsection