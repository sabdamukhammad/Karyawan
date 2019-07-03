@if(isset($berita))
	{!! Form::hidden('id', $berita->id) !!}
@endif

@if ($errors -> any())
	<div class="form-group {{ $errors -> has('judul') ? 'has-error' : 'has-success' }}">
		@else
		<div class="form-group">
			@endif
			{!! Form::label('judul', 'Judul Berita : ', ['class' => 'control-label']) !!}
			{!! Form::text('judul', null, ['class' => 'form-control']) !!}

			@if ($errors -> has('judul'))
				<span class="help-block">{{ $errors -> first('judul') }}</span>
			@endif
		</div>

@if ($errors -> any())
	<div class="form-group {{ $errors -> has('isiberita') ? 'has-error' : 'has-success' }}">
		@else
		<div class="form-group">
			@endif
			{!! Form::label('isiberita', 'Isi Berita :', ['class' => 'control-label']) !!}
			{!! Form::textarea('isiberita', null, ['class' => 'form-control']) !!}

			@if($errors -> has('isiberita'))
				<span class="help-block">{{ $errors -> first('isiberita')}}</span>
			@endif
		</div>

@if($errors -> any())
<div class="form-group {{ $errors -> has('foto') ? 'has-error' : 'has-success'}}">
	@else
	<div class="form-group">
		@endif
		{!! Form::label('foto', 'Gambar Berita : ') !!}
		{!! Form::file('foto') !!}
		@if($errors->has('foto'))
		<span class="help-block">{{ $errors->first('foto') }}</span>
		@endif
	</div>

<div class="form-group">
		{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
