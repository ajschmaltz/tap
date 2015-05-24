<li>
  {{ $lead }}
  @foreach ($lead->photos as $photo)
  <li><img src="/files/{{ $photo->uuid }}/{{ $photo->filename }}" /></li>
  @endforeach
</li>