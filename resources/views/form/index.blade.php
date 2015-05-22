@extends ('app')

@section('content')

<ul>
  @foreach ($forms as $form)
  <li><a href="/form/{{ $form->id }}">{{ $form->title }}</a></li>
  @endforeach
</ul>


@endsection