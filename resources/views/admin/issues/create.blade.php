@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                Yeni Sayı Ekle
            </div>
            <div class="card-body">
                <form action="{{ route('admin.issues.store') }}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="title"><b>Başlık</b> <i>Örneğin; Arka Kapı Dergi Sayı X veya Arka Kapı Magazine Issue X</i></label>
                            <input id="title" name="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Arka Kapı Dergi Sayı X" value="{{ old('title') }}" required>
                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="price"><b>Ücret</b> <i>Dil Türkçe seçilir ise birim TL, İngilizce seçilir ise birim USD olur.</i></label>
                            <input id="price" name="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="XX.YY" step="0.01" value="{{ old('price') }}" required>
                            @if ($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="month"><b>Aylar ve Yıl</b> <i>Örneğin; 02-03 2019</i></label>
                            <input id="month" name="month" type="text" class="form-control{{ $errors->has('month') ? ' is-invalid' : '' }}" placeholder="02-03 2019" value="{{ old('month') }}" required>
                            @if ($errors->has('month'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('month') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="language"><b>Dil</b></label>
                            <select id="language" name="language" class="form-control{{ $errors->has('language') ? ' is-invalid' : '' }}" required>
                                <option value="tr">Türkçe (Arka Kapı Dergi)</option>
                                <option value="en">İngilizce (Arka Kapı Magazine)</option>
                            </select>
                            @if ($errors->has('language'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('language') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cover"><b>Kapak</b></label>
                            <input id="cover" name="cover" type="file" class="form-control-file{{ $errors->has('cover') ? ' is-invalid' : '' }}" required>
                            @if ($errors->has('cover'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cover') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="content"><b>İçerik</b></label>
                            <textarea id="content" name="content" class="form-control-file{{ $errors->has('content') ? ' is-invalid' : '' }}" required>
                                {{ old('content') }}
                            </textarea>
                            @if ($errors->has('content'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('content') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <button class="btn btn-success" type="submit">Gönder</button>

                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('textarea#content').summernote({
                height: 300
            });
        });
    </script>
@stop