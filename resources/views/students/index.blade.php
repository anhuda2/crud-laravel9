@extends('layout.admin')
@section('content')
<div class="p-4 shadow-lg p-3 mb-5 rounded flex-container;" style="background: rgb(64,134,58);
background: linear-gradient(211deg, rgba(64,134,58,1) 0%, rgba(93,164,88,1) 36%, rgba(179,255,174,1) 100%); color: #064420; margin: 40px;">
<h4 style="text-align: center;">Students Data</h4>
</div>
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body" style=" background: rgba(220, 239, 231, 0.938);">
                        <a href="{{ route('students.create') }}" class="btn btn-md btn-success mb-3 shadow rounded">TAMBAH SANTRI</a>
                        <table class="table table-bordered  shadow rounded;">
                              <tr style="background: rgb(64,134,58);
                              background: linear-gradient(211deg, rgba(64,134,58,1) 0%, rgba(93,164,88,1) 36%, rgba(179,255,174,1) 100%); color: #064420; margin: 40px;">
                                <th scope="col">Nomor Induk</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nomor Hp</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Option</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($students as $student)
                                <tr>
                                    <td style="text-align: center;">{{ $student->number }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone}}</td>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/students/').$student->image }}" class="rounded" style="width: 150px">
                                    </td>
                     
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('students.destroy', $student->id) }}" method="POST">
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary" style="width:100%;">EDIT</a><br><br>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" style="width:100%;">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Student belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
    @stop