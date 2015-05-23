@extends ('app')

@section('content')

<ul>
  @foreach ($forms as $form)
  <li>
    <h2><a href="/form/{{ $form->id }}">{{ $form->title }}</a></h2>
    <textarea>
      <script src="/tq.js" type="text/javascript" id="tq_js" data-form_id="{{ $form->id }}"></script>
    </textarea>
  </li>
  @endforeach
</ul>


@endsection