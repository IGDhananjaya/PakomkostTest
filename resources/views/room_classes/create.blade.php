@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Tambah Kelas Kamar</h1>
        <form action="{{ route('room_classes.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kost_id">Kost:</label>
                        <select id="kost_id" name="kost_id" class="form-control" required>
                            <option value="">Pilih Kost</option>
                            @foreach ($kosts as $kost)
                                <option value="{{ $kost->id }}">{{ $kost->name_kost }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="classes_name">Nama:</label>
                        <input type="text" id="classes_name" name="classes_name" required class="form-control"
                            value="{{ old('classes_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control" id="price" name="price"
                                placeholder="Enter price" value="{{ old('price') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="facilities">Facilities:</label>
                        <div id="facilities-container" class="mb-2">
                            @if (old('facilities'))
                                @foreach (old('facilities') as $facility)
                                    <div class="input-group mb-2">
                                        <input type="text" name="facilities[]" class="facility-input form-control"
                                            value="{{ $facility }}">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-danger"
                                                onclick="removeFacility(this)">-</button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="input-group mb-2">
                                    <input type="text" name="facilities[]" class="facility-input form-control">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-danger"
                                            onclick="removeFacility(this)">-</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" onclick="addFacility()" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i> Add Facility
                        </button>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        window.addFacility = function() {
            var container = document.getElementById('facilities-container');
            var div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.innerHTML = `
                <input type="text" name="facilities[]" class="facility-input form-control">
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger" onclick="removeFacility(this)">-</button>
                </div>
            `;
            container.appendChild(div);
        }

        window.removeFacility = function(button) {
            var container = document.getElementById('facilities-container');
            container.removeChild(button.parentElement.parentElement);
        }
        document.addEventListener('DOMContentLoaded', function() {
            var priceInput = document.getElementById('price');
            priceInput.addEventListener('input', function() {
                this.value = this.value.replace(/[^\d]/g, ''); // Hanya menerima digit
            });
        });
    </script>
@endsection
