<li>
  {{ $lead }}
  @foreach ($lead->photos as $photo)
  <img src="/files/{{ $photo->uuid }}/{{ $photo->filename }}" />
  @endforeach
</li>