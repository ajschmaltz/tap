@extends ('app')

@section('content')

<ul>
  @foreach ($forms as $form)
  <li>{{ $form->id }}</li>
  @endforeach
</ul>


@endsection