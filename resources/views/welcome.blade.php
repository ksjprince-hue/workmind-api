<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>WorkMind AI</title>
</head>

<body class="bg-gradient-to-b from-[#050816] via-black to-[#050816] text-white min-h-screen">

    <div class="max-w-sm mx-auto min-h-screen px-5 py-8 flex flex-col justify-between">

        <div>

            <!-- 상단 -->
            <div class="mb-8">

                <p class="text-gray-400 text-sm mb-2">
                    안녕하세요 👋
                </p>

                <div class="flex items-center justify-between">

                    <div>
                        <h1 class="text-4xl font-bold tracking-tight">
                            WorkMind
                        </h1>

                        <p class="text-gray-500 mt-1">
                            AI 업무 분석 플랫폼
                        </p>
                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-purple-500 to-orange-400 shadow-lg shadow-purple-500/30">
                    </div>

                </div>

            </div>

            <!-- 메인 카드 -->
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-[32px] p-5 mb-6 shadow-2xl shadow-purple-500/10">

                <div class="flex items-center justify-between mb-5">

                    <div>
                        <p class="text-gray-400 text-sm">
                            오늘의 AI 분석
                        </p>

                        <h2 class="text-2xl font-bold mt-1">
                            회의 분석
                        </h2>
                    </div>

                    <div class="px-3 py-1 rounded-full bg-green-500/20 text-green-400 text-xs">
                        AI Ready
                    </div>

                </div>

                <textarea
                    class="w-full h-36 bg-black/40 border border-white/10 rounded-3xl p-4 text-sm placeholder-gray-500 outline-none focus:border-purple-500 transition"
                    placeholder="회의 내용을 입력하세요..."
                ></textarea>

                <button
                    class="w-full mt-5 bg-gradient-to-r from-purple-500 to-orange-400 rounded-3xl py-4 font-semibold text-white shadow-lg shadow-purple-500/30 active:scale-[0.98] transition"
                >
                    ✨ AI 분석 시작
                </button>

            </div>

            <!-- 통계 카드 -->
            <div class="grid grid-cols-2 gap-4 mb-6">

                <div class="bg-white/5 border border-white/10 rounded-3xl p-4 backdrop-blur-xl">

                    <p class="text-gray-400 text-sm mb-2">
                        총 분석 수
                    </p>

                    <h3 class="text-3xl font-bold">
                        14
                    </h3>

                </div>

                <div class="bg-white/5 border border-white/10 rounded-3xl p-4 backdrop-blur-xl">

                    <p class="text-gray-400 text-sm mb-2">
                        저장 문서
                    </p>

                    <h3 class="text-3xl font-bold">
                        32
                    </h3>

                </div>

            </div>

            <!-- 최근 분석 -->
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-[32px] p-5">

                <div class="flex items-center justify-between mb-4">

                    <h2 class="text-xl font-bold">
                        최근 분석
                    </h2>

                    <span class="text-purple-400 text-sm">
                        전체보기
                    </span>

                </div>

                <div class="space-y-3">

                    <div class="bg-black/30 rounded-2xl p-4 border border-white/5">

                        <p class="text-gray-500 text-xs mb-2">
                            회의 요약
                        </p>

                        <p class="text-sm leading-relaxed">
                            프론트 로그인 구현 및 API 개발 진행
                        </p>

                    </div>

                    <div class="bg-black/30 rounded-2xl p-4 border border-white/5">

                        <p class="text-gray-500 text-xs mb-2">
                            PDF 분석
                        </p>

                        <p class="text-sm leading-relaxed">
                            Multi LLM 기반 협업 시스템 문서 분석
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <!-- 하단 탭바 -->
        <div class="mt-8 bg-white/5 border border-white/10 backdrop-blur-xl rounded-3xl p-4">

            <div class="flex items-center justify-around text-sm">

                <div class="text-purple-400">
                    홈
                </div>

                <div class="text-gray-500">
                    기록
                </div>

                <div class="text-gray-500">
                    업로드
                </div>

                <div class="text-gray-500">
                    설정
                </div>

            </div>

        </div>

    </div>

</body>
</html>