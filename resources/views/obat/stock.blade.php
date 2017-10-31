@extends('main')
@section('content')
<div class="panel-heading">
<a type="button" class="pull-right btn btn-custom waves-effect waves-light" href="{{ url('obat/'.$obat->kode.'/stock/create') }}"><i class="fa fa-medkit"></i> Tambah Stock Obat</span></a>
	<h3 class="panel-title">Tabel Data Stock</h3>
</div>
<div class="panel-body">
   <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kode Stock</th>
                                        <th>Stock Awal</th>
                                        <th>Stock Sekarang</th>
                                        <th>Tanggal Kadaluarsa</th>
                                        <th><i class="fa fa-spin fa-cog"></i></th>
                                    </tr>
                                </thead>

                                <tbody>
									@foreach($stocks as $stock)
                                    <tr id="{{ $stock->id }}">
                                        <td>{{ $stock->kode_stock }}</td>
                                        <td>{{ $stock->stock_awal }} {{ $obat->satuan }}</td>
                                        <td>{{ $stock->stock_sekarang }} {{ $obat->satuan }}</td>
                                        <td>{{ date_format(date_create($stock->tanggal_kadaluarsa), 'j F Y') }}</td>
                                        <td>
											<a class="btn btn-icon waves-effect waves-light btn-warning btn-xs" href="{{ url('obat/'.$obat->kode.'/'.Crypt::encrypt($stock->id).'/edit') }}"> 
											<i class="fa fa-pencil"></i></a>
											<a class="btn btn-icon waves-effect waves-light btn-danger btn-xs" onclick="warning_hapus('Yakin akan menghapus data stock ini?','{{ Crypt::encrypt($stock->id) }}','{{ $stock->id }}')">
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
							url: "{{url('stock')}}/"+b+"/destroy/",
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