@extends('layouts.backend.app')

@push('css')
  <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/summernote/summernote-bs4.css') }}">
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>{{ __('Edit') }}</h4>
            </div>
            @if ($errors->any())
              <div class="alert alert-danger">
                  <strong>{{ __('Whoops!') }}</strong> {{ __('There were some problems with your input.') }}<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            <form method="POST" action="{{ route('admin.howitworks.update', $howitworks->id) }}" enctype="multipart/form-data" class="basicform_with_reload">
              @csrf
              @method('PUT')
              @php
               $info = json_decode($howitworks->howitworksMeta->value);
              @endphp
              <div class="card-body">
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="form-group">
                          <label>{{ __('Title') }}</label>
                          <input type="title" class="form-control" placeholder="Title" required name="title" value="{{ $howitworks->title  }}">
                      </div>
                    </div>                   
                </div>
                <div class="form-row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>{{ __('Description') }}</label>
                      <textarea name="description" class="form-control">{{ $info->description }}</textarea>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                   <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="form-group">
                        <label>{{ __('Image') }}</label>
                        <input type="file" class="form-control" name="image">
                      </div>
                      <img width="100" src="{{ asset( $info->image) }}" alt="{{ $info->image }}">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>{{ __('Status') }}</label>
                            <select name="status" class="form-control">
                            
                              <option value="1" {{ $howitworks->status == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                              <option value="0" {{ $howitworks->status == 0 ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary btn-lg float-right w-100 basicbtn">{{ __('Submit') }}</button>
                  </div>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
  <script src="{{ asset('backend/admin/assets/js/summernote-bs4.js') }}"></script>
@endpush