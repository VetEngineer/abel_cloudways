# WordPress 독립 페이지 배포 가이드

워드프레스 서브디렉토리에 Abel GEO 랜딩 페이지를 완전히 독립적인 HTML 페이지로 배포하는 방법을 안내합니다.

## 배포 개요

현재 작업된 HTML/CSS/JS 파일을 워드프레스 설치 디렉토리 내 서브폴더에 업로드하여, 독립적인 URL로 접근 가능하게 합니다.

**예상 URL**: `https://yourdomain.com/geo-landing/`

## 필요한 파일 구조

```
/geo-landing/
├── index.html
├── styles.css
├── script.js
└── assets/
    ├── hero-iphone-mockup.png
    ├── comparison-visual.png
    └── solution-icons/
        ├── icon-geo.png
        ├── icon-gmb.png
        ├── icon-multilang.png
        └── icon-aibot.png
```

## 배포 단계

### 1단계: 파일 업로드

#### FTP 사용 시
1. FTP 클라이언트(FileZilla 등)로 서버 접속
2. 워드프레스 루트 디렉토리로 이동 (보통 `/public_html/` 또는 `/www/`)
3. 새 폴더 생성: `geo-landing`
4. 모든 파일과 assets 폴더를 `geo-landing` 폴더에 업로드

#### cPanel 파일 관리자 사용 시
1. cPanel 로그인 → 파일 관리자
2. `public_html` 디렉토리로 이동
3. 새 폴더 생성: `geo-landing`
4. 압축 파일 업로드 후 압축 해제 또는 개별 파일 업로드

### 2단계: 워드프레스 헤더 메뉴에 추가

#### 방법 A: 외모 > 메뉴에서 추가
1. 워드프레스 관리자 → **외모** → **메뉴**
2. **사용자 정의 링크** 클릭
3. 다음 정보 입력:
   - **URL**: `https://yourdomain.com/geo-landing/`
   - **링크 텍스트**: `글로벌 GEO` 또는 원하는 메뉴명
4. **메뉴에 추가** 클릭
5. 메뉴 위치 선택 후 **메뉴 저장**

#### 방법 B: Elementor 헤더 편집
1. **템플릿** → **테마 빌더** → **헤더** 편집
2. 네비게이션 메뉴 위젯 편집
3. 메뉴 항목 추가:
   - **링크**: `https://yourdomain.com/geo-landing/`
   - **텍스트**: `글로벌 GEO`

### 3단계: 접근 테스트

1. 브라우저에서 `https://yourdomain.com/geo-landing/` 접속
2. 페이지가 정상적으로 로드되는지 확인
3. 모든 이미지가 표시되는지 확인
4. CTA 버튼 클릭 시 카카오톡 링크가 정상 작동하는지 확인
5. 모바일 반응형 테스트

## 주의사항

> [!IMPORTANT]
> - 모든 파일 경로는 상대 경로로 설정되어 있어 서브디렉토리에서도 정상 작동합니다
> - `assets` 폴더의 모든 이미지 파일이 포함되어야 합니다
> - HTTPS 사용 시 Mixed Content 경고가 없는지 확인하세요

> [!WARNING]
> - 워드프레스 업데이트 시 파일이 삭제되지 않도록 테마 폴더가 아닌 루트 디렉토리에 업로드하세요
> - `.htaccess` 파일을 수정하지 마세요

## 선택사항: SEO 최적화

### robots.txt 설정
워드프레스 루트의 `robots.txt`에 다음 추가:
```
Allow: /geo-landing/
```

### Google Search Console
새 페이지 URL을 Google Search Console에 제출하여 색인 요청

## 문제 해결

### 이미지가 표시되지 않는 경우
- `assets` 폴더가 올바르게 업로드되었는지 확인
- 파일 권한이 644 (파일) / 755 (폴더)로 설정되어 있는지 확인

### 404 에러가 발생하는 경우
- 파일명이 정확히 `index.html`인지 확인
- 서버의 DirectoryIndex 설정 확인

### 스타일이 깨지는 경우
- `styles.css` 파일이 올바르게 업로드되었는지 확인
- 브라우저 캐시 삭제 후 재시도

## Verification Plan

### Automated Tests
해당 없음 (정적 HTML 페이지)

### Manual Verification
1. **파일 업로드 확인**
   - FTP/파일 관리자에서 `/geo-landing/` 폴더 내 모든 파일 존재 확인
   - `index.html`, `styles.css`, `script.js`, `assets/` 폴더 확인

2. **페이지 접근 테스트**
   - 브라우저에서 `https://yourdomain.com/geo-landing/` 접속
   - 페이지가 정상적으로 로드되는지 확인

3. **리소스 로딩 확인**
   - 브라우저 개발자 도구 (F12) → Network 탭
   - 모든 CSS, JS, 이미지 파일이 200 상태로 로드되는지 확인
   - 404 에러가 없는지 확인

4. **기능 테스트**
   - 모든 CTA 버튼 클릭 → 카카오톡 상담 링크 정상 작동 확인
   - 스크롤 애니메이션 작동 확인
   - 카드 호버 효과 확인

5. **반응형 테스트**
   - 데스크톱 (1920px, 1440px, 1280px)
   - 태블릿 (768px)
   - 모바일 (375px, 414px)

6. **워드프레스 메뉴 확인**
   - 헤더 메뉴에 "글로벌 GEO" 항목이 표시되는지 확인
   - 메뉴 클릭 시 `/geo-landing/` 페이지로 이동하는지 확인
