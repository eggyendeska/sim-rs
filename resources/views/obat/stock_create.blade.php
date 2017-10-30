@extends('main')
@section('content')
<div class="panel-heading">
	<h3 class="panel-title">Form Tambah Obat</h3>
</div>
<div class="panel-body">
						<form class="form-horizontal" method="POST" action="{{ url('obat/'.$kode.'/stock') }}">
                        {{ csrf_field() }}
                                
								<div class="form-group" id="jumlah_awal_form">
                                    <label for="userName">Jumlah Stock Awal</label>
                                    <input type="text" name="jumlah_awal" parsley-trigger="change" required
                                           placeholder="Masukkan Jumlah Stock Obat" class="form-control" id="jumlah_awal" value="{{ old('jumlah_awal') }}">
								@if ($errors->has('jumlah_awal'))
                                    <script>
										document.getElementById("jumlah_awal_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('jumlah_awal') }}</strong>
                                    </p>
                                @endif
                                </div>
								<div class="form-group" id="tanggal_kadaluarsa_form">
                                    <label for="userName">Tanggal Kadaluarsa</label>
                                    <input type="date" name="tanggal_kadaluarsa" parsley-trigger="change" required
                                           placeholder="Tanggal Kadaluarsa" class="form-control" id="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa') }}">
								@if ($errors->has('tanggal_kadaluarsa'))
                                    <script>
										document.getElementById("tanggal_kadaluarsa_form").className = "form-group has-error has-feedback";
									</script>
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('tanggal_kadaluarsa') }}</strong>
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