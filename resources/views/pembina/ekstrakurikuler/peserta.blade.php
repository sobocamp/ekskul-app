@extends('layouts.admin')

@section('title', $title)

@section('content')
<style>
   p {
      margin: 0;
   }
</style>
{{-- <a href="{{ route('extracurricular.siswa', auth()->user()->id) }}" class="btn btn-primary float-end mt-n1">
   <i class="fa fa-eye"></i> Lihat Ekstrakurikuler Saya
</a> --}}
<div class="mb-3">
   <h1 class="h3 d-inline align-middle">{{ $title }}</h1>
</div>

<div class="row">
   <div class="col-12 col-xl-12">
      <div class="card">
         <div class="table-responsive">
            <table class="table table-striped mb-0">
               <thead>
                  <tr>
                     <th style="width: 10px;">No.</th>
                     <th>Nama</th>
                     <th width="100px;">Status</th>
                     <th width="60px;">Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($extracurricular->participants as $item)
                  <tr>
                     <td>{{ $loop->iteration }}</td>
                     <td>{{ $item->name }}</td>
                     <td>
                        @if ($item->pivot->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                        @elseif ($item->pivot->status == 'approved')
                        <span class="badge bg-success">Diterima</span>
                        @elseif ($item->pivot->status == 'rejected')
                        <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>
                     <td class="text-nowrap">
                        <a data-bs-toggle="tooltip" data-bs-placement="top" class="btn btn-sm btn-primary"
                           href="{{ route('extracurricular.detail', $extracurricular->id) }}" title="Lihat Detail">
                           <i data-feather="activity"></i>
                           Ekstrakurikuler
                        </a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
      <div class="d-flex justify-content-end mt-3">
         {{-- {{ $peserta->links() }} --}}
      </div>
   </div>
</div>
@endsection
