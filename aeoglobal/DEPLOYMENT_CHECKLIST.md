# ✅ WordPress 배포 체크리스트

## 📋 배포 전 준비

### 파일 확인
- [ ] `index.html` 파일 존재 확인
- [ ] `styles.css` 파일 존재 확인
- [ ] `script.js` 파일 존재 확인
- [ ] `assets/hero-iphone-mockup.png` 존재 확인
- [ ] `assets/comparison-visual.png` 존재 확인
- [ ] `assets/solution-icons/icon-geo.png` 존재 확인
- [ ] `assets/solution-icons/icon-gmb.png` 존재 확인
- [ ] `assets/solution-icons/icon-multilang.png` 존재 확인
- [ ] `assets/solution-icons/icon-aibot.png` 존재 확인

### 서버 접속 정보 준비
- [ ] FTP 호스트 주소
- [ ] FTP 사용자명
- [ ] FTP 비밀번호
- [ ] 또는 cPanel 로그인 정보

---

## 🚀 배포 단계

### 1. 서버 업로드
- [ ] FTP 또는 cPanel 파일 관리자 접속
- [ ] `/public_html/` 디렉토리로 이동
- [ ] 새 폴더 `geo-landing` 생성
- [ ] `index.html` 업로드
- [ ] `styles.css` 업로드
- [ ] `script.js` 업로드
- [ ] `assets` 폴더 전체 업로드 (하위 폴더 포함)

### 2. 파일 권한 설정 (선택사항)
- [ ] 폴더 권한: 755
- [ ] 파일 권한: 644

### 3. WordPress 메뉴 추가
- [ ] WordPress 관리자 로그인
- [ ] **외모** → **메뉴** 이동
- [ ] **사용자 정의 링크** 클릭
- [ ] URL 입력: `https://도메인.com/geo-landing/`
- [ ] 링크 텍스트 입력: `글로벌 GEO` (또는 원하는 메뉴명)
- [ ] **메뉴에 추가** 클릭
- [ ] 메뉴 위치 설정 (헤더 메뉴)
- [ ] **메뉴 저장** 클릭

---

## 🧪 테스트 및 검증

### 기본 접근 테스트
- [ ] 브라우저에서 `https://도메인.com/geo-landing/` 접속
- [ ] 페이지가 정상적으로 로드되는지 확인
- [ ] 로딩 속도 확인 (3초 이내)

### 리소스 로딩 확인
- [ ] F12 개발자 도구 → Network 탭 열기
- [ ] 페이지 새로고침
- [ ] `styles.css` 로드 확인 (200 상태)
- [ ] `script.js` 로드 확인 (200 상태)
- [ ] 모든 이미지 로드 확인 (200 상태)
- [ ] 404 에러가 없는지 확인

### 비주얼 확인
- [ ] Hero 섹션 이미지 표시 확인
- [ ] Comparison 이미지 표시 확인
- [ ] Solution 아이콘 4개 모두 표시 확인
- [ ] 그라디언트 배경 정상 표시 확인
- [ ] 폰트(Pretendard) 정상 로드 확인

### 기능 테스트
- [ ] 모든 CTA 버튼 클릭 테스트
- [ ] 카카오톡 상담 링크 작동 확인
- [ ] 스크롤 애니메이션 작동 확인
- [ ] 카드 호버 효과 확인
- [ ] Hero 이미지 Float 애니메이션 확인

### 반응형 테스트
**데스크톱**
- [ ] 1920px 해상도 확인
- [ ] 1440px 해상도 확인
- [ ] 1280px 해상도 확인

**태블릿**
- [ ] 768px 해상도 확인
- [ ] 가로/세로 모드 확인

**모바일**
- [ ] 375px (iPhone SE) 확인
- [ ] 414px (iPhone Pro Max) 확인
- [ ] 실제 모바일 기기에서 테스트

### WordPress 통합 확인
- [ ] 헤더 메뉴에 "글로벌 GEO" 표시 확인
- [ ] 메뉴 클릭 시 페이지 이동 확인
- [ ] 메뉴 스타일이 테마와 조화로운지 확인

### SEO 확인
- [ ] 페이지 제목 표시 확인
- [ ] Meta Description 확인
- [ ] Open Graph 이미지 확인
- [ ] Google Search Console에 URL 제출 (선택사항)

---

## 🎉 배포 완료

모든 항목이 체크되었다면 배포가 성공적으로 완료되었습니다!

---

## 📞 문제 발생 시

### 이미지가 표시되지 않음
1. FTP에서 `assets` 폴더 구조 확인
2. 파일명 대소문자 확인 (서버가 Linux인 경우 중요)
3. 파일 권한 확인 (644)

### 404 에러 발생
1. 파일명이 정확히 `index.html`인지 확인
2. 폴더명이 정확히 `geo-landing`인지 확인
3. 서버 경로 확인

### 스타일이 적용되지 않음
1. `styles.css` 파일 업로드 확인
2. 브라우저 캐시 삭제 (Ctrl + Shift + R)
3. F12 → Network에서 CSS 로드 상태 확인

### 메뉴가 표시되지 않음
1. 메뉴 위치가 올바르게 설정되었는지 확인
2. 테마 설정에서 메뉴 활성화 확인
3. 캐시 플러그인 사용 시 캐시 삭제
