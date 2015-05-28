@extends ('app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-sm-push-2">
        <a href="/form/create" class="btn btn-success">Create a Lead Form</a>
        <table class="table">
          <thead>
          <th>ID</th>
          <th>Title</th>
          <th>Edit</th>
          <th>Delete</th>
          </thead>
          <tbody>
          @foreach ($forms as $form)
          <tr>
            <th>{{ $form->id }}</th>
            <td>{{ $form->title }}</td>
            <td>Edit</td>
            <td>Delete</td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>


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