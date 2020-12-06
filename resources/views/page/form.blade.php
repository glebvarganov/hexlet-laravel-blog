@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ Form::label('title', 'Заголовок') }}<br>
{{ Form::text('title') }}<br><br>
{{ Form::label('body', 'Содержание') }}<br>
{{ Form::textarea('body') }}<br><br>
{{ Form::label('status', 'Статус') }}<br>
{{ Form::select('status', ['draft' => 'Черновик', 'published' => 'Опубликовано']) }}<br><br>
