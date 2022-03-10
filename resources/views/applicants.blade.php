<!DOCTYPE html>
<html>
  <head>
    <title>Job Applicants Report</title>
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.9.1/build/cssreset/cssreset-min.css">
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.9.1/build/cssbase/cssbase-min.css">
    <style type="text/css">
      #page {
        width: 1200px;
        margin: 30px auto;
      }
      .job-applicants {
        width: 100%;
      }
      .job-name {
        text-align: center;
      }
      .applicant-name {
        width: 150px;
      }
    </style>
  </head>
  <body>
    <div id="page">
      <table class="job-applicants">
        <thead>
          <tr>
            <th>Job</th>
            <th>Applicant Name</th>
            <th>Email Address</th>
            <th>Website</th>
            <th>Skills</th>
            <th>Cover Letter Paragraph</th>
          </tr>
        </thead>

        <tbody>
          @foreach($designerApplicants as $applicant)
          <tr>
          @if ($loop->first)
            <td rowspan="{{ $designerTotal }}" class="job-name">{{ $applicant->job->name }}</td>
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
          @endforeach

          

          @foreach($webDevApplicants as $applicant)
          <tr>
            @if($loop->first)
            <td rowspan="{{ $webDevTotal }}" class="job-name">{{ $applicant->job->name }}</td>
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
          @endforeach

          @foreach($allOtherApplicants as $applicant)
          <tr>            
            <td rowspan="{{ $applicant->skills->count() }}" class="job-name">{{ $applicant->job->name }}</td>
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
          @endforeach
        
        </tbody>
        
        <tfoot>
          <tr>
            <td colspan="6">{{$applicants->count()}} Applicants, {{ $skillCount }} Unique Skills</td>
          </tr>
        </tfoot>
      </table>
    </div>
  </body>
</html>

