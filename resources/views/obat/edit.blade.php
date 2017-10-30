@extends('main')
@section('content')
<div class="panel-heading">
	<h3 class="panel-title">Form Tambah Obat</h3>
</div>
<div class="panel-body">
						<form class="form-horizontal" method="POST" action="{{ url('obat/'. $obat->id ) }}">
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
								<div class="form-group" id="status_form">
                                    <label for="userName">Status</label>
                                    <input type="text" name="status" parsley-trigger="change" required
                                           placeholder="Masukkan Nama" class="form-control" id="status" value="{{ $obat->status }}">
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