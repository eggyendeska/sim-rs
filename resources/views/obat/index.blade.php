@extends('main')
@section('content')
<div class="panel-heading">
<a type="button" class="pull-right btn btn-custom waves-effect waves-light" href="{{ url('obat/create') }}"><i class="fa fa-medkit"></i> Tambah Obat</span></a>
	<h3 class="panel-title">Tabel Data Obat</h3>
</div>
<div class="panel-body">
   <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kode</th>
                                        <th>Jumlah Stock</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th><i class="fa fa-spin fa-cog"></i></th>
                                    </tr>
                                </thead>

                                <tbody>
									@foreach($obats as $obat)
                                    <tr id="{{ $obat->id }}">
                                        <td>{{ $obat->nama }}</td>
                                        <td>{{ $obat->kode }}</td>
										<td>{{ App\StockObat::cek_stock($obat->kode) }} {{ $obat->satuan }}</td>
                                        <td>{{ $obat->harga }}</td>
                                        <td>
										@if($obat->status==1)
											<span class="label label-purple">Tersedia</span>
										@else
											<span class="label label-inverse">Tidak Tersedia</span>
										@endif
										</td>
                                        <td>
											<a class="btn btn-icon waves-effect waves-light btn-info btn-xs" href="{{ url('obat/'.$obat->kode.'/stock') }}"> 
											<i class="fa fa-search"></i></a>
											<a class="btn btn-icon waves-effect waves-light btn-warning btn-xs" href="{{ url('obat/'.Crypt::encrypt($obat->id).'/edit') }}"> 
											<i class="fa fa-pencil"></i></a>
											<a class="btn btn-icon waves-effect waves-light btn-danger btn-xs" onclick="warning_hapus('Yakin akan menghapus obat ini?','{{ Crypt::encrypt($obat->id) }}','{{ $obat->id }}')">
											<i class="fa fa-trash"></i></a>
										</td>
                                    </tr>
									@endforeach
                                </tbody>
                            </table>

</div>
<script>
	function warning_hapus(a,b,c) {
                swal({
                    title: "Konfirmasi hapus data",
                    text: a,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, Hapus Data",
                    cancelButtonText: "Tidak",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
					  $.ajax({
							type: 'POST',
							url: "{{url('obat')}}/"+b+"/destroy/",
							success: function(data) {
							if(data=='1'){
								swal("Deleted!", "Data telah dihapus!", "success");
								$("#"+c).delay("fast").fadeOut();
							}else{
								swal("Failed!", "Data gagal dihapus!", "error");
							}
							}
						})
                    }
                });
            
        }
</script>
@endsection