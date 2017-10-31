@extends('main')
@section('content')
<div class="panel-heading">
	<h3 class="panel-title">Form Tambah Obat</h3>
</div>
<div class="panel-body">
						<form class="form-horizontal col-lg-6" method="POST" action="{{ url('obat/'. $obat->id ) }}">
                        {{ csrf_field() }}{{ method_field('PUT') }}
                                <input type="hidden" name="id" value="{{ $obat->id }}">
								<div class="form-group" id="name_form">
                                    <label for="userName">Nama</label>
                                    <input type="text" name="nama" parsley-trigger="change" required
                                           placeholder="Masukkan Nama Obat" class="form-control" id="nama" value="{{ $obat->nama }}">
								@if ($errors->has('nama'))
                                    <script>
										document.getElementById("name_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </p>
                                @endif
                                </div>
								<div class="form-group" id="kode_form">
                                    <label for="userName">Kode</label>
                                    <input type="text" name="kode" parsley-trigger="change" required
                                           placeholder="Masukkan Kode Obat" class="form-control" id="kode" value="{{ $obat->kode }}">
								@if ($errors->has('kode'))
                                    <script>
										document.getElementById("kode_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('kode') }}</strong>
                                    </p>
                                @endif
                                </div>
								<div class="form-group" id="harga_form">
                                    <label for="userName">Harga</label>
                                    <input type="text" name="harga" parsley-trigger="change" required
                                           placeholder="Masukkan Harga Obat" class="form-control" id="harga" value="{{ $obat->harga }}">
								@if ($errors->has('harga'))
                                    <script>
										document.getElementById("harga_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('harga') }}</strong>
                                    </p>
                                @endif
                                </div>
								<div class="form-group" id="satuan_form">
                                    <label for="userName">Satuan</label>
                                    <select class="form-control select2" name="satuan" id="satuan">
										<option>Pilih Satuan</option>                             
										<option value="Butir" @if($obat->satuan == "Butir") Selected @endif>Butir</option>      
										<option value="Botol" @if($obat->satuan == "Botol") Selected @endif>Botol</option>
									</select>
								@if ($errors->has('satuan'))
                                    <script>
										document.getElementById("satuan_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('satuan') }}</strong>
                                    </p>
                                @endif
                                </div>
								<div class="form-group" id="status_form">
                                    <label for="userName">Status</label>
                                    <select class="form-control select2" name="status" id="status">
										<option>Pilih Status</option>                             
										<option value="1" @if($obat->status == "1") Selected @endif>Tersedia</option>      
										<option value="0" @if($obat->status == "0") Selected @endif>Tidak Tersedia</option>
									</select>
								@if ($errors->has('status'))
                                    <script>
										document.getElementById("status_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </p>
                                @endif
                                </div>
                               

                                <div class="form-group text-left m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                        Reset
                                    </button>
                                </div>
                            </form>

</div>
@endsection