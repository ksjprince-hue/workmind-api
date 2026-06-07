# WorkMind AI

AI 기반 업무 분석 플랫폼 MVP

## 프로젝트 소개

WorkMind AI는 OpenAI API를 활용하여 회의 내용과 문서를 자동 분석하는 AI 업무 생산성 플랫폼입니다.

Laravel 기반 REST API 서버와 TailwindCSS 기반 모바일 UI를 활용하여 개발하였습니다.

---

## 주요 기능

* 회의 내용 AI 요약
* TODO 자동 추출
* PDF 문서 분석
* 음성 회의 분석 구조 설계
* SQLite 기반 분석 기록 저장
* 모바일 앱 스타일 UI 구현

---

## 기술 스택

### Backend

* Laravel 12
* PHP
* SQLite
* OpenAI API

### Frontend

* Blade
* TailwindCSS
* Vite

---

## AI 기능

### 회의 분석

회의 내용을 입력하면 GPT 기반 AI가:

* 핵심 요약
* 해야 할 일(TODO)
  을 자동 생성합니다.

### PDF 분석

PDF 파일 내용을 추출하여:

* 문서 요약
* 핵심 키워드
  를 분석합니다.

### 음성 분석

Whisper 기반 음성 회의 분석 구조를 구현하였습니다.

---

## 프로젝트 화면

* 모바일 앱 스타일 UI
* 다크모드 기반 디자인
* iOS 감성 레이아웃

---

## 실행 방법

```bash
composer install
npm install
php artisan migrate
npm run dev
php artisan serve
```

---

## 향후 개선 예정

* 실시간 회의 분석
* 사용자 로그인 기능
* 클라우드 DB 연동
* AI 기반 일정 추천 기능
* 모바일 앱 배포