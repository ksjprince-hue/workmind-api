<?php
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Smalot\PdfParser\Parser;
use App\Models\AnalysisRecord;

Route::get('/meeting/test', function () {
    return response()->json([
        'message' => 'Meeting API OK'
    ]);
});
Route::get('/ai/test', function () {

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        'Content-Type' => 'application/json',
    ])->post('https://api.openai.com/v1/chat/completions', [

        'model' => 'gpt-4o-mini',

        'messages' => [
            [
                'role' => 'user',
                'content' => '안녕하세요. 테스트 응답만 해주세요.'
            ]
        ],

    ]);

    $content = $response->json()['choices'][0]['message']['content'];

    $parsed = json_decode($content, true);

    return response()->json($parsed);
});
Route::post('/meeting/analyze', function () {

    $meetingText = request('text');

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        'Content-Type' => 'application/json',
    ])->post('https://api.openai.com/v1/chat/completions', [

        'model' => 'gpt-3.5-turbo',

        'messages' => [
            [
                'role' => 'system',
                'content' => '
너는 회의 분석 AI다.

반드시 JSON 형식으로만 응답해라.

응답 형식:
{
  "summary": "회의 요약",
  "tasks": [
    "할 일1",
    "할 일2"
  ]
}

다른 말은 절대 하지 마라.
'
            ],

            [
                'role' => 'user',
                'content' => $meetingText
            ]
        ],

    ]);

    $content = $response->json()['choices'][0]['message']['content'];

    $parsed = json_decode($content, true);
    AnalysisRecord::create([
    'type' => 'meeting',
    'original_text' => $meetingText,
    'summary' => $parsed['summary'],
    'tasks' => json_encode($parsed['tasks'])
]);
    return response()->json($parsed);
});
Route::post('/pdf/analyze', function () {

    $file = request()->file('pdf');

    $parser = new Parser();

    $pdf = $parser->parseFile($file->getPathname());

    $text = $pdf->getText();

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        'Content-Type' => 'application/json',
    ])->post('https://api.openai.com/v1/chat/completions', [

        'model' => 'gpt-4o-mini',

        'messages' => [
            [
                'role' => 'system',
                'content' => '
                너는 문서 분석 AI다.

                반드시 JSON 형식으로 응답해라.

                응답 형식:
                {
                  "summary": "문서 요약",
                  "keywords": [
                    "키워드1",
                    "키워드2"
                  ]
                }
                '
            ],

            [
                'role' => 'user',
                'content' => $text
            ]
        ],

    ]);

    $content = $response->json()['choices'][0]['message']['content'];

    $parsed = json_decode($content, true);

    return response()->json($parsed);
});
Route::post('/audio/analyze', function () {

    $file = request()->file('audio');

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
    ])
    ->attach(
        'file',
        fopen($file->getPathname(), 'r'),
        $file->getClientOriginalName()
    )
    ->post('https://api.openai.com/v1/audio/transcriptions', [
        'model' => 'whisper-1',
    ]);

    $transcript = $response->json()['text'];

    $gptResponse = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        'Content-Type' => 'application/json',
    ])->post('https://api.openai.com/v1/chat/completions', [

        'model' => 'gpt-4o-mini',

        'messages' => [
            [
                'role' => 'system',
                'content' => '
                너는 회의 분석 AI다.

                반드시 JSON 형식으로 응답해라.

                응답 형식:
                {
                  "summary": "회의 요약",
                  "tasks": [
                    "할 일1",
                    "할 일2"
                  ]
                }
                '
            ],

            [
                'role' => 'user',
                'content' => $transcript
            ]
        ],

    ]);

    $content = $gptResponse->json()['choices'][0]['message']['content'];

    $parsed = json_decode($content, true);

    return response()->json([
        'transcript' => $transcript,
        'analysis' => $parsed
    ]);
});
Route::get('/records', function () {

    $records = AnalysisRecord::latest()->get();

    return response()->json($records);
});