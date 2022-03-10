@props([
  'total', 'applicant', 'skill'
])
<tr>
  @if ($loop->first)
    <td rowspan="{{ $total }}" class="job-name">{{ $applicant->job->name }}</td>
  @endif
    <td rowspan="{{ $applicant->skills->count() }}" class="applicant-name">{{$applicant->name}}</td>
    <td rowspan="{{ $applicant->skills->count() }}"><a href="mailto:kaitlin@lesch.co.uk">{{$applicant->email}}</a></td>
    <td rowspan="{{ $applicant->skills->count() }}"><a href="{{$applicant->website}}">{{$applicant->website}}</a></td>
    <td>{{ $applicant->skills[0]->name }}</td>
    <td rowspan="{{ $applicant->skills->count() }}">{{$applicant->cover_letter}}</td>
  @foreach($applicant->skills as $skill)
  @if (!$loop->first)
      <tr>
        <td>{{ $skill->name }}</td>
      </tr>
  @endif
  @endforeach
  </tr>