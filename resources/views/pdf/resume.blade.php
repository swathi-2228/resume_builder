<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $resume->title }}</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #222; line-height: 1.6; font-size: 10pt; margin: 0; padding: 20px; }
        .header { text-align: center; border-bottom: 2px solid #5a67d8; padding-bottom: 15px; margin-bottom: 20px; }
        .name { font-size: 26pt; font-weight: bold; text-transform: uppercase; letter-spacing: 2px; color: #1a202c; margin: 0 0 10px 0; }
        .contact { font-size: 10pt; color: #4a5568; }
        .contact span { margin: 0 10px; }
        .section-title { font-size: 13pt; font-weight: bold; text-transform: uppercase; color: #434190; border-bottom: 1px solid #cbd5e0; padding-bottom: 4px; margin-top: 25px; margin-bottom: 12px; letter-spacing: 1px;}
        .content { font-size: 10pt; text-align: justify; color: #2d3748; }
        .skills-list { margin: 0; padding: 0; list-style-type: none; }
        .skills-list li { display: inline-block; background-color: #edf2f7; border: 1px solid #e2e8f0; border-radius: 4px; padding: 4px 10px; margin: 4px 4px 4px 0; font-size: 9pt;}
    </style>
</head>
<body>
    <div class="header">
        <h1 class="name">{{ $resume->full_name ?: 'User' }}</h1>
        <div class="contact">
            @if($resume->email)<span>{{ $resume->email }}</span>@endif
            @if($resume->phone)<span>| {{ $resume->phone }}</span>@endif
            @if($resume->address)<br><span>{{ $resume->address }}</span>@endif
        </div>
    </div>

    @if($resume->summary)
    <div class="section-title">Professional Summary</div>
    <div class="content">{{ $resume->summary }}</div>
    @endif

    @if($resume->skills && count(array_filter($resume->skills)) > 0)
    <div class="section-title">Core Competencies</div>
    <div class="content">
        <ul class="skills-list">
            @foreach($resume->skills as $skill)
                @if($skill)<li>{{ $skill }}</li>@endif
            @endforeach
        </ul>
    </div>
    @endif
</body>
</html>
