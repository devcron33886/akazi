@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.advert.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.adverts.update', [$advert->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="category_id">{{ trans('cruds.advert.fields.category') }}</label>
                    <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}"
                        name="category_id" id="category_id" required>
                        @foreach ($categories as $id => $entry)
                            <option value="{{ $id }}"
                                {{ (old('category_id') ? old('category_id') : $advert->category->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category'))
                        <div class="invalid-feedback">
                            {{ $errors->first('category') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.advert.fields.category_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="company_id">{{ trans('cruds.advert.fields.company') }}</label>
                    <select class="form-control select2 {{ $errors->has('company') ? 'is-invalid' : '' }}"
                        name="company_id" id="company_id" required>
                        @foreach ($companies as $id => $entry)
                            <option value="{{ $id }}"
                                {{ (old('company_id') ? old('company_id') : $advert->company->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('company'))
                        <div class="invalid-feedback">
                            {{ $errors->first('company') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.advert.fields.company_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.advert.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                        name="title" id="title" value="{{ old('title', $advert->title) }}" required>
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.advert.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="body">{{ trans('cruds.advert.fields.body') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="body">{!! old('body', $advert->body) !!}</textarea>
                    @if ($errors->has('body'))
                        <div class="invalid-feedback">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.advert.fields.body_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="deadline">{{ trans('cruds.advert.fields.deadline') }}</label>
                    <input class="form-control date {{ $errors->has('deadline') ? 'is-invalid' : '' }}" type="text"
                        name="deadline" id="deadline" value="{{ old('deadline', $advert->deadline) }}" required>
                    @if ($errors->has('deadline'))
                        <div class="invalid-feedback">
                            {{ $errors->first('deadline') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.advert.fields.deadline_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="location">{{ trans('cruds.advert.fields.location') }}</label>
                    <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text"
                        name="location" id="location" value="{{ old('location', $advert->location) }}" required>
                    @if ($errors->has('location'))
                        <div class="invalid-feedback">
                            {{ $errors->first('location') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.advert.fields.location_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.advert.fields.sector') }}</label>
                    <select class="form-control {{ $errors->has('sector') ? 'is-invalid' : '' }}" name="sector"
                        id="sector">
                        <option value disabled {{ old('sector', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\Advert::SECTOR_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('sector', $advert->sector) === (string) $key ? 'selected' : '' }}>
                                {{ $label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('sector'))
                        <div class="invalid-feedback">
                            {{ $errors->first('sector') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.advert.fields.sector_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="education_level">{{ trans('cruds.advert.fields.education_level') }}</label>
                    <input class="form-control {{ $errors->has('education_level') ? 'is-invalid' : '' }}" type="text"
                        name="education_level" id="education_level"
                        value="{{ old('education_level', $advert->education_level) }}">
                    @if ($errors->has('education_level'))
                        <div class="invalid-feedback">
                            {{ $errors->first('education_level') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.advert.fields.education_level_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="desired_experience">{{ trans('cruds.advert.fields.desired_experience') }}</label>
                    <input class="form-control {{ $errors->has('desired_experience') ? 'is-invalid' : '' }}" type="text"
                        name="desired_experience" id="desired_experience"
                        value="{{ old('desired_experience', $advert->desired_experience) }}">
                    @if ($errors->has('desired_experience'))
                        <div class="invalid-feedback">
                            {{ $errors->first('desired_experience') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.advert.fields.desired_experience_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.advert.fields.contract_type') }}</label>
                    <select class="form-control {{ $errors->has('contract_type') ? 'is-invalid' : '' }}"
                        name="contract_type" id="contract_type">
                        <option value disabled {{ old('contract_type', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\Advert::CONTRACT_TYPE_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('contract_type', $advert->contract_type) === (string) $key ? 'selected' : '' }}>
                                {{ $label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('contract_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('contract_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.advert.fields.contract_type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="number_of_positions">{{ trans('cruds.advert.fields.number_of_positions') }}</label>
                    <input class="form-control {{ $errors->has('number_of_positions') ? 'is-invalid' : '' }}"
                        type="number" name="number_of_positions" id="number_of_positions"
                        value="{{ old('number_of_positions', $advert->number_of_positions) }}" step="1">
                    @if ($errors->has('number_of_positions'))
                        <div class="invalid-feedback">
                            {{ $errors->first('number_of_positions') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.advert.fields.number_of_positions_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="user_id">{{ trans('cruds.advert.fields.user') }}</label>
                    <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id"
                        id="user_id">
                        @foreach ($users as $id => $entry)
                            <option value="{{ $id }}"
                                {{ (old('user_id') ? old('user_id') : $advert->user->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('user'))
                        <div class="invalid-feedback">
                            {{ $errors->first('user') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.advert.fields.user_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.advert.fields.status') }}</label>
                    <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
                        id="status">
                        <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\Advert::STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('status', $advert->status) === (string) $key ? 'selected' : '' }}>
                                {{ $label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.advert.fields.status_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function(file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST',
                                            '{{ route('admin.adverts.storeCKEditorImages') }}',
                                            true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText =
                                            `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function() {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response
                                                    .message ?
                                                    `${genericErrorText}\n${xhr.status} ${response.message}` :
                                                    `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`
                                                );
                                            }

                                            $('form').append(
                                                '<input type="hidden" name="ck-media[]" value="' +
                                                response.id + '">');

                                            resolve({
                                                default: response.url
                                            });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(
                                                e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '{{ $advert->id ?? 0 }}');
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>
@endsection
